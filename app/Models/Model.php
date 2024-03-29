<?php

namespace App\Models;

use App\Utils\DB;
use PDO;

class Model
{
    protected static string $table = '';
    public int $id;

    public function __construct()
    {

    }

    /**
     * Retrouve un modele avec son id
     * @param int $id
     * @return mixed
     */
    public static function find(int $id)
    {
        $pdo = DB::getInstance();
        $query = 'select * from '.static::$table.' where id ='.$id;

        $statement = $pdo->query($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class, ['id' => $id]);
        return $statement->fetch();
    }

    public static function where(array $params)
    {
        $pdo = DB::getInstance();
        $where = '';
        $count = 1;
        foreach ($params as $key => $param) {
            if($count === 1) {
                $where .= " where $key = :$key";
            }else {
                $where .= " and $key = :$key";
            }
            $count ++;
        }
        $sql =  'select * from '.static::$table.$where;
        $statement = $pdo->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $statement->execute($params);
        return $statement->fetchAll();
    }

    public static function create(array $params)
    {
        $pdo = DB::getInstance();
        /**
         * INSERT INTO table (nom_colonne_1, nom_colonne_2, ttt, )
            VALUES ('valeur 1', 'valeur 2')
         */
        $columns = '';
        $values = [];
        $preparedValues = '';
        $i = 1;
        foreach ($params as $column => $value){
            if($i < count($params)) {
                $columns .= "$column,";
                $preparedValues .= "?,";
            }else {
                $columns .= "$column";
                $preparedValues .= "?";
            }
            $values[] = $value;
            $i++;
        }
        $sql = 'INSERT INTO ' .static::$table. ' ('.$columns.') VALUES ('.$preparedValues.')';

        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);
    }
}