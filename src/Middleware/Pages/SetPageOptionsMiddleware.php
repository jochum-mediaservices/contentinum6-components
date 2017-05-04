<?php
namespace ContentinumComponents\Middleware\Pages;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\UrlHelper;

class SetPageOptionsMiddleware implements MiddlewareInterface
{

    private $helper;
    

    
    /**
     * 
     * @param UrlHelper $helper
     */
    public function __construct(UrlHelper $helper)
    {
        $this->helper = $helper;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Interop\Http\ServerMiddleware\MiddlewareInterface::process()
     */
    public function process(ServerRequestInterface  $request,DelegateInterface $delegate)
    {
        
        return $delegate->process($request);
    }
}