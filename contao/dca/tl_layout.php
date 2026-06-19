<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Per-language front-end label fields, added to the classic ("default") and the modern palette.
// A layout can serve more than one language, so each label has a German and an English variant;
// the front-end picks the variant by the current page language (see FrontendLabelsListener).
PaletteManipulator::create()
    ->addLegend('CustomBackendSettingsLabels', 'modules_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('readMoreLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('readMoreLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('previousLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabelDe', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->addField('nextLabelEn', 'CustomBackendSettingsLabels', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_layout')
    ->applyToPalette('modern', 'tl_layout')
;

// Virtual fields (no 'sql'): stored in the shared tl_layout.jsonData column, no per-field migration.
foreach ([
    'readMoreLabelDe' => 'w50 clr', 'readMoreLabelEn' => 'w50',
    'previousLabelDe' => 'w50 clr', 'previousLabelEn' => 'w50',
    'nextLabelDe'     => 'w50 clr', 'nextLabelEn'     => 'w50',
] as $field => $cssClass) {
    $GLOBALS['TL_DCA']['tl_layout']['fields'][$field] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_layout'][$field],
        'inputType' => 'text',
        'eval'      => array('tl_class' => $cssClass, 'maxlength' => 255),
    ];
}
