<?php

if ( Contao\Config::get('publishArticleOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = true;
}
