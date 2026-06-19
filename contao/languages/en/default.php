<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user ("functions" in the user profile): create copies without the "(copy)"
// suffix. MSC.copyOf is the global template used when marking a copy, so this neutralises the
// suffix for ALL copy operations. Only relevant in the backend, where copies are created.
if (BackendSettings::user()?->copiedPageOrArticleWithoutLabelCopy) {
    $GLOBALS['TL_LANG']['MSC']['copyOf'] = '%s';
}
