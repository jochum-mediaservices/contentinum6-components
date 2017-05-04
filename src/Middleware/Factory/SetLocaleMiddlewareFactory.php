<?php
namespace ContentinumComponents\Middleware\Factory;

use Interop\Container\ContainerInterface;
use ContentinumComponents\Middleware\I18n\SetLocaleMiddleware;
use Zend\Expressive\Helper\UrlHelper;

class SetLocaleMiddlewareFactory
{
    private $locales = array(
        'de' => 'de_DE.utf8',
        'gb' => 'en_GB.utf8',
        'it' => 'it_IT.utf8',
        'ca' => 'fr_CA.utf8',
        'es' => 'es_ES.utf8',
        'mx' => 'es_MX.utf8',
        'us' => 'en_US.utf8',
    );

    public function __invoke(ContainerInterface $container)
    {
        return new SetLocaleMiddleware($container->get(UrlHelper::class), $this->locales);
    }
}