<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishPageOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishPageOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishArticleOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishArticleOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['highlightFilteredPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['highlightFilteredPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['highlightSearchedPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['highlightSearchedPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeCssField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeCssField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copiedPageOrArticleWithoutLabelCopy'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copiedPageOrArticleWithoutLabelCopy'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyNewsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyNewsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyEventsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyEventsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

PaletteManipulator::create()
    ->addLegend('CustomBackendSettings', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    
    ->addField('publishPageOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishArticleOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightFilteredPageTree', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightSearchedPageTree', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeCssField', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copiedPageOrArticleWithoutLabelCopy', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyNewsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyEventsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_settings') 
;
