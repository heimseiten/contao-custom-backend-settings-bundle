<?php

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {

    if ( \Config::get('highlightFilteredPageTree') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_filtered_page_tree.scss|static';
    }

    if ( \Config::get('highlightSearchedPageTree') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_searched_page_tree.scss|static';
    }

    if ( \Config::get('enlargeCssField') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_enlarge_css_field.scss|static';
    }
    
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs.scss|static';

}
