<?php
namespace ContentinumComponents\Middleware\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Helper\UrlHelper;
use ContentinumComponents\Middleware\Pages\SetPageOptionsMiddleware;
use ContentinumComponents\Options\PageOptions;

class SetPageOptionsMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        return new SetPageOptionsMiddleware($container->get(UrlHelper::class), new PageOptions([]));
    }
}