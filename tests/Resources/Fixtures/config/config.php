<?php

/*
 * This file is part of the RollerworksSearch package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/* @var $container \Symfony\Component\DependencyInjection\ContainerBuilder */
$container->loadFromExtension(
    'rollerworks_search_doctrine_orm',
    [
        'entity_managers' => ['default', 'secure'],
        'cache_driver' => null,
    ]
);
