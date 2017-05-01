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
}