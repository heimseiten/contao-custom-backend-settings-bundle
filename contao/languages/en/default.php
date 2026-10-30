<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user ("functions" in the user profile): create copies without the "(copy)"
// suffix. MSC.copyOf is the global template used when marking a copy, so this neutralises the
// suffix for ALL copy operations. Only relevant in the backend, where copies are created.
if (BackendSettings::user()?->copiedPageOrArticleWithoutLabelCopy) {
    $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
}

// Hint for insert tags (InsertTagHintListener)
$GLOBALS['TL_LANG']['MSC']['insertTagHint'] = array('Placeholders (insert tags) in this record', 'These contents are maintained elsewhere and only inserted here. Change them there and they are correct everywhere.');
$GLOBALS['TL_LANG']['MSC']['insertTagHintEdit'] = 'edit';
$GLOBALS['TL_LANG']['MSC']['insertTagHintEditOf'] = 'edit "%s"';
