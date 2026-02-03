<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\EventListener;

use Contao\BackendTemplate;
use Contao\BackendUser;
use Contao\Controller;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\Template;
use Symfony\Bundle\SecurityBundle\Security;

final class ParseTemplateListener
{
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
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_highlight_filtered_page_tree.css'), null, null);
        }

        if (true === (bool) $user->highlightSearchedPageTree) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_highlight_searched_page_tree.css'), null, null);
        }

        if (true === (bool) $user->enlargeCssField) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_enlarge_css_field.css'), null, null);
        }

        if (true === (bool) $user->enlargeOptionField) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_enlarge_option_field.css'), null, null);
        }

        if (true === (bool) $user->enlargeTableFields) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_enlarge_table_fields.css'), null, null);
        }

        if (true === (bool) $user->enlargePreviewImagesInFileManager) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_enlarge_preview_images_in_file_manager.css'), null, null);
        }        

        if (true === (bool) $user->disableLinksInPageTreeToFilterTree) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('bundles/heimseitencontaocustombackendsettings/cbs_disable_links_in_page_tree_to_filter_tree.css'), null, null);
        }

        if (true === (bool) $user->loadBackendSCSS) {
            $template->stylesheets .= $templateAdapter->generateStyleTag($controllerAdapter->addStaticUrlTo('files/layout/css/backend.css'), null, null);
        }
        
    }
}
