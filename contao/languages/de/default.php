<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user ("Funktionen" in the user profile): create copies without the "(Kopie)"
// suffix. MSC.copyOf is the global template used when marking a copy, so this neutralises the
// suffix for ALL copy operations. Only relevant in the backend, where copies are created.
if (BackendSettings::user()?->copiedPageOrArticleWithoutLabelCopy) {
    $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
}

// Hinweis bei Insert-Tags (InsertTagHintListener)
$GLOBALS['TL_LANG']['MSC']['insertTagHint'] = array('Platzhalter (Insert-Tags) in diesem Datensatz', 'Diese Inhalte werden an anderer Stelle gepflegt und hier nur eingesetzt. Ändern Sie sie dort, dann stimmen sie überall.');
$GLOBALS['TL_LANG']['MSC']['insertTagHintEdit'] = 'bearbeiten';
$GLOBALS['TL_LANG']['MSC']['insertTagHintEditOf'] = '„%s“ bearbeiten';
