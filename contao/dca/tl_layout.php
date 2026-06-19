<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Add the front-end label fields to both the classic ("default") and the modern layout palette.
PaletteManipulator::create()
    ->addLegend('CustomBackendSettingsLabels', 'modules_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('readMoreLabel', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabel', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabel', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_layout')
    ->applyToPalette('modern', 'tl_layout')
;

// Virtual fields (no 'sql'): stored in the shared tl_layout.jsonData column, no per-field migration.
$GLOBALS['TL_DCA']['tl_layout']['fields']['readMoreLabel'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['readMoreLabel'],
    'inputType' => 'text',
    'eval'      => array('tl_class' => 'w50 clr', 'maxlength' => 255),
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['previousLabel'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['previousLabel'],
    'inputType' => 'text',
    'eval'      => array('tl_class' => 'w50 clr', 'maxlength' => 255),
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['nextLabel'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['nextLabel'],
    'inputType' => 'text',
    'eval'      => array('tl_class' => 'w50', 'maxlength' => 255),
];
