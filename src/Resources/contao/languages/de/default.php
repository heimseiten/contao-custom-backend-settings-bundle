<?php 

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {

    if ( \Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }

}

if ( \Config::get('readMoreLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['more']  = \Config::get('readMoreLabelDe');
}

if ( \Config::get('previousLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['previous'] = \Config::get('previousLabelDe');
}

if ( \Config::get('nextLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['next'] = \Config::get('nextLabelDe');
}
