<?php

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {

        if ( Contao\Config::get('highlightFilteredPageTree') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_filtered_page_tree.scss|static';
        }

        if ( Contao\Config::get('highlightSearchedPageTree') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_searched_page_tree.scss|static';
        }

        if ( Contao\Config::get('enlargeCssField') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_css_field.scss|static';
        }
    
        if ( Contao\Config::get('enlargeOptionField') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_option_field.scss|static';
        }
        
        if ( Contao\Config::get('enlargeTableFields') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_table_fields.scss|static';
        }
        
        if ( Contao\Config::get('limitBackendWidth') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_limit_backend_width.scss|static';
        }
        
        if ( Contao\Config::get('enlargePreviewImagesInFileManager') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_preview_images_in_file_manager.scss|static';
        }
        
        if ( Contao\Config::get('enlargeFontSizeWhenViewportIsMoreThan1920px') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_font_size_when_viewport_is_more_than_1920px.scss|static';
        }
        
        if ( Contao\Config::get('disableButtonAfterClick') ) {
                $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/disable_button_after_click.scss|static';
                $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/heimseitencontaocustombackendsettings/disable_button_after_click.js';
        }
    
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs.scss|static';

}
