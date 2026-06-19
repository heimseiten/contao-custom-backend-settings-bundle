<?php

use Heimseiten\ContaoCustomBackendSettingsBundle\BackendSettings;

// Per backend user: publish a new event immediately (closure default, see tl_page.php).
$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['published']['default'] = static fn () => (bool) BackendSettings::user()?->publishEventOnCreate;

// Per backend user: copy events including all details (dates, times, published).
if (($user = BackendSettings::user()) && $user->copyEventsWithAllDetails) {
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['startTime']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['endTime']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['startDate']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['endDate']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['addTime']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['published']['eval']['doNotCopy'] = false;
}
