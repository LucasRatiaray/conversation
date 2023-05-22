<?php

namespace App\Controller;

class ConversationsController extends Controller
{
    public function index()
    {
        if ($this->isUserLogged()) {
            if (isset($_POST['message']) && !empty($_POST['message'])) {
                $user_id = $_SESSION['user']->id; // Utilisation de la syntaxe d'objet pour accéder à la propriété 'id'
                $user_pseudo = $_SESSION['user']->pseudo; // Utilisation de la syntaxe d'objet pour accéder à la propriété 'pseudo'
                $message = $_POST['message'];
                $this->loadModel('Conversations')->addMessage($user_id, $user_pseudo, $message);
                header('Location: /');
            } else {
                header('Location: /');
            }
        } else {
            header('Location: /');
        }
    }      
}