<?php

namespace App\Utils;

class DB
{
    public static $pdo;
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