<?php

if ( Contao\Config::get('copyEventsWithAllDetails') ) {
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['startTime']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['endTime']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['startDate']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['endDate']['eval']['doNotCopy'] = false;
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['addTime']['eval']['doNotCopy'] = false;  
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['published']['eval']['doNotCopy'] = false;
}

if ( Contao\Config::get('publishEventOnCreate') ) {
    $GLOBALS['TL_DCA']['tl_calendar_events']['fields']['published']['default'] = true;
}
