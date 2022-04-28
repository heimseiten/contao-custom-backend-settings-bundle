<?php 

if (TL_MODE == 'BE') {

    if ( \Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }

}

if ( \Config::get('readMoreLabelEn') ) {
    $GLOBALS['TL_LANG']['MSC']['more']  = \Config::get('readMoreLabelEn');
}
