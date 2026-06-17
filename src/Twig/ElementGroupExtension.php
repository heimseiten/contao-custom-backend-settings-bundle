<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class ElementGroupExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('element_group_cssclass', [ElementGroupRuntime::class, 'getCssClass']),
        ];
    }
}
