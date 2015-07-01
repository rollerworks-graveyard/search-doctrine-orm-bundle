<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineOrmBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class DependencyInjectionExtension extends Extension
{
    const EXTENSION_ALIAS = 'rollerworks_search_doctrine_orm';

    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration(self::EXTENSION_ALIAS);
        $config = $this->processConfiguration($configuration, $config);

        if (empty($config['entity_managers'])) {
            $config['entity_managers'] = ['default'];
        }

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setAlias('rollerworks_search.doctrine_orm.cache_driver', $config['cache_driver']);
        $container->setParameter('rollerworks_search.doctrine_orm.entity_managers', $config['entity_managers']);
    }

    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    public function getNamespace()
    {
        return 'http://rollerworks.github.io/schema/search/sf-dic/rollerworks-search-doctrine-orm';
    }

    public function getAlias()
    {
        return self::EXTENSION_ALIAS;
    }
}
