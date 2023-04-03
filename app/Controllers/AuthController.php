<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\DB;
use App\Utils\View;
use PDO;

class AuthController
{
    public function connexion()
    {
        View::render('connexion');
    }

    public function connect()
    {
        /**
         * On récupère les données introduites par l'utilisateur
         */
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'];

        /**
         * Chercher une correspondance en base de donnée
         */

        $pdo = DB::getInstance();

        //On récupère l'utilisateur avec l'email qu'on récupère dans $_POST
        /**
         * On crée une requête préparée par sécurité
         * le paramètre :email nous permet de dire à pdo que cette donnée ne doit pas
         * être traitée comme une requête mais comme une données.
         */

        $sql = "select * from users where email=:email";
        $statement = $pdo->prepare($sql);
        /**
         * setFetchMode => pour dire à PDO qu'on veut récupérer un objet User
         */
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $statement->execute(['email' => $email]);

        $result = $statement->fetch();

        dd($result);
        //ensuite on vérifie le mot de passe envoyé avec celui crypté en DB
        $passwordOk = password_verify($_POST['password'], $result[0]['password']);


        /**
         * Si on trouve un utilisateur=> il sera connecté
         */


        /**
         * Sinon on le renverra sur la page de connexion
         * Avec un message d'erreur
         */

        dd($_POST);
    }
}