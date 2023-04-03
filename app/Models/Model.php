<?php

namespace App\Models;

class Model
{
    protected $table;
    protected $id;

    public function __construct(int $id = null)
    {
        $this->id = $id;
    }
}