<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\InsertTag\InsertTagParser;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\Message;
use Contao\PageModel;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;
use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;
use Heimseiten\ContaoCustomBackendSettingsBundle\Event\InsertTagHintEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Option "Hint for insert tags" (per user, on by default): when a record that
 * contains insert tags is opened for editing, a Contao info message at the top
 * lists every tag with its current value and a link to where it is maintained,
 * e.g. {{link::12}} → page "Contact", {{kontakt::telefon}} → the contact record.
 * Editors then know that the text in the field is only a placeholder.
 *
 * Core tags are described here; other bundles describe their own tags via
 * InsertTagHintEvent.
 */
#[AsHook('loadDataContainer')]
final class InsertTagHintListener
{
    private const MAX_TAGS = 25;

    public function __construct(
        private readonly Connection $connection,
        private readonly RequestStack $requestStack,
        private readonly RouterInterface $router,
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly InsertTagParser $insertTagParser,
    ) {
    }

    public function __invoke(string $table): void
    {
        if (!empty($GLOBALS['TL_DCA'][$table]['config']['insertTagHint']) || !is_a(DataContainer::getDriverForTable($table) ?? '', DC_Table::class, true)) {
            return;
        }

        $GLOBALS['TL_DCA'][$table]['config']['insertTagHint'] = true;
        $GLOBALS['TL_DCA'][$table]['config']['onload_callback'][] = fn (DataContainer|null $dc = null) => $this->onLoad($table, $dc);
    }

    private function onLoad(string $table, DataContainer|null $dc): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $user = BackendSettings::user();

        // Only when the edit form is displayed: after a POST the message would show up on the next page.
        if (!$dc?->id || !$request || !$user || !$request->isMethod('GET') || 'edit' !== $request->query->get('act')) {
            return;
        }

        // On by default: a user who never saved this checkbox has no value (null).
        if (null !== $user->insertTagHint && !$user->insertTagHint) {
            return;
        }

        try {
            $record = $this->connection->fetchAssociative('SELECT * FROM '.$this->connection->quoteIdentifier($table).' WHERE id=?', [(int) $dc->id]);
        } catch (\Throwable) {
            return;
        }

        if (!$record) {
            return;
        }

        $tags = [];

        foreach ($record as $value) {
            if (\is_string($value) && str_contains($value, '{{') && preg_match_all('/\{\{([^{}]+?)\}\}/', $value, $matches)) {
                foreach ($matches[1] as $tag) {
                    $tags[trim($tag)] = true;
                }
            }
        }

        unset($tags['br']);

        if (!$tags) {
            return;
        }

        $rootPageId = $this->rootPageId($table, $record);
        $lines = [];

        foreach (\array_slice(array_keys($tags), 0, self::MAX_TAGS) as $tag) {
            $lines[] = $this->line($tag, $table, $record, $rootPageId);
        }

        $lang = $GLOBALS['TL_LANG']['MSC']['insertTagHint'] ?? ['Platzhalter (Insert-Tags) in diesem Datensatz', 'Diese Inhalte werden an anderer Stelle gepflegt und hier nur eingesetzt. Ändern Sie sie dort, dann stimmen sie überall.'];
        Message::addInfo('<strong>'.StringUtil::specialchars($lang[0]).'</strong>: '.StringUtil::specialchars($lang[1]).'<br>'.implode('<br>', $lines));
    }

    private function line(string $tag, string $table, array $record, int|null $rootPageId): string
    {
        $chunks = explode('|', $tag);
        $parts = explode('::', $chunks[0]);
        $name = strtolower(array_shift($parts));
        $event = new InsertTagHintEvent($tag, $name, $parts, $table, $record, $rootPageId);

        $this->describeCoreTag($event);
        $this->eventDispatcher->dispatch($event);

        $line = '<code>{{'.StringUtil::specialchars($tag).'}}</code>';

        if (null !== ($value = $event->getValue()) && '' !== trim($value)) {
            $value = trim(preg_replace('/\s+/', ' ', $value));
            $line .= ' = „'.StringUtil::specialchars(mb_strimwidth($value, 0, 90, '…')).'“';
        }

        if ($url = $event->getUrl()) {
            $text = $event->getLinkText() ?: ($GLOBALS['TL_LANG']['MSC']['insertTagHintEdit'] ?? 'bearbeiten');
            $line .= ' · <a href="'.StringUtil::specialchars($url).'">'.StringUtil::specialchars($text).'</a>';
        }

        return $line;
    }

    private function describeCoreTag(InsertTagHintEvent $event): void
    {
        $param = $event->getParameters()[0] ?? '';
        $edit = $GLOBALS['TL_LANG']['MSC']['insertTagHintEditOf'] ?? '%s bearbeiten';

        $source = match (true) {
            str_starts_with($event->getName(), 'link') => ['tl_page', 'page', null, 'title'],
            \in_array($event->getName(), ['insert_article', 'article', 'article_open', 'article_url', 'article_title', 'article_teaser'], true) => ['tl_article', 'article', null, 'title'],
            'insert_content' === $event->getName() => ['tl_content', 'article', 'tl_content', 'type'],
            'insert_module' === $event->getName() => ['tl_module', 'themes', 'tl_module', 'name'],
            str_starts_with($event->getName(), 'news') => ['tl_news', 'news', 'tl_news', 'headline'],
            str_starts_with($event->getName(), 'event') => ['tl_calendar_events', 'calendar', 'tl_calendar_events', 'title'],
            str_starts_with($event->getName(), 'faq') => ['tl_faq', 'faq', 'tl_faq', 'question'],
            default => null,
        };

        if ($source && '' !== $param) {
            [$sourceTable, $do, $urlTable, $titleField] = $source;

            try {
                $column = ctype_digit($param) ? 'id' : 'alias';
                $row = 'tl_content' === $sourceTable || 'tl_module' === $sourceTable ? $this->connection->fetchAssociative("SELECT id, $titleField AS titel FROM $sourceTable WHERE id=?", [(int) $param])
                    : $this->connection->fetchAssociative("SELECT id, $titleField AS titel FROM $sourceTable WHERE $column=?", [$param]);
            } catch (\Throwable) {
                $row = false;
            }

            if ($row) {
                $event->setValue((string) $row['titel']);
                $event->setLink($this->editUrl($do, (int) $row['id'], $urlTable), sprintf($edit, (string) $row['titel']));
            }

            return;
        }

        if ('file' === $event->getName() || str_starts_with($event->getName(), 'email')) {
            $event->setValue($param);

            return;
        }

        // Everything else (date, env, lang, custom tags without a listener): try to resolve it.
        try {
            $value = trim(strip_tags($this->insertTagParser->replaceInline('{{'.$event->getTag().'}}')));

            if ('' !== $value && !str_contains($value, '{{')) {
                $event->setValue($value);
            }
        } catch (\Throwable) {
        }
    }

    private function editUrl(string $do, int $id, string|null $table = null): string
    {
        $params = ['do' => $do, 'act' => 'edit', 'id' => $id];

        if ($table) {
            $params['table'] = $table;
        }

        if ($ref = $this->requestStack->getCurrentRequest()?->attributes->get('_contao_referer_id')) {
            $params['ref'] = $ref;
        }

        return $this->router->generate('contao_backend', $params);
    }

    private function rootPageId(string $table, array $record): int|null
    {
        try {
            for ($i = 0; 'tl_content' === $table && $i < 20; ++$i) {
                $table = $record['ptable'] ?? 'tl_article';
                $record = $this->connection->fetchAssociative('SELECT * FROM '.$this->connection->quoteIdentifier($table).' WHERE id=?', [(int) $record['pid']]) ?: [];
            }

            $pageId = match ($table) {
                'tl_page' => (int) ($record['id'] ?? 0),
                'tl_article' => (int) ($record['pid'] ?? 0),
                default => 0,
            };

            return $pageId ? ((int) PageModel::findWithDetails($pageId)?->rootId ?: null) : null;
        } catch (\Throwable) {
            return null;
        }
    }
}
