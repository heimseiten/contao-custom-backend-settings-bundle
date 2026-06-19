<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

PaletteManipulator::create()
    ->addLegend('CustomBackendSettings', 'backend_legend', PaletteManipulator::POSITION_AFTER)

    ->addField('memberFieldsNotMandatory', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldAllowHtml', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('addParagraphOptionToHeadlineField', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('addStrongOptionToHeadlineField', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)
    ->addField('preventArticleOnPageCreate', 'CustomBackendSettings', PaletteManipulator::POSITION_APPEND)

    ->applyToPalette('default', 'tl_settings')
;

// tl_settings uses DC_File (stored in localconfig.php), so the fields need no 'sql' / database column.
$GLOBALS['TL_DCA']['tl_settings']['fields']['memberFieldsNotMandatory'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['memberFieldsNotMandatory'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w25'),
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldAllowHtml'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['formFieldAllowHtml'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w25'),
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['addParagraphOptionToHeadlineField'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['addParagraphOptionToHeadlineField'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w25'),
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['addStrongOptionToHeadlineField'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['addStrongOptionToHeadlineField'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w25'),
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['preventArticleOnPageCreate'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_settings']['preventArticleOnPageCreate'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
];
