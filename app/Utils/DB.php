<?php

namespace App\Utils;

class DB
{
    public static $pdo;
    public static function getInstance()
    {
        if(!self::$pdo) {
            $dbName = Config::getConfig('db_name');
            $dbHost = Config::getConfig('db_host');
            $dbType = Config::getConfig('db_type');
            $dsn = $dbType.':dbname='.$dbName.';host='.$dbHost;
            $username = Config::getConfig('db_username');
            $password = Config::getConfig('db_password');
            self::$pdo = new \PDO($dsn, $username, $password);
        }
        return self::$pdo;
    }

    /**
     *
     *  public static $pdo;
        public static function getInstance()
        {
        if(!self::$pdo) {
        $dbName = 'todolist';
        $dbHost = '127.0.0.1';
        $dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;
        self::$pdo = new \PDO($dsn, 'root');
        }
        return self::$pdo;
        }
     */
}