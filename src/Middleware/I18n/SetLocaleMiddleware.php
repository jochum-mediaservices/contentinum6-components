<?php
namespace ContentinumComponents\Middleware\I18n;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Locale;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\UrlHelper;

class SetLocaleMiddleware implements MiddlewareInterface
{
    private $helper;
    
    
    public function __construct(UrlHelper $helper)
    {
        $this->helper = $helper;
    }
    
    public function process(ServerRequestInterface  $request,DelegateInterface $delegate)
    {
        $uri = $request->getUri();
        
        $path = $uri->getPath();
        
        if (! preg_match('#^/(?P<locale>[a-z]{2,3}([-_][a-zA-Z]{2}|))/#', $path, $matches)) {
            Locale::setDefault('de_DE');
            return $delegate->process($request);
        }
        
        $locale = $matches['locale'];
        Locale::setDefault(Locale::canonicalize($locale));
        $this->helper->setBasePath($locale);
        
        return $delegate->process($request->withUri($uri->withPath(substr($path,3))));
    }
}