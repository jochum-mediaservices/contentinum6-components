<?php

namespace ContentinumComponents\Storage;


/**
 * Abstract class storage manager(s)
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *        
 */
abstract class AbstractManager
{
    
    /**
     * Storage manager object
     *
     * @var object
     */
    protected $storage;
    
    /**
     * Entity class name
     *
     * @var string
     */
    protected $entityName;
    
    /**
     *
     * @var object
     */
    protected $entity;
    
    /**
     * Abtstract function to set entity name
     *
     * @param string $name entity name
     */
    abstract public function setEntityName($name = null);
    
    /**
     * Abtstract function to return $_entityName
     */
    abstract public function getEntityName();
    
    /**
     * Abtstract function to set entity name
     *
     * @param object $entity
     */
    abstract public function setEntity($entity);
    
    /**
     * Abtstract function to return $_entity
     */
    abstract public function getEntity();
    
    /**
     * Abstract function to set a storage object
     *
     * @param object $storage
     * @param string $charset
     */
    abstract public function setStorage($storage, $charset = 'UTF8');
    
    /**
     * Abstract function to get a storage object
     *
     * @param object $storage
     * @param string $charset
     */
    abstract public function getStorage($storage = null, $charset = 'UTF8');
}