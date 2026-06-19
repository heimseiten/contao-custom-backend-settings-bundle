<?php
declare(strict_types=1);

namespace Heimseiten\ContaoCustomBackendSettingsBundle;

use Heimseiten\ContaoCustomBackendSettingsBundle\DependencyInjection\Compiler\RemoveGenerateArticleForPagePass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class HeimseitenContaoCustomBackendSettingsBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yml');
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Remove Contao's automatic article-generation callback (replaced by
        // PreventArticleGenerationListener). Must run after the autoconfiguration tags are
        // applied (priority 100) and before Contao's DataContainerCallbackPass (priority 0).
        $container->addCompilerPass(new RemoveGenerateArticleForPagePass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 10);
    }
}
