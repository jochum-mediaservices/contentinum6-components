<?php
namespace ContentinumComponents\Action;

use ContentinumComponents\Action\AbstractContentinumAction;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

abstract class AbstractApplicationAction extends AbstractContentinumAction
{
    /**
     * Zend\Expressive\Router\RouterInterface
     * @var \Zend\Expressive\Router\RouterInterface $router
     */
    protected $router;
    
    /**
     * Zend\Expressive\Template\TemplateRendererInterface
     * @var \Zend\Expressive\Template\TemplateRendererInterface $template
     */
    protected $template;
    
    /**
     * PageOptions
     *
     * @var Contentinum\Options\PageOptions
     */
    protected $pageOptions;
    
    /**
     * AbstractForms
     * @var \Contentinum\Forms\AbstractForms
     */
    protected $formFactory;

    /**
     * @return \Zend\Expressive\Router\RouterInterface $router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param \Zend\Expressive\Router\RouterInterface $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @return \Zend\Expressive\Template\TemplateRendererInterface $template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param \Zend\Expressive\Template\TemplateRendererInterface $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     *
     * @return \Contentinum\Options\PageOptions $pageOptions
     */
    public function getPageOptions()
    {
        return $this->pageOptions;
    }

    /**
     *
     * @param \Contentinum\Options\PageOptions $pageOptions            
     */
    public function setPageOptions($pageOptions)
    {
        $this->pageOptions = $pageOptions;
    }
    
    /**
     * @return the $formFactory
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    /**
     * @param \Contentinum\Forms\AbstractForms $formFactory
     */
    public function setFormFactory($formFactory)
    {
        $this->formFactory = $formFactory;
    }
    
    /**
     * 
     * @param Router\RouterInterface $router
     * @param Template\TemplateRendererInterface $template
     */
    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null)
    {
        $this->router   = $router;
        $this->template = $template;
    }
}