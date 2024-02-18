<?php 

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    if ( Contao\Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }
}

if ( Contao\Config::get('readMoreLabelEn') ) {
    $GLOBALS['TL_LANG']['MSC']['more']  = Contao\Config::get('readMoreLabelEn');
}

if ( Contao\Config::get('previousLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['previous'] = Contao\Config::get('previousLabelEn');
}

if ( Contao\Config::get('nextLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['next'] = Contao\Config::get('nextLabelEn');
}

if ( Contao\Config::get('lastLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['last'] = Contao\Config::get('lastLabelEn');
}

if ( Contao\Config::get('firstLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['first'] = Contao\Config::get('firstLabelEn');
}

if ( Contao\Config::get('newsOverviewEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['newsOverview'] = Contao\Config::get('newsOverviewEn');
}
