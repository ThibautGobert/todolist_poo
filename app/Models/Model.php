<?php

namespace App\Models;

use App\Utils\DB;
use PDO;

class Model
{
    protected string $table;
    public int $id;

    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    public function getModel()
    {

        $pdo = DB::getInstance();
        $query = "select * from {$this->table} where id = {$this->id}";

        $statement = $pdo->query($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class, ['id' => $this->id]);
        return $statement->fetch();
    }
}