<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\BackendTemplate;
use Contao\BackendUser;
use Contao\Controller;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\Template;
use Symfony\Bundle\SecurityBundle\Security;

#[AsHook('parseTemplate')]
final class ParseTemplateListener
{
    private const ASSET_PATH = 'bundles/heimseitencontaocustombackendsettings/';

    public function __construct(
        private readonly Security $security,
        private readonly ContaoFramework $contaoFramework,
    ) {
    }

    public function __invoke(Template $template): void
    {
        if (!$template instanceof BackendTemplate) {
            return;
        }

        if ('be_main' !== $template->getName() && !str_starts_with($template->getName(), 'be_main_')) {
            return;
        }

        $user = $this->security->getUser();

        if (!$user instanceof BackendUser) {
            return;
        }

        /** @var Template $templateAdapter */
        $templateAdapter = $this->contaoFramework->getAdapter(Template::class);

        /** @var Controller $controllerAdapter */
        $controllerAdapter = $this->contaoFramework->getAdapter(Controller::class);

        if (true === (bool) $user->highlightFilteredPageTree) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'highlight-filtered-page-tree.css'), null, null);
        }

        if (true === (bool) $user->highlightSearchedPageTree) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'highlight-searched-page-tree.css'), null, null);
        }

        if (true === (bool) $user->enlargeCssField) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'enlarge-css-field.css'), null, null);
        }

        if (true === (bool) $user->enlargeOptionField) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'enlarge-option-field.css'), null, null);
        }

        if (true === (bool) $user->enlargeTableFields) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'enlarge-table-fields.css'), null, null);
        }

        if (true === (bool) $user->enlargePreviewImagesInFileManager) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'enlarge-file-manager-previews.css'), null, null);
        }

        if (true === (bool) $user->disableLinksInPageTreeToFilterTree) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'disable-page-tree-filter-links.css'), null, null);
        }

        if (true === (bool) $user->hideLayoutSectionsInArticleList) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'hide-layout-sections-in-article-list.css'), null, null);
        }

        if (true === (bool) $user->loadBackendSCSS) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('files/layout/css/backend.css'), null, null);
        }

        if (true === (bool) $user->autoInsertFirstElement) {
            $template->javascripts .= $templateAdapter->generateScriptTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'auto-insert-first-element.js'), false, null);
        }

        if (true === (bool) $user->articleRowOpensContent) {
            $template->javascripts .= $templateAdapter->generateScriptTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'article-row-opens-content.js'), false, null);
        }

        if (true === (bool) $user->elementGroupRowOpensChildren) {
            $template->javascripts .= $templateAdapter->generateScriptTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'element-group-row-opens-children.js'), false, null);
        }

        if (true === (bool) $user->contentElementRowOpensElement) {
            $template->javascripts .= $templateAdapter->generateScriptTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'content-element-row-opens-element.js'), false, null);
        }

        if (true === (bool) $user->pageRowOpensSettings) {
            $template->javascripts .= $templateAdapter->generateScriptTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'page-row-opens-settings.js'), false, null);
        }

        $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo(self::ASSET_PATH . 'column-group-preview.css'), null, null);
    }
}
