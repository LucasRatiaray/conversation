<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $twig;
    protected $conversations;

    public function __construct()
    {
        session_start();
        // initialisation de Twig
        $loader = new FilesystemLoader(__DIR__.'/../templates');
        $this->twig = new Environment($loader);
        $this->conversations = $this->loadModel('Conversations');
    }

    public function isUserLogged()
    {
        return isset($_SESSION['user_connected']) && $_SESSION['user_connected'] == true;
    }

    public function isUserCreated()
    {
        return isset($_SESSION['user_created']) && $_SESSION['user_created'] == true;
    }

    public function loadModel($model)
    {
        $model = 'App\\Model\\'.$model;
        return new $model();
    }
}