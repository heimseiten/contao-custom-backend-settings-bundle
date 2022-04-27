<?php

if (TL_MODE == 'BE') {

    if ( \Config::get('highlightFilteredPageTree') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_filtered_page_tree.scss|static';
    }

    if ( \Config::get('highlightSearchedPageTree') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs_highlight_searched_page_tree.scss|static';
    }

    if ( \Config::get('enlargeCssField') ) {
        $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/enlarge_css_field.scss|static';
    }
    
    $GLOBALS['TL_CSS'][] = 'bundles/heimseitencontaocustombackendsettings/cbs.scss|static';

}