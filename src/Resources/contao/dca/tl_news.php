<?php

if ( \Config::get('copyNewsWithAllDetails') ) {
    $GLOBALS['TL_DCA']['tl_news']['fields']['date']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['time']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['author']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['published']['eval']['doNotCopy'] = false;
}

$GLOBALS['TL_DCA']['tl_news']['fields']['published']['default'] = true;
