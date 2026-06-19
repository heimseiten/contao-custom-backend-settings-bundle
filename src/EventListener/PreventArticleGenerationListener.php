<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\Config;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\EventListener\DataContainer\ContentCompositionListener;
use Contao\DataContainer;

/**
 * Replaces Contao's automatic article generation for new pages (its original callback is removed
 * via RemoveGenerateArticleForPagePass). The article is only created when the global setting
 * "preventArticleOnPageCreate" is off, so editors can opt out of the empty auto-article.
 *
 * Same table/target/priority as the core callback, so the behaviour is otherwise identical.
 */
#[AsCallback(table: 'tl_page', target: 'config.onsubmit', priority: -16)]
final class PreventArticleGenerationListener
{
    public function __construct(private readonly ContentCompositionListener $contentComposition)
    {
    }

    public function __invoke(DataContainer $dc): void
    {
        if (Config::get('preventArticleOnPageCreate')) {
            return;
        }

        $this->contentComposition->generateArticleForPage($dc);
    }
}
