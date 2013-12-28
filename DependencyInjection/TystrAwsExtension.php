<?php

namespace Tystr\Bundle\AwsBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * @author Tyler Stroud <tyler@tylerstroud.com>
 */
class TystrAwsExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $config['config']['access_key'] = $config['access_key'];
        $config['config']['secret_access_key'] = $config['secret_access_key'];
        $config['config']['region'] = $config['region'];
        $container->setParameter('tystr_aws.config', $config['config']);
        $container->setParameter('tystr_aws.s3.config', $config['s3']['config']);
        $container->setParameter('tystr_aws.route53.config', $config['route53']['config']);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
