<?php

if ( Contao\Config::get('formFieldAllowHtml') ) {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['label']['eval']['allowHtml'] = true; 
}
