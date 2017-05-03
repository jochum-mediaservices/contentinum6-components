<?php
namespace ContentinumComponents\Middleware\Factory;

use Interop\Container\ContainerInterface;
use ContentinumComponents\Middleware\I18n\SetLocaleMiddleware;
use Zend\Expressive\Helper\UrlHelper;

class SetLocaleMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        return new SetLocaleMiddleware($container->get(UrlHelper::class));
    }
}