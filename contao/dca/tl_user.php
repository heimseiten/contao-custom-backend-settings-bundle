<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

PaletteManipulator::create()
    ->addLegend('CustomBackendSettingsLabels', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettingsAppearance', 'backend_legend', PaletteManipulator::POSITION_AFTER)
  
    ->addField('enlargeCssField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeOptionField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeTableFields', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('disableButtonAfterClick', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightFilteredPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightSearchedPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('limitBackendWidth', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargePreviewImagesInFileManager', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeFontSizeWhenViewportIsMoreThan1920px', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('disableLinksInPageTreeToFilterTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
        
    ->applyToPalette('default', 'tl_user')
    ->applyToPalette('login', 'tl_user')
    ->applyToPalette('admin', 'tl_user')
    ->applyToPalette('group', 'tl_user')
    ->applyToPalette('extend', 'tl_user')
    ->applyToPalette('custom', 'tl_user')
;

$GLOBALS['TL_DCA']['tl_user']['fields']['highlightFilteredPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['highlightFilteredPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['highlightSearchedPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['highlightSearchedPageTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['limitBackendWidth'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['limitBackendWidth'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargePreviewImagesInFileManager'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargePreviewImagesInFileManager'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeFontSizeWhenViewportIsMoreThan1920px'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeFontSizeWhenViewportIsMoreThan1920px'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeOptionField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeOptionField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeCssField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeCssField'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeTableFields'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeTableFields'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50 clr'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['disableButtonAfterClick'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['disableButtonAfterClick'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_user']['fields']['disableLinksInPageTreeToFilterTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['disableLinksInPageTreeToFilterTree'],
    'inputType' => 'checkbox', 
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''"
];
