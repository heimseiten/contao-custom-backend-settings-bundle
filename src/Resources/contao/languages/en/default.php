<?php 

if (TL_MODE == 'BE') {

    if ( \Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }

}

if ( \Config::get('readMoreLabelEn') ) {
    $GLOBALS['TL_LANG']['MSC']['more']  = \Config::get('readMoreLabelEn');
}

if ( \Config::get('previousLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['previous'] = \Config::get('previousLabelEn');
}

if ( \Config::get('nextLabelEn') ) {    
    $GLOBALS['TL_LANG']['MSC']['next'] = \Config::get('nextLabelEn');
}
