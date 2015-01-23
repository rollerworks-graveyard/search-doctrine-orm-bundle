<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Rollerworks\Bundle\SearchDoctrineOrmBundle\Tests\Unit\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionConfigurationTestCase;
use Rollerworks\Bundle\SearchDoctrineOrmBundle\DependencyInjection\Configuration;
use Rollerworks\Bundle\SearchDoctrineOrmBundle\DependencyInjection\DependencyInjectionExtension;

class ExtensionConfigurationTest extends AbstractExtensionConfigurationTestCase
{
    public function testSupportsAllConfigFormats()
    {
        $expectedConfiguration = array(
            'entity_managers' => array('default', 'secure'),
            'cache_driver' => null,
        );

        $formats = array_map(
            function ($path) {
                return __DIR__.'/../Resources/Fixtures/'.$path;
            },
            array(
                'config/config.yml',
                'config/config.xml',
                'config/config.php',
            )
        );

        foreach ($formats as $format) {
            $this->assertProcessedConfigurationEquals($expectedConfiguration, array($format));
        }
    }

    protected function getContainerExtension()
    {
        return new DependencyInjectionExtension();
    }

    protected function getConfiguration()
    {
        return new Configuration(DependencyInjectionExtension::EXTENSION_ALIAS);
    }
}
