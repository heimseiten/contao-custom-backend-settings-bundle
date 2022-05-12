<?php 

if (TL_MODE == 'BE') {

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
