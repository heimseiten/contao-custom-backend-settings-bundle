<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

PaletteManipulator::create()
    ->addLegend('CustomBackendSettingsLabels', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettingsAppearance', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettings', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    
    ->addField('publishPageOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishArticleOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishNewsOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('publishEventOnCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copiedPageOrArticleWithoutLabelCopy', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyNewsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('copyEventsWithAllDetails', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('memberFieldsNotMandatory', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldAllowHtml', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('addParagraphOptionToHeadlineField', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
  
    ->addField('enlargeCssField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeOptionField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeTableFields', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('disableButtonAfterClick', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightFilteredPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightSearchedPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('limitBackendWidth', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargePreviewImagesInFileManager', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeFontSizeWhenViewportIsMoreThan1920px', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    
    ->addField('readMoreLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('readMoreLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('default', 'tl_settings') 
;


$GLOBALS['TL_DCA']['tl_settings']['fields']['publishPageOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishPageOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishArticleOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishArticleOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishNewsOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishNewsOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''" 
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['publishEventOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['publishEventOnCreate'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
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
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['limitBackendWidth'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['limitBackendWidth'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargePreviewImagesInFileManager'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargePreviewImagesInFileManager'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeFontSizeWhenViewportIsMoreThan1920px'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeFontSizeWhenViewportIsMoreThan1920px'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeOptionField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeOptionField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeCssField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeCssField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['enlargeTableFields'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['enlargeTableFields'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['disableButtonAfterClick'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['disableButtonAfterClick'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldAllowHtml'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['formFieldAllowHtml'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['addParagraphOptionToHeadlineField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['addParagraphOptionToHeadlineField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copiedPageOrArticleWithoutLabelCopy'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copiedPageOrArticleWithoutLabelCopy'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['memberFieldsNotMandatory'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['memberFieldsNotMandatory'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyNewsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyNewsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['copyEventsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['copyEventsWithAllDetails'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w25'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['readMoreLabelDe'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['readMoreLabelDe'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50 clr'),
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
    'eval'      => array('tl_class'=>'w25'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['previousLabelDe'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['previousLabelDe'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w25'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['nextLabelEn'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['nextLabelEn'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w25'),
    'sql'       => "text NULL"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['previousLabelEn'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['previousLabelEn'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w25'),
    'sql'       => "text NULL"
];
