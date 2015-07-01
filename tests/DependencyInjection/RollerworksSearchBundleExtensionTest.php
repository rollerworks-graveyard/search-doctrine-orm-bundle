<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineOrmBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Rollerworks\Bundle\SearchDoctrineOrmBundle\DependencyInjection\DependencyInjectionExtension;
use Symfony\Component\DependencyInjection\Definition;

final class RollerworksSearchBundleExtensionTest extends AbstractExtensionTestCase
{
    public function testFactoryIsAccessible()
    {
        $this->load();
        $this->compile();

        $this->container->get('rollerworks_search.doctrine_orm.factory');
    }

    public function tesWithCustomEntityManagers()
    {
        $config = [
            'entity_managers' => [
                'default',
                'secure',
            ],
            'cache_driver' => 'acme_test.orm.cache_driver',
        ];

        $this->container->setDefinition('acme_test.orm.cache_driver', new Definition('Doctrine\Common\Cache\PhpFileCache'));

        $this->load($config);
        $this->compile();

        $this->assertEquals(['default', 'secure'], $this->container->getParameter('rollerworks_search.doctrine_orm.entity_managers'));
        $this->assertContainerBuilderHasService('rollerworks_search.doctrine_orm.cache_driver', 'Doctrine\Common\Cache\PhpFileCache');
    }

    protected function getContainerExtensions()
    {
        return [
            new DependencyInjectionExtension(),
        ];
    }
}
