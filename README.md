# ZfcTwig Module for Zend Framework 2

ZfcTwig is a module that integrates the [Twig](http://twig.sensiolabs.org) templating engine with
[Zend Framework 2](http://framework.zend.com).

## Installation

 1. Add `"amberovsky/zf2-twig": "dev-master"` to your `composer.json` file and run `php composer.phar update`.
 2. Add `ZfcTwig` to your `config/application.config.php` file under the `modules` key.

## Configuration

ZfcTwig has sane defaults out of the box but offers optional configuration via the `zfctwig` configuration key. For
detailed information on all available options see the [module config file](https://github.com/amberovsky/zf2-twig/tree/master/config/module.config.php)
class.

## Documentation

### Setting up Twig extensions

Extensions can be registered with Twig by adding the FQCN to the `extensions` configuration key which is exactly how the
ZfcTwig extension is registered.

```php
// in module configuration or autoload override
return array(
    'zfctwig' => array(
        'extensions' => array(
            // an extension that uses no key
            'My\Custom\Extension',

            // an extension with a key so that you can remove it from another module
            'my_custom_extension' => 'My\Custom\Extension'
        )
    )
);
```

### Configuring Twig loaders

By default, ZfcTwig uses a Twig_Loader_Chain so that loaders can be chained together. A convenient default is setup using
a [filesystem loader](https://github.com/amberovsky/zf2-twig/tree/master/Module.php#L36) with the path set to
`module/Application/view` which should work out of the box for most instances. If you wish to add additional loaders
to the chain you can register them by adding the service manager alias to the `loaders` configuration key.

```php
// in module configuration or autoload override
return array(
    'zfctwig' => array(
        'loaders' => array(
            'MyTwigFilesystemLoader'
        )
    )
);

// in some module
public function getServiceConfiguration()
{
    return array(
        'factories' => array(
            'MyTwigFilesystemLoader' => function($sm) {
                return new \Twig_Loader_Filesystem('my/custom/twig/path');
            }
        )
    );
}
```

### Using ZF2 View Helpers

Using ZF2 view helpers is supported through the [ZfcTwig\Twig\FallbackFunction](https://github.com/amberovsky/zf2-twig/tree/master/src/ZfcTwig/FallbackFunction.php)
function.

```twig
{# Simple view helper echo #}
{{ docType() }}

{# Echo with additional methods #}
{{ headTitle('My Company').setSeparator('-') }}

{# Using a view helper without an echo #}
{% do headTitle().setSeparator('-') %}

{# Combining view helpers #}
{% set url = ( url('my/custom/route') ) %}
```

# Examples

Example .twig files for the skeleton application can be found in the [examples](https://github.com/amberovsky/zf2-twig/tree/master/examples)
folder.

## Gotchas

ZF2 does not support multiple renderers with view helpers very well. As a workaround, ZfcTwig registers its own
`HelperPluginManager` that extends the default `Zend\View\HelperPluginManager` and adds the default as a peering manager.
This let's ZfcTwig register its own renderer with view helpers that require it and fallback to the default manager for
view helpers that do not require one.

As a caveat, you *must* register view helpers that require a renderer with ZfcTwig. An example can be seen in
`config/module.config.php` where the HelperConfig for the default navigation helpers is registered with ZfcTwig.