<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Router.php';

// instancier la classe Router
$router = new App\Router();

// ajouter les routes
$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('/login', ['controller' => 'LoginController', 'action' => 'index']);
$router->add('/signup', ['controller' => 'SingupController', 'action' => 'index']);
$router->add('/logout', ['controller' => 'LogoutController', 'action' => 'index']);

// dispatcher la route correspondante à l'URL
$router->dispatch($_SERVER['REQUEST_URI']);