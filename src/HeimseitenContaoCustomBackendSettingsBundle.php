<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimseitenContaoCustomBackendSettingsBundle extends Bundle
{	
	public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}