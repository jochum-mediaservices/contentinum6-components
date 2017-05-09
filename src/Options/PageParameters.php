<?php
namespace ContentinumComponents\Options;

use ContentinumComponents\Options\Exception\InvalidArgumentException;
use ContentinumComponents\Tools\ArrayMergeRecursiveDistinct;

/**
 * 
 * @author mjochum
 *
 */
class PageParameters
{

    const URL_SEPERATOR = '/';

    const URL_I = 1;

    /**
     * instance
     *
     * Statische Variable, um die aktuelle (einzige!) Instanz dieser Klasse zu halten
     *
     * @var Singleton
     */
    protected static $instance = null;

    /**
     *
     * @var array
     */
    protected $appProperties = [
        'controller',
        'worker',
        'entity',
        'entitymanager',
        'formfactory',
        'formdecorators',
        'form',
        'formaction',
        'formattributes',
        'formbuttons',
        'targetentities',
        'hasEntries',
        'setcategrory',
        'setcategroryvalue',
        'settoroute',
        'setexclude',
        'parentGroup',
        'populateFromRoute',
        'populateFromGroup',
        'populateFromFactory',
        'populateFromDb',
        'populateSerializeFields',
        'populateSerialize',
        'populateentity',
        'populate',
        'notpopulate',
        'services',
        'appparameter',
        'querykey'
    ];

    /**
     *
     * @var array
     */
    protected $routeParams = [
        'pages',
        'section',
        'article',
        'category',
        'categoryvalue'
    ];

    /**
     * Container standard options
     *
     * @var string
     */
    protected $standardParameters = '_default';

    /**
     * Application standard domain
     *
     * @var string
     */
    protected $standardDomain;
    
    /**
     * 
     * @var unknown
     */
    protected $acl;
    
    /**
     * 
     * @var unknown
     */
    protected $role;

    /**
     * Page, Default page and preferences indetifier
     *
     * @var unknown
     */
    protected $id;

    /**
     * Host name
     *
     * @var string
     */
    protected $host;

    /**
     * Host name
     *
     * @var string
     */
    protected $hostId;

    /**
     * Charset
     *
     * @var string
     */
    protected $charset;

    /**
     * Protocol
     *
     * @var string
     */
    protected $protocol;

    /**
     * Port
     *
     * @var int
     */
    protected $port;

    /**
     * REQUEST_URI
     *
     * @var string
     */
    protected $query;

    /**
     * Aplication locale
     *
     * @var string
     */
    protected $locale;

    /**
     *
     * @var string
     */
    protected $url;

    /**
     * Query parameter and values
     *
     * @var array
     */
    protected $params;

    /**
     * Active page url
     *
     * @var string
     */
    protected $active;

    /**
     *
     * @var string
     */
    protected $nocache;

    /**
     *
     * @var date string
     */
    protected $publishUp;

    /**
     *
     * @var date string
     */
    protected $publishDown;

    /**
     * Split query before further processing
     *
     * @var int
     */
    protected $splitQuery;

    /**
     * Application parameters
     *
     * @var array
     */
    protected $app = [];

    /**
     * Application asset files
     *
     * @var array
     */
    protected $assets;

    /**
     * Webpage title
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var string
     */
    protected $linkTitle;

    /**
     * Access resource
     *
     * @var string
     */
    protected $resource;

    /**
     * Path to layout file
     *
     * @var string
     */
    protected $layout;

    /**
     * Path to template file
     *
     * @var string
     */
    protected $template;

    /**
     *
     * @var string
     */
    protected $htmlstructure;

    /**
     * Enable/Disable toolbar
     *
     * @var int
     */
    protected $toolbar = 0;

    /**
     * Enable/Disable toolbar in table row
     *
     * @var int
     */
    protected $tableedit = 0;

    /**
     *
     * @var array
     */
    protected $pageHeaders;

    /**
     * Body dom ident
     *
     * @var string
     */
    protected $bodyId;

    /**
     *
     * @var string
     */
    protected $label;

    /**
     * Page Title
     *
     * @var unknown
     */
    protected $metaTitle;

    /**
     *
     * @var string
     */
    protected $metaDescription;

    /**
     *
     * @var string
     */
    protected $metaKeywords;

    /**
     * User viewport
     *
     * @var string
     */
    protected $metaViewport;

    /**
     *
     * @var string
     */
    protected $robots;

    /**
     *
     * @var string
     */
    protected $language;

    /**
     *
     * @var string
     */
    protected $languageParent;

    /**
     * Default time zone
     *
     * @var string
     */
    protected $timeZone;

    /**
     * Website author
     * 
     * @var string
     */
    protected $author;

    /**
     * Google account ident
     * 
     * @var string
     */
    protected $googleaccount;

    /**
     *
     * @var array
     */
    protected $bodyFooterScript;

    /**
     *
     * @var unknown
     */
    protected $inlineScript;

    /**
     *
     * @var string
     */
    protected $headStyle;

    /**
     * Page content
     *
     * @var unknown
     */
    protected $pageContent;

    /**
     *
     * @return the $standardParameters
     */
    public function getStandardParameters()
    {
        return $this->standardParameters;
    }

    /**
     *
     * @param string $standardParameters            
     */
    public function setStandardParameters($standardParameters)
    {
        $this->standardParameters = $standardParameters;
    }

    /**
     *
     * @return the $standardDomain
     */
    public function getStandardDomain()
    {
        return $this->standardDomain;
    }

    /**
     *
     * @param string $standardDomain            
     */
    public function setStandardDomain($standardDomain)
    {
        $this->standardDomain = $standardDomain;
    }

    /**
     * @return the $acl
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @param \ContentinumComponents\Options\unknown $acl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }

    /**
     * @return the $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param \ContentinumComponents\Options\unknown $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param \ContentinumComponents\Page\unknown $id            
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return the $host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     *
     * @param string $host            
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     *
     * @return the $hostId
     */
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     *
     * @param string $hostId            
     */
    public function setHostId($hostId)
    {
        $this->hostId = $hostId;
    }

    /**
     *
     * @return the $charset
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     *
     * @param string $charset            
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     *
     * @return the $protocol
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     *
     * @param string $protocol            
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     *
     * @return the $port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     *
     * @param number $port            
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     *
     * @return the $query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     *
     * @param string $query            
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     *
     * @return the $locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     *
     * @param string $locale            
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return the $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     *
     * @return the $params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     *
     * @param array $params            
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return the $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return the $nocache
     */
    public function getNocache()
    {
        return $this->nocache;
    }

    /**
     * @param string $nocache
     */
    public function setNocache($nocache)
    {
        $this->nocache = $nocache;
    }

    /**
     * @return the $publishUp
     */
    public function getPublishUp()
    {
        return $this->publishUp;
    }

    /**
     * @param \ContentinumComponents\Options\date $publishUp
     */
    public function setPublishUp($publishUp)
    {
        $this->publishUp = $publishUp;
    }

    /**
     * @return the $publishDown
     */
    public function getPublishDown()
    {
        return $this->publishDown;
    }

    /**
     * @param \ContentinumComponents\Options\date $publishDown
     */
    public function setPublishDown($publishDown)
    {
        $this->publishDown = $publishDown;
    }

    /**
     * @return the $splitQuery
     */
    public function getSplitQuery()
    {
        return $this->splitQuery;
    }

    /**
     * @param number $splitQuery
     */
    public function setSplitQuery($splitQuery)
    {
        $this->splitQuery = $splitQuery;
    }

    /**
     *
     * @return the $app
     */
    public function getApp($property = null)
    {
        if (null === $property) {
            return $this->app;
        }
        
        if (isset($this->app[$property])) {
            return $this->app[$property];
        } else {
            return false;
        }
    }
    
    /**
     *
     * @param array $app
     */
    public function setApp($app)
    {
        foreach ($app as $property => $value) {
            if (in_array($property, $this->appProperties)) {
                $this->app[$property] = $value;
            }
        }
    }
    
    /**
     *
     * @param unknown $property
     * @param unknown $value
     */
    public function addAppOptions($property, $value)
    {
        if (in_array($property, $this->appProperties)) {
            $this->app[$property] = $value;
        }
    }

    /**
     * @return the $assets
     */
    public function getAssets()
    {
        return $this->assets;
    }

    /**
     * @param array $assets
     */
    public function setAssets($assets)
    {
        if (null === $this->assets){
            $this->assets = $assets;
        } elseif ( is_string($assets) ){
            $this->assets = array('template' => '/' . $assets);
        } else {
            $this->assets = ArrayMergeRecursiveDistinct::merge($this->assets, $assets);
        }
    }

    /**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return the $linkTitle
     */
    public function getLinkTitle()
    {
        return $this->linkTitle;
    }

    /**
     * @param string $linkTitle
     */
    public function setLinkTitle($linkTitle)
    {
        $this->linkTitle = $linkTitle;
    }

    /**
     * @return the $resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param string $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return the $layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return the $template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return the $htmlstructure
     */
    public function getHtmlstructure()
    {
        return $this->htmlstructure;
    }

    /**
     * @param string $htmlstructure
     */
    public function setHtmlstructure($htmlstructure)
    {
        $this->htmlstructure = $htmlstructure;
    }

    /**
     * @return the $toolbar
     */
    public function getToolbar()
    {
        return $this->toolbar;
    }

    /**
     * @param number $toolbar
     */
    public function setToolbar($toolbar)
    {
        $this->toolbar = $toolbar;
    }

    /**
     * @return the $tableedit
     */
    public function getTableedit()
    {
        return $this->tableedit;
    }

    /**
     * @param number $tableedit
     */
    public function setTableedit($tableedit)
    {
        $this->tableedit = $tableedit;
    }

    /**
     * @return the $pageHeaders
     */
    public function getPageHeaders()
    {
        return $this->pageHeaders;
    }

    /**
     * @param array $pageHeaders
     */
    public function setPageHeaders($pageHeaders)
    {
        $this->pageHeaders = $pageHeaders;
    }

    /**
     * @return the $bodyId
     */
    public function getBodyId()
    {
        return $this->bodyId;
    }

    /**
     * @param string $bodyId
     */
    public function setBodyId($bodyId)
    {
        $this->bodyId = $bodyId;
    }

    /**
     * @return the $label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return the $metaTitle
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param \ContentinumComponents\Options\unknown $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return the $metaDescription
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return the $metaKeywords
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return the $metaViewport
     */
    public function getMetaViewport()
    {
        return $this->metaViewport;
    }

    /**
     * @param string $metaViewport
     */
    public function setMetaViewport($metaViewport)
    {
        $this->metaViewport = $metaViewport;
    }

    /**
     * @return the $robots
     */
    public function getRobots()
    {
        return $this->robots;
    }

    /**
     * @param string $robots
     */
    public function setRobots($robots)
    {
        $this->robots = $robots;
    }

    /**
     * @return the $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return the $languageParent
     */
    public function getLanguageParent()
    {
        return $this->languageParent;
    }

    /**
     * @param string $languageParent
     */
    public function setLanguageParent($languageParent)
    {
        $this->languageParent = $languageParent;
    }

    /**
     * @return the $timeZone
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param string $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return the $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return the $googleaccount
     */
    public function getGoogleaccount()
    {
        return $this->googleaccount;
    }

    /**
     * @param string $googleaccount
     */
    public function setGoogleaccount($googleaccount)
    {
        $this->googleaccount = $googleaccount;
    }

    /**
     * @return the $bodyFooterScript
     */
    public function getBodyFooterScript()
    {
        return $this->bodyFooterScript;
    }

    /**
     * @param array $bodyFooterScript
     */
    public function setBodyFooterScript($bodyFooterScript)
    {
        $this->bodyFooterScript = $bodyFooterScript;
    }

    /**
     * @return the $inlineScript
     */
    public function getInlineScript()
    {
        return $this->inlineScript;
    }

    /**
     * @param \ContentinumComponents\Options\unknown $inlineScript
     */
    public function setInlineScript($inlineScript)
    {
        $this->inlineScript = $inlineScript;
    }

    /**
     * @return the $headStyle
     */
    public function getHeadStyle()
    {
        return $this->headStyle;
    }

    /**
     * @param string $headStyle
     */
    public function setHeadStyle($headStyle)
    {
        $this->headStyle = $headStyle;
    }

    /**
     * @return the $pageContent
     */
    public function getPageContent()
    {
        return $this->pageContent;
    }

    /**
     * @param \ContentinumComponents\Options\unknown $pageContent
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
    }

    /**
     * get instance
     *
     * Falls die einzige Instanz noch nicht existiert, erstelle sie
     * Gebe die einzige Instanz dann zurück
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     * @param string $property            
     * @param mixed $parameter            
     */
    public function addParameter($property, $parameter)
    {
        $this->params[$property] = $parameter;
    }

    /**
     *
     * @param unknown $property            
     * @return mixed|boolean
     */
    public function getParameter($property)
    {
        if (isset($this->params[$property]) && strlen($this->params[$property]) > 0) {
            return $this->params[$property];
        } else {
            return false;
        }
    }
    
    /**
     * Split page url
     *
     * @param string $query
     * @param int $i
     * @param sting $seperator
     * @return string
     */
    public function split($query = null, $i = null, $seperator = null, $remove = true)
    {
        if (! $query) {
            $query = $this->query;
        }
        
        if (null === $i) {
            $i = self::URL_I;
        }
        
        if (null === $seperator) {
            $seperator = self::URL_SEPERATOR;
        }
        
        if (true === $remove) {
            if (substr($query, 0, 1) === $seperator) {
                $query = substr($query, 1);
            }
        }
        
        return implode($seperator, array_slice(explode($seperator, $query), 0, $i, true));
    }

    /**
     *
     * @param string $query            
     * @param string $seperator            
     */
    public function generateParams($query = null, $seperator = null)
    {
        if (! $query) {
            $query = $this->query;
        }
        
        if (null === $seperator) {
            $seperator = self::URL_SEPERATOR;
        }
        $parts = [];
        if (null != $query) {
            $query = ltrim($query, $seperator);
            $parts = explode($seperator, $query);
        }
        foreach ($this->routeParams as $i => $param) {
            if (isset($parts[$i])) {
                $this->addParameter($param, $parts[$i]);
            } else {
                $this->addParameter($param, false);
            }
        }
    }
    
    /**
     *
     * @param array $pageOptions
     * @param string $stdParams
     */
    public function addOptions($options, $standardParameters = null, $force = false)
    {
        if (null !== $standardParameters) {
            $this->standardParameters = $standardParameters;
        }
        
        if (isset($options[$this->standardParameters])) {
            $this->setOptions($options[$this->standardParameters]);
        } else {
            if (true === $force) {
                throw new InvalidArgumentException('Parameter not found');
            }
        }
    }
    
    /**
     * Page attribute in Zend\Config\Config
     * @param Zend\Config\Config $page Zend\Config\Config
     */
    public function addPage($page)
    {
        $this->setOptions($page);
    }
    
    /**
     * Set page options overwrite exist parameters
     *
     * @param array $pageOptions
     */
    public function setOptions($options)
    {
        $properties = get_object_vars($this);
        if (is_object($options) && method_exists($this, 'toArray')) {
            $options = $options->toArray();
        }
        foreach ($options as $property => $option) {
            if (in_array($property, $properties)) {
                switch ($property){
                    case 'host':
                    case 'scope':
                    case 'createdBy' :
                    case 'updateBy' :
                    case 'registerDate':
                    case 'upDate':
                        continue;
                        break;
                    default:
                        if (is_array($option) || strlen($option) > 0) {
                            if ('app' == $property) {
                                $this->setApp($option);
                            } elseif ('headStyle' == $property){
                                $this->setHeadStyle($option);
                            } elseif ('assets' == $property){
                                $this->setAssets($option);
                            } elseif ('id' == $property){
                                $this->setId($option);
                            } elseif ('parentPage' == $property){
                                $this->addParameter('parentPage', $option);
                            } else {
                                $this->{$property} = $option;
                            }
                        }
                } //switch
            }
        }
    }
    
    /**
     * Cast to array
     *
     * @return array
     */
    public function toArray()
    {
        $array = [];
        $transform = function ($letters) {
            $letter = array_shift($letters);
            return '_' . strtolower($letter);
        };
        foreach ($this as $key => $value) {
            if ($key === '__strictMode__') {
                continue;
            }
            $normalizedKey = preg_replace_callback('/([A-Z])/', $transform, $key);
            $array[$normalizedKey] = $value;
        }
        return $array;
    }
    
    /**
     * @param $styles
     * @return mixed|string
     */
    private function minifyCSS($styles)
    {
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles);
        $buffer = str_replace(["\r\n","\r","\n","\t",'  ','    ','     '], '', $buffer);
        $buffer = preg_replace(['(( )+{)','({( )+)'], '{', $buffer);
        $buffer = preg_replace(['(( )+})','(}( )+)','(;( )*})'], '}', $buffer);
        $buffer = preg_replace(['(;( )+)','(( )+;)'], ';', $buffer);
        
        return $buffer;
    }

    /**
     * clone
     *
     * Kopieren der Instanz von aussen ebenfalls verbieten
     */
    protected function __clone()
    {}

    /**
     * constructor
     *
     * externe Instanzierung verbieten
     */
    protected function __construct()
    {}
}