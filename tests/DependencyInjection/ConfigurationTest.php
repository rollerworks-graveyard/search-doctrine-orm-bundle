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

use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;
use Rollerworks\Bundle\SearchDoctrineOrmBundle\DependencyInjection\Configuration;

class ConfigurationTest extends AbstractConfigurationTestCase
{
    public function testDefaultsAreValid()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array(),
            ),
            array(
                'entity_managers' => array(),
                'cache_driver' => 'rollerworks_search.doctrine_orm.cache.array_driver',
            )
        );
    }

    public function testCustomEntityManagers()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array(
                    'entity_managers' => array('default', 'custom'),
                ),
            ),
            array(
                'entity_managers' => array('default', 'custom'),
                'cache_driver' => 'rollerworks_search.doctrine_orm.cache.array_driver',
            )
        );
    }

    protected function getConfiguration()
    {
        return new Configuration('search');
    }
}
