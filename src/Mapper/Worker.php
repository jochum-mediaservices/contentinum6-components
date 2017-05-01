<?php
namespace ContentinumComponents\Mapper;

use Doctrine\ORM\EntityManager;

/**
 * Contains methods to insert, update and delete data records in a database
 * Also a summary from different methods to get data rocords
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *        
 */
class Worker extends AbstractMapper
{

    const SAVE_INSERT = 'insert';

    const SAVE_UPDATE = 'update';
    
    
    /**
     * Construct
     * @param EntityManager $storage
     * @param string $charset
     */
    public function __construct(EntityManager $storage, $charset = 'UTF8')
    {
        $this->setStorage($storage,$charset);
    }
    
}