<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishPageOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishPageOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishArticleOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishArticleOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishNewsOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishNewsOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishEventOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishEventOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['highlightFilteredPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['highlightFilteredPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['highlightSearchedPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['highlightSearchedPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeCssField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeCssField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copiedPageOrArticleWithoutLabelCopy'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copiedPageOrArticleWithoutLabelCopy'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberFieldsNotMandatory'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['memberFieldsNotMandatory'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldAllowHtml'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['formFieldAllowHtml'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyNewsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyNewsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyEventsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyEventsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['readMoreLabelDe'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['readMoreLabelDe'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['readMoreLabelEn'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['readMoreLabelEn'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['nextLabelDe'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['nextLabelDe'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['previousLabelDe'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['previousLabelDe'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['nextLabelEn'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['nextLabelEn'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['previousLabelEn'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['previousLabelEn'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "text NULL"
];

PaletteManipulator::create()
    ->addLegend('CustomBackendSettings', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    
    ->addField('publishPageOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishArticleOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishNewsOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishEventOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightFilteredPageTree', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightSearchedPageTree', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeCssField', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copiedPageOrArticleWithoutLabelCopy', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyNewsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyEventsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('memberFieldsNotMandatory', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldAllowHtml', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
  
    ->addField('readMoreLabelDe', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('readMoreLabelEn', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
  
    ->addField('previousLabelDe', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabelEn', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
  
    ->addField('nextLabelDe', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabelEn', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_settings') 
;
