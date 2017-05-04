<?php
namespace ContentinumComponents\Middleware\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Helper\UrlHelper;
use ContentinumComponents\Middleware\Pages\SetPageOptionsMiddleware;

class SetPageOptionsMiddlewareFactory
{
    /**
     * 
     * @param ContainerInterface $container
     * @return \ContentinumComponents\Middleware\Pages\SetPageOptionsMiddleware
     */
    public function __invoke(ContainerInterface $container)
    {
        return new SetPageOptionsMiddleware($container->get(UrlHelper::class));
    }
}