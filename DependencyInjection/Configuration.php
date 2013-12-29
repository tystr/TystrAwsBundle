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

        return $treeBuilder;
    }

    protected function addGlobalConfiguration(NodeParentInterface $rootNode)
    {
        // regions obtained via executing the command `aws ec2 describe-regions`
        $regions = array(
            'eu-west-1',
            'sa-east-1',
            'us-east-1',
            'ap-northeast-1',
            'us-west-2',
            'us-west-1',
            'ap-southeast-1',
            'ap-southeast-2',
        );

        $rootNode
            ->children()
                ->scalarNode('access_key')->isRequired()->end()
                ->scalarNode('secret_access_key')->isRequired()->end()
                ->scalarNode('region')
                    ->isRequired()
                    ->validate()
                    ->ifNotInArray($regions)->thenInvalid('Invalid region %s')->end()
                ->end()
                ->arrayNode('config')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ->end();

        return $rootNode;
    }

    public function addS3Configuration(NodeParentInterface $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('s3')
                    ->children()
                        ->booleanNode('stream_wrapper')->defaultFalse()->end()
                    ->end()
                ->end()
            ->end()
         ->end();

        return $rootNode;
    }
}
