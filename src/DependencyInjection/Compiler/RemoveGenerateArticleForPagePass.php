<?php

declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Removes Contao's "generateArticleForPage" callback (config.onsubmit on tl_page) so it can be
 * replaced by PreventArticleGenerationListener, which only runs it when the global setting
 * "preventArticleOnPageCreate" is off. A simple second callback cannot stop the core one, hence
 * this pass (see https://community.contao.org/de/showthread.php?88272).
 */
final class RemoveGenerateArticleForPagePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $serviceId = 'contao.listener.data_container.content_composition';

        if (!$container->hasDefinition($serviceId)) {
            return;
        }

        $definition = $container->getDefinition($serviceId);
        $tags = $definition->getTags();

        if (empty($tags['contao.callback'])) {
            return;
        }

        $tags['contao.callback'] = array_values(array_filter(
            $tags['contao.callback'],
            static fn (array $attributes): bool => 'generateArticleForPage' !== ($attributes['method'] ?? null),
        ));

        $definition->setTags($tags);
    }
}
