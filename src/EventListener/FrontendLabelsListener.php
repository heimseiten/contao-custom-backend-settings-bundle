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
 * (the "read more" link and the pagination labels). Classic layouts are covered via the
 * getPageLayout hook, modern (Twig) layouts via the LayoutEvent - both fire before the
 * modules that use these labels are rendered.
 */
final class FrontendLabelsListener
{
    #[AsHook('getPageLayout')]
    public function onGetPageLayout(PageModel $page, LayoutModel $layout, $pageRegular = null): void
    {
        $this->applyLabels($layout);
    }

    #[AsEventListener]
    public function onLayout(LayoutEvent $event): void
    {
        $this->applyLabels($event->getLayout());
    }

    private function applyLabels(LayoutModel|null $layout): void
    {
        if (null === $layout) {
            return;
        }

        if ($layout->readMoreLabel) {
            $GLOBALS['TL_LANG']['MSC']['more'] = $layout->readMoreLabel;
        }

        if ($layout->previousLabel) {
            $GLOBALS['TL_LANG']['MSC']['previous'] = $layout->previousLabel;
        }

        if ($layout->nextLabel) {
            $GLOBALS['TL_LANG']['MSC']['next'] = $layout->nextLabel;
        }
    }
}
