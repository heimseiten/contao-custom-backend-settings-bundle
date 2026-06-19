<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

PaletteManipulator::create()
    ->addLegend('CustomBackendSettingsLabels', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettingsFunctions', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettingsBehaviour', 'backend_legend', PaletteManipulator::POSITION_AFTER)
    ->addLegend('CustomBackendSettingsAppearance', 'backend_legend', PaletteManipulator::POSITION_AFTER)

    ->addField('enlargeCssField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeOptionField', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargeTableFields', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightFilteredPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('highlightSearchedPageTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('enlargePreviewImagesInFileManager', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('disableLinksInPageTreeToFilterTree', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('loadBackendSCSS', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)
    ->addField('hideLayoutSectionsInArticleList', 'CustomBackendSettingsAppearance', PaletteManipulator::POSITION_APPEND)

    ->addField('autoInsertFirstElement', 'CustomBackendSettingsBehaviour', PaletteManipulator::POSITION_APPEND)
    ->addField('articleRowOpensContent', 'CustomBackendSettingsBehaviour', PaletteManipulator::POSITION_APPEND)
    ->addField('elementGroupRowOpensChildren', 'CustomBackendSettingsBehaviour', PaletteManipulator::POSITION_APPEND)

    ->addField('publishPageOnCreate', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('publishArticleOnCreate', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('publishNewsOnCreate', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('publishEventOnCreate', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('copiedPageOrArticleWithoutLabelCopy', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('copyNewsWithAllDetails', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)
    ->addField('copyEventsWithAllDetails', 'CustomBackendSettingsFunctions', PaletteManipulator::POSITION_APPEND)

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
    'eval'      => array('tl_class' => 'w50 m12')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['highlightSearchedPageTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['highlightSearchedPageTree'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargePreviewImagesInFileManager'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargePreviewImagesInFileManager'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeOptionField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeOptionField'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeCssField'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeCssField'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['enlargeTableFields'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['enlargeTableFields'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['disableLinksInPageTreeToFilterTree'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['disableLinksInPageTreeToFilterTree'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['loadBackendSCSS'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['loadBackendSCSS'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['hideLayoutSectionsInArticleList'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['hideLayoutSectionsInArticleList'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['autoInsertFirstElement'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['autoInsertFirstElement'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['articleRowOpensContent'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['articleRowOpensContent'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['elementGroupRowOpensChildren'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['elementGroupRowOpensChildren'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['publishPageOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['publishPageOnCreate'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['publishArticleOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['publishArticleOnCreate'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['publishNewsOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['publishNewsOnCreate'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['publishEventOnCreate'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['publishEventOnCreate'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['copiedPageOrArticleWithoutLabelCopy'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['copiedPageOrArticleWithoutLabelCopy'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 clr')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['copyNewsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['copyNewsWithAllDetails'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];

$GLOBALS['TL_DCA']['tl_user']['fields']['copyEventsWithAllDetails'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_user']['copyEventsWithAllDetails'],
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50')
];
