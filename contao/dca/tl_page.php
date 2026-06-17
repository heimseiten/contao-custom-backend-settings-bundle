<?php

if ( Contao\Config::get('publishPageOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_page']['fields']['published']['default'] = true;
}
