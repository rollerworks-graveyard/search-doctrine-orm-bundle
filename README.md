RollerworksSearchDoctrineOrmBundle
==================================

Main purpose of this bundle is to integrate the [RollerworksSearch Doctrine ORM extension][1]
with any Symfony based application.

    RollerworksSearch provides a powerful searching system.

Installation
------------

This package is an extension for the [RollerworksSearchBundle][2]
make sure you have successfully installed and configured the bundle before continuing.

Require the rollerworks/search-doctrine-orm-bundle package in your composer.json
and update your dependencies.

```bash
$ composer require rollerworks/search-doctrine-orm-bundle
```

Add the RollerworksSearchDoctrineOrmBundle to your application's kernel:

```php
// in AppKernel::registerBundles()
$bundles = array(
    ...
    new Rollerworks\Bundle\SearchBundle\RollerworksSearchBundle(),
    new Rollerworks\Bundle\SearchDoctrineDbalBundle\RollerworksSearchDoctrineDbalBundle(),
    new Rollerworks\Bundle\SearchDoctrineOrmBundle\RollerworksSearchDoctrineOrmBundle(),
    ...
);
```

Configuration
-------------

The RollerworksSearchDoctrineOrmBundle is already pre-configured and does not require
configuring. But you properly want to configure a 'real' cache which stays persistent
between page requests.

### Caching

The Caching system uses the doctrine/cache system for caching generated SQL/DQL queries.
You can use any driver supported by Doctrine for caching.

**Note:** The default driver uses an array which is only cached in memory.

Use a service-id as value for `rollerworks_search_doctrine_orm.cache_driver`.

``` yaml
# app/config/config.yml
rollerworks_search_doctrine_orm:
    cache_driver: rollerworks_search.doctrine_orm.cache.array_driver
```

### Multiple EntityManagers

If you want to use the search system with other EntityManagers then the "default"
you can configure this with the following:

``` yaml
# app/config/config.yml
rollerworks_search_doctrine_orm:
    entity_managers: [default, second]
```

Usage
-----

The `rollerworks_search.doctrine_orm.factory` service provides the
`Rollerworks\Component\Search\Doctrine\Orm\DoctrineOrmFactory` for creating WhereBuilders.

License
-------

The source of this package is subject to the MIT license that is bundled
with this source code in the file [LICENSE](LICENSE).

Contributing
------------

This is an open source project. If you'd like to contribute,
please read the [Contributing Code][4] part of Symfony for the basics. If you're submitting
a pull request, please follow the guidelines in the [Submitting a Patch][5] section.

[1]: https://github.com/rollerworks/rollerworks-search-doctrine-orm
[2]: https://github.com/rollerworks/RollerworksSearch
[3]: https://github.com/rollerworks/Cache
[4]: http://symfony.com/doc/current/contributing/code/index.html
[5]: http://symfony.com/doc/current/contributing/code/patches.html#check-list
