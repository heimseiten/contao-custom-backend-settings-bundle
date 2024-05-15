<?php 

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    if ( Contao\Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }
}

if ( Contao\Config::get('readMoreLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['more']  = Contao\Config::get('readMoreLabelDe');
}

if ( Contao\Config::get('previousLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['previous'] = Contao\Config::get('previousLabelDe');
}

if ( Contao\Config::get('nextLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['next'] = Contao\Config::get('nextLabelDe');
}

if ( Contao\Config::get('lastLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['last'] = Contao\Config::get('lastLabelDe');
}

if ( Contao\Config::get('firstLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['first'] = Contao\Config::get('firstLabelDe');
}

if ( Contao\Config::get('newsOverviewDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['newsOverview'] = Contao\Config::get('newsOverviewDe');
}
