<?php
namespace ContentinumComponents\Middleware\Pages;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Locale;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\UrlHelper;
use ContentinumComponents\Options\PageOptions;
use ContentinumComponents\Options\PageParameters;

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
     * @return \Contentinum\Options\PageOptions
     */
    public function process(ServerRequestInterface  $request,DelegateInterface $delegate)
    {
        $uri = $request->getUri();
        $path = $uri->getPath();
        
        $pageOptions = PageParameters::getInstance();
        $pageOptions->setHost($uri->getHost());
        $pageOptions->setProtocol($uri->getScheme());
        $pageOptions->setPort($uri->getPort());
        
        
        if (! preg_match('#^/(?P<locale>[a-z]{2,3}([-_][a-zA-Z]{2}|))/#', $path, $matches)) {
            $pageOptions->setLocale(Locale::getDefault());
            $pageOptions->setQuery($path);
            $pageOptions->generateParams();
            return $delegate->process($request);
        }
        
        $locale = $matches['locale'];
        $pageOptions->setLocale(Locale::canonicalize($locale));
        $path = str_replace($matches[0] , '', $path);
        $pageOptions->setQuery($path);
        $pageOptions->generateParams();
        
        return $delegate->process($request);
    }
}