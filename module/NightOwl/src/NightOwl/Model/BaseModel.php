<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NightOwl\Model;

use MongoClient;

/**
 * Base Model implements getConfig. This may be improvable by making all the
 * models service aware, but this also works.
 *
 * @author Marc Vouve
 */
class BaseModel
{
    protected static $db = null;

    /**
     * Get the DataBase instance.
     */
    protected function getDB()
    {
        if (is_null(self::$db))
        {
            $config = $this->getConfig();

            // Create DB
            $dbn = $config['mongo']['name'];
            $m = new MongoClient($config['mongo']['url']);
            self::$db = $m->$dbn;
        }

        return self::$db;
    }

    /**
     * Loads the Applications config file based of the current directory. This
     * is a really bad peice of code, but it was a lot faster to do this way.
     *
     * @author Marc Vouve
     *
     * @date April 30th 2015
     *
     * @return an array of configuration info also found at the /config/autoload/local.php
     */
    protected function getConfig()
    {
        return include __DIR__ . '../../../../../../config/autoload/local.php';
    }
}
