<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Event\LayoutEvent;
use Contao\LayoutModel;
use Contao\PageModel;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

/**
 * Overrides the front-end labels MSC.more / MSC.previous / MSC.next per page layout
 * (the "read more" link and the pagination labels). Each label has a German and an English
 * variant on the layout; the variant is chosen by the current page language, so one layout
 * can serve both languages.
 *
 * Classic layouts are covered via the getPageLayout hook, modern (Twig) layouts via the
 * LayoutEvent - both fire before the modules that use these labels are rendered.
 */
final class FrontendLabelsListener
{
    #[AsHook('getPageLayout')]
    public function onGetPageLayout(PageModel $page, LayoutModel $layout, $pageRegular = null): void
    {
        $this->applyLabels($layout, $page);
    }

    #[AsEventListener]
    public function onLayout(LayoutEvent $event): void
    {
        $this->applyLabels($event->getLayout(), $event->getPage());
    }

    private function applyLabels(LayoutModel|null $layout, PageModel|null $page): void
    {
        if (null === $layout || null === $page) {
            return;
        }

        $suffix = str_starts_with((string) $page->language, 'de') ? 'De' : 'En';

        foreach (['more' => 'readMoreLabel', 'previous' => 'previousLabel', 'next' => 'nextLabel'] as $msc => $field) {
            $value = $layout->{$field.$suffix};

            if ($value) {
                $GLOBALS['TL_LANG']['MSC'][$msc] = $value;
            }
        }
    }
}
