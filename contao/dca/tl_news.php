<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user: publish a new news item immediately (closure default, see tl_page.php).
$GLOBALS['TL_DCA']['tl_news']['fields']['published']['default'] = static fn () => (bool) BackendSettings::user()?->publishNewsOnCreate;

// Per backend user: copy news items including all details (date, time, author, published).
if (($user = BackendSettings::user()) && $user->copyNewsWithAllDetails) {
    $GLOBALS['TL_DCA']['tl_news']['fields']['date']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['time']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['author']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_news']['fields']['published']['eval']['doNotCopy'] = false;
}
