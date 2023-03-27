<?php

namespace App\Utils;

class DB
{
    public $pdo;
    public function getInstance()
    {
        if(!$this->pdo) {
            $dbName = 'todolist';
            $dbHost = '127.0.0.1';
            $dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;
            $this->pdo = new \PDO($dsn, 'root');
        }
        return $this->pdo;
    }
}