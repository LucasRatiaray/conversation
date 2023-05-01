<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->twig->render('security/index.html.twig');
    }
}