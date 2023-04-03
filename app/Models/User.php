<?php

namespace App\Models;

class User extends Model
{
    public function __construct(int $id = null)
    {
        parent::__construct($id);
    }

    public $name;
    public $firstname;
    public $email;


}