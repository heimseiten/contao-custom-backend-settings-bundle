<?php

declare(strict_types=1);

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user ("Funktionen" in the user profile): publish a new article immediately.
$GLOBALS['TL_DCA']['tl_article']['fields']['published']['default'] = static fn () => (bool) BackendSettings::user()?->publishArticleOnCreate;
