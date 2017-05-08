<?php


namespace ContentinumComponents\Action;




use ContentinumComponents\Action\AbstractApplicationAction;


abstract class AbstractLayoutAction extends AbstractApplicationAction
{
    /**
     * Root path
     * @var string
     */
    protected $rootPath;
    
    /**
     * Document root path
     * @var string
     */
    protected $documentRoot;
    
    /**
     * @return the $rootPath
     */
    public function getRootPath()
    {
        return $this->rootPath;
    }

    /**
     * @param string $rootPath
     */
    public function setRootPath($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * @return the $documentRoot
     */
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }

    /**
     * @param string $documentRoot
     */
    public function setDocumentRoot($documentRoot)
    {
        $this->documentRoot = $documentRoot;
    }

    /**
     * Webpage title
     * 
     * @param Zend\View\Model\ViewModel $layout
     * @param ContentinumComponents\Options\PageParameters $pageOptions
     * @return \Zend\View\Model\ViewModel
     */
    protected function setTitle(\Zend\View\Model\ViewModel $layout, \ContentinumComponents\Options\PageParameters $pageOptions)
    {
        $seperator = ' - ';
        $appendTitle = 'unkown title';
        $prependTitle = 'unknown';
        if (null !== ($metaTitle = $pageOptions->getMetaTitle())) {
            $prependTitle = $metaTitle;
        }
        
        if (null !== ($title = $pageOptions->getTitle() )) {
            $appendTitle = $title;
        }   
        $layout->headtitle = $appendTitle . $seperator . $prependTitle;
        return $layout;
    }
    
}