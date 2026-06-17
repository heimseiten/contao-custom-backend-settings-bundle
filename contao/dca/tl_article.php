<?php

declare(strict_types=1);

if ( Contao\Config::get('publishArticleOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = true;
}
