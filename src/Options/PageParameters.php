<?php
namespace ContentinumComponents\Options;

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
    protected $routeParams = array(
        'pages',
        'section',
        'article',
        'category',
        'categoryvalue'
    );

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
     * Query parameter and values
     *
     * @var array
     */
    protected $params;

    /**
     *
     * @return the $id
     */
    public static function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param \ContentinumComponents\Page\unknown $id            
     */
    public static function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return the $host
     */
    public static function getHost()
    {
        return $this->host;
    }

    /**
     *
     * @param string $host            
     */
    public static function setHost($host)
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