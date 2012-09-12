<?php

namespace Skonsoft\Bundle\CvEditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('skonsoft_cv_editor');

        $rootNode
            ->children()
                ->scalarNode('provider_service_id')
                    ->defaultValue('skonsoft_cv_editor.textkernel_provider')
                    ->info('Which service used to parse the CV')
                    ->example('provider_service_id: skonsoft_cv_editor.textkernel_provider')
                ->end()
            ->end()
        ;


        return $treeBuilder;
    }
}
