<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\CoreBundle\DataContainer\DataContainerOperation;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

/**
 * Element groups and articles show two primary buttons: the "edit" pencil and
 * the "child elements" button. Usually you want to get into the group or the
 * article, not change its settings - so these options move the pencil into the
 * "…" menu and only the child button stays visible.
 *
 * Wraps an existing button callback (e.g. Contao's permission check), which
 * still runs first.
 */
final class EditInMenuListener
{
    #[AsCallback(table: 'tl_content', target: 'config.onload')]
    public function onContentLoad(): void
    {
        if (BackendSettings::user()?->elementGroupEditInMenu) {
            self::moveEditIntoMenu('tl_content', static fn (array $record): bool => 'element_group' === ($record['type'] ?? null));
        }
    }

    #[AsCallback(table: 'tl_article', target: 'config.onload')]
    public function onArticleLoad(): void
    {
        if (BackendSettings::user()?->articleEditInMenu) {
            self::moveEditIntoMenu('tl_article', static fn (array $record): bool => true);
        }
    }

    private static function moveEditIntoMenu(string $table, \Closure $applies): void
    {
        $operation = &$GLOBALS['TL_DCA'][$table]['list']['operations']['edit'];

        if (!\is_array($operation) || !empty($operation['editInMenu'])) {
            return;
        }

        $previous = $operation['button_callback'] ?? null;
        $operation['editInMenu'] = true;
        $operation['button_callback'] = static function (DataContainerOperation $op) use ($previous, $applies): void {
            if (\is_callable($previous)) {
                $previous($op);
            }

            if ($applies($op->getRecord())) {
                $op['primary'] = false;
            }
        };
    }
}
