<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle;

use Contao\BackendUser;
use Contao\System;

/**
 * Helper for the per-user backend settings.
 */
final class BackendSettings
{
    /**
     * Returns the authenticated backend user when handling a backend request,
     * otherwise null. This keeps the per-user DCA tweaks safe in the front end
     * and on the command line (cache warmup), where there is no backend user.
     */
    public static function user(): ?BackendUser
    {
        $container = System::getContainer();
        $request = $container->get('request_stack')->getCurrentRequest();

        if (null === $request || !$container->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            return null;
        }

        $user = $container->get('security.helper')->getUser();

        return $user instanceof BackendUser ? $user : null;
    }
}
