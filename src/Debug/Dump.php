<?php

namespace ContentinumComponents\Debug;


/**
 * Warpper for var_dump
 * Result you see in a pre area
 * standard with script exit
 *
 * @author     Michael Jochum <michael.jochum@jochum-mediaservices.de>
 * @copyright  Copyright (c) jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 *
 */
class Dump
{
    /**
     * 
     * @param mixed $var
     * @param string $stop
     */
    public static function get ($var, $stop = true)
    {
        print '<pre>';
        print var_dump($var);
        print '</pre>';
        if ($stop === true) {
            exit();
        }
    }
}