<?php

if ( \Config::get('publishArticleOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = true;
}
