<?php

namespace Tystr\Bundle\AwsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeParentInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tyler Stroud <tyler@tylerstroud.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tystr_aws');

        $this->addGlobalConfiguration($rootNode);
        $this->addS3Configuration($rootNode);
        $this->addRoute53Configuration($rootNode);

        return $treeBuilder;
    }

    protected function addGlobalConfiguration(NodeParentInterface $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode('access_key')->isRequired()->end()
                ->scalarNode('secret_access_key')->isRequired()->end()
                ->scalarNode('region')->isRequired()->end()
                ->arrayNode('config')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }
    /**
     * @param NodeParentInterface $rootNode
     *
     * @return NodeParentInterface
     */
    protected function addS3Configuration(NodeParentInterface $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('s3')
                    ->children()
                        ->scalarNode('access_key')->isRequired()->end()
                        ->scalarNode('secret_access_key')->isRequired()->end()
                        ->arrayNode('config')
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }

    /**
     * @param NodeParentInterface $rootNode
     *
     * @return NodeParentInterface
     */
    protected function addRoute53Configuration(NodeParentInterface $rootNode)
    {

        $rootNode
            ->children()
                ->arrayNode('route53')
                    ->children()
                        ->scalarNode('access_key')->isRequired()->end()
                        ->scalarNode('secret_access_key')->isRequired()->end()
                        ->arrayNode('config')
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }
}
