<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if($this->isUserLogged()) {
            echo $this->twig->render('home/index.html.twig',[
                'user' => $_SESSION['user']
            ]);
        } else {
            echo $this->twig->render('security/index.html.twig');
        }
    }
}