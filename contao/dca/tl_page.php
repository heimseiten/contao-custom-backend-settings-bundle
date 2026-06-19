<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user ("Funktionen" in the user profile): publish a new page immediately.
// A closure default is evaluated at creation time only (always a backend request with a
// logged-in user, see Contao\DC_Table), so it stays safe in the front end and on the CLI.
$GLOBALS['TL_DCA']['tl_page']['fields']['published']['default'] = static fn () => (bool) BackendSettings::user()?->publishPageOnCreate;
