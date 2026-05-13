<?php

if ( Contao\Config::get('publishPageOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_page']['fields']['published']['default'] = true;
}

$GLOBALS['TL_DCA']['tl_page']['list']['label']['fields'][] = 'cssClass';
$GLOBALS['TL_DCA']['tl_page']['list']['label']['format'] = '%s <div style="display: none;" class="page_css_wrapper"><span class="page_css">%s</span></div>';
