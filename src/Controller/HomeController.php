<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if($this->isUserLogged()) {
            echo $this->twig->render('home/index.html.twig',[
                'user' => $_SESSION['user'],
                'conversations' => $this->loadModel('Conversations')->getConversations()
            ]);
        } else if($this->isUserCreated()) {
            echo $this->twig->render('security/index.html.twig', [
                'user_created' => true,
                'success' => 'Votre compte a bien été créé.'
            ]);
        } else {
            echo $this->twig->render('security/index.html.twig');
        }
    }
}