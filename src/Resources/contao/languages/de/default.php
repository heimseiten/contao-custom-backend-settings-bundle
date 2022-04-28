<?php 

if (TL_MODE == 'BE') {

    if ( \Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }

}

if ( \Config::get('readMoreLabelDe') ) {    
    $GLOBALS['TL_LANG']['MSC']['more']  = \Config::get('readMoreLabelDe');
}
