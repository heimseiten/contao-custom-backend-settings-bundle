<?php
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/heimseitencontaocustombackendsettings/focus_the_field_name_on_load.js|static';
}
