<?php
namespace ContentinumComponents\Mapper;

use ContentinumComponents\Storage\AbstractManager;
use Doctrine\ORM\EntityManager;
use ContentinumComponents\Mapper\Exeption\InvalidValueMapperException;

abstract class AbstractMapper extends AbstractManager
{

    const UNSET_ALL = 'all';

    const UNSET_ENT = 'ent';

    const UNSET_ENT_NAME = 'name';

    /**
     * Logger
     * 
     * @var object
     */
    protected $logger = false;

    /**
     *
     * {@inheritdoc}
     *
     * @see \ContentinumComponents\Storage\AbstractManager::getEntity()
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \ContentinumComponents\Storage\AbstractManager::setEntity()
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \ContentinumComponents\Storage\AbstractManager::getEntityName()
     */
    public function getEntityName()
    {
        if (null === $this->entityName) {
            $this->setEntityName(null);
        }
        return $this->entityName;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \ContentinumComponents\Storage\AbstractManager::setEntityName()
     */
    public function setEntityName($name = null)
    {
        if (null === $name) {
            $name = $this->getEntity ();
        }
        
        if (is_string ( $name )) {
            $this->entityName = $name;
        } elseif ( is_object($name) && method_exists ( $name, 'getEntityName' )) {
            $this->entityName = $name->getEntityName ();
        } else {
            throw new InvalidValueMapperException ( 'Incorrect parameters given, to set the entity name' );
        }
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \ContentinumComponents\Storage\AbstractManager::getStorage()
     */
    public function getStorage($storage = null, $charset = 'UTF8')
    {
        if ($storage) {
            $this->setStorage($storage, $charset);
        }
        
        if (! $this->storage instanceof EntityManager) {
            throw new InvalidValueMapperException('There is no Doctrine EntityManager initiated !');
        }
        
        return $this->storage;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \ContentinumComponents\Storage\AbstractManager::setStorage()
     */
    public function setStorage($storage, $charset = 'UTF8')
    {
        $this->storage = $storage;
        
        if (! $this->storage instanceof EntityManager) {
            throw new InvalidValueMapperException('There is no Doctrine EntityManager initiated !');
        }
        
        if (false !== $charset) {
            $this->storage->getConnection()->exec('SET NAMES "' . $charset . '"');
        }
    }

    /**
     * Check if logger available
     * 
     * @return boolean
     */
    public function hasLogger()
    {
        if (false === $this->logger) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Set a logger
     * 
     * @param object $logger            
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Returns Zend logger
     * 
     * @return object
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Unset a entity
     *
     * @param string $param            
     */
    public function unsetEntity($param = self::UNSET_ALL)
    {
        switch ($param) {
            case self::UNSET_ALL:
                $this->entity = null;
                $this->entityName = null;
                break;
            case self::UNSET_ENT:
                $this->entity = null;
                break;
            case self::UNSET_ENT_NAME:
                $this->entityName = null;
                break;
            default:
                break;
        }
    }
}