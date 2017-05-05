<?php
namespace ContentinumComponents\Action;

use ContentinumComponents\Action\AbstractContentinumAction;

abstract class AbstractApplicationAction extends AbstractContentinumAction
{

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
}