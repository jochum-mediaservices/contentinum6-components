<?php
namespace ContentinumComponents\Middleware\I18n;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Locale;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\UrlHelper;
use ContentinumComponents\Options\PageParameters;

class SetLocaleMiddleware implements MiddlewareInterface
{

    private $helper;
    
    private $locales = array();
    
    /**
     * 
     * @param UrlHelper $helper
     */
    public function __construct(UrlHelper $helper, $locales)
    {
        $this->helper = $helper;
        $this->locales = $locales;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Interop\Http\ServerMiddleware\MiddlewareInterface::process()
     */
    public function process(ServerRequestInterface  $request,DelegateInterface $delegate)
    {
        $uri = $request->getUri();
        $path = $uri->getPath();
        
        // set page parameters: scheme, host, port and path
        $pageOptions = PageParameters::getInstance();
        $pageOptions->setHost($uri->getHost());
        $pageOptions->setProtocol($uri->getScheme());
        $pageOptions->setPort($uri->getPort());
        
        if (! preg_match('#^/(?P<locale>[a-z]{2,3}([-_][a-zA-Z]{2}|))/#', $path, $matches)) {
            Locale::setDefault($this->locales['de']);
            $pageOptions->setLocale($this->locales['de']);
            $pageOptions->setQuery($path);
            $pageOptions->generateParams();
            return $delegate->process($request);
        }
        
        $locale = $matches['locale'];
        $default = (isset($this->locales[$locale])) ? $this->locales[$locale] : $this->locales['de'];
        Locale::setDefault($default);
        $pageOptions->setLocale($default);
        $path = str_replace($matches[0] , '', $path);
        $pageOptions->setQuery($path);
        $pageOptions->generateParams();
        $this->helper->setBasePath($locale);
        
        return $delegate->process($request->withUri($uri->withPath(substr($path,3))));
    }
}