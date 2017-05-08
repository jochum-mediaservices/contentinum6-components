<?php


namespace ContentinumComponents\Action;




use ContentinumComponents\Action\AbstractApplicationAction;
use ContentinumComponents\Assets\Manager;


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
     * Set navigation
     * @param Zend\View\Model\ViewModel $layout
     * @param unknown $navigation
     * @param unknown $identity
     * @return \Zend\View\Model\ViewModel
     */
    protected function setNavigation($layout, $navigation, $identity)
    {
        foreach ($navigation->navigation->default as $entry) {
            if ('Mcwork_Controller_User' == $entry->label) {
                $entry->label = 'Hallo '. $identity->name;
            }
        }
        $layout->mcworknavigation = new \Zend\Navigation\Navigation($navigation->navigation->default->toArray());
        return $layout;
    }
    
    /**
     * Set access right in layout template
     * 
     * @param Zend\View\Model\ViewModel $layout
     * @param unknown $role
     * @param unknown $acl
     * @return \Zend\View\Model\ViewModel
     */
    protected function setAccessRights($layout,$role, $acl)
    {
        $layout->role = $role;
        $layout->acl = $acl;
        return $layout;
    }
    
    /**
     * Webpage title
     *
     * @param Zend\View\Model\ViewModel $layout
     * @param ContentinumComponents\Options\PageParameters $pageOptions
     * @return \Zend\View\Model\ViewModel
     */
    protected function setAssets(\Zend\View\Model\ViewModel $layout, \ContentinumComponents\Options\PageParameters $pageOptions)
    {
        $am = new Manager();
        $am->setDocumentRoot($this->getDocumentRoot());
        $am->setRootPath($this->getRootPath());
        $am->set($pageOptions->getAssets());
        $layout->stylesheets = $am->getStylesheets();
        $layout->scripthead = $am->getHeadLink();
        $layout->scriptInline = $am->getInlineLink();
        $str = '';
        if (null !== ($scripts = $pageOptions->getBodyFooterScript())){
            foreach ($scripts['prepend'] as $key => $script){
                $str .= $am->getInlineLinkScript($script);
            }
            $layout->prependScripts = $str;
        }
        return $layout;
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
    
    /**
     * Set further attributtes:
     * charset
     *
     * @param Zend\View\Model\ViewModel $layout
     * @param ContentinumComponents\Options\PageParameters $pageOptions
     * @return \Zend\View\Model\ViewModel
     */
    protected function setAttribute(\Zend\View\Model\ViewModel $layout, \ContentinumComponents\Options\PageParameters $pageOptions)
    {
        $layout->charset = $pageOptions->getCharset();
        $layout->viewport = $pageOptions->getMetaViewport();
        if (null !== ($lang = $pageOptions->getLanguage())){
            $layout->language = ' lang="'.$lang.'"';
        }
        if (null !== ($bodyId = $pageOptions->getBodyId())){
            $layout->bodyIdent = ' id="' . $bodyId . '"';
        }
        return $layout;
    }
    
}