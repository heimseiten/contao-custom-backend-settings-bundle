<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_settings']['fields']['newSiteVisible'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['newSiteVisible'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''" 
];

PaletteManipulator::create()
    ->addLegend('CustomBackendSettings', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('newSiteVisible', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_settings') 
;