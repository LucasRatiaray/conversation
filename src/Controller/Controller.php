<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $twig;

    public function __construct()
    {
        // initialisation de Twig
        $loader = new FilesystemLoader(__DIR__.'/../templates');
        $this->twig = new Environment($loader);
    }

    public function isUserLogged()
    {
        session_start();
        return isset($_SESSION['user_connected']) && $_SESSION['user_connected'] == true;
    }
}