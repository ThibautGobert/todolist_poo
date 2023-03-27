<?php

namespace App\Controllers;

use App\Utils\View;

class AuthController
{
    public function connexion()
    {
        View::render('connexion');
    }
}