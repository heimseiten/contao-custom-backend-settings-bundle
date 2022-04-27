<?php 

if (TL_MODE == 'BE') {

    if ( \Config::get('copiedPageOrArticleWithoutLabelCopy') ) {
        $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
    }

}
