<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->twig->render('test.html.twig');
        // if($this->isUserLogged()) {
        //     echo $this->twig->render('home/index.html.twig',[
        //         'user' => $_SESSION['user'],
        //         'user_id' => $_SESSION['user']->id,
        //         'user_name' => $_SESSION['user']->name,
        //         'user_firstname' => $_SESSION['user']->firstname,
        //         'user_pseudo' => $_SESSION['user']->pseudo,
        //         'user_email' => $_SESSION['user']->email,
        //         'message_receive' => 'rien',
        //     ]);
        // } else if($this->isUserCreated()) {
        //     echo $this->twig->render('security/index.html.twig', [
        //         'user_created' => true,
        //         'success' => 'Votre compte a bien été créé.'
        //     ]);
        // } else {
        //     echo $this->twig->render('security/index.html.twig');
        // }
    }
}