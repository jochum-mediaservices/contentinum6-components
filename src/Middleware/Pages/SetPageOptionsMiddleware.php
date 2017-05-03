<?php
namespace ContentinumComponents\Middleware\Pages;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Locale;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\UrlHelper;
use ContentinumComponents\Options\PageOptions;

class SetPageOptionsMiddleware implements MiddlewareInterface
{

    private $helper;
    
    /**
     * 
     * @var \Contentinum\Options\PageOptions $pageOptions
     */
    private $pageOptions;
    
    /**
     * 
     * @param UrlHelper $helper
     */
    public function __construct(UrlHelper $helper, PageOptions $pageOptions)
    {
        $this->helper = $helper;
        $this->pageOptions = $pageOptions;
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
        
        $this->pageOptions->setHost($uri->getHost());
        $this->pageOptions->setProtocol($uri->getScheme());
        $this->pageOptions->setPort($uri->getPort());
        
        
        if (! preg_match('#^/(?P<locale>[a-z]{2,3}([-_][a-zA-Z]{2}|))/#', $path, $matches)) {
            $this->pageOptions->setLocale(Locale::getDefault());
            $this->pageOptions->setQuery($path);
            $this->pageOptions->generateParams();
            return $this->pageOptions;
        }
        
        $locale = $matches['locale'];
        $this->pageOptions->setLocale(Locale::canonicalize($locale));
        $path = str_replace($matches[0] , '', $path);
        Locale::setDefault();
        $this->pageOptions->setQuery($path);
        $this->pageOptions->generateParams();
        
        return $this->pageOptions;
    }
}