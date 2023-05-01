<?php

namespace App\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if(isset($_POST['pseudo']) && isset($_POST['password'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $auth = new \App\Security\Authenticator();
            if($auth->login($pseudo, $password)){
                echo $this->twig->render('home/index.html.twig');
            } else {
                echo $this->twig->render('security/index.html.twig', [
                    'error' => 'Pseudo ou mot de passe incorrect'
                ]);
            }
        } else {
            echo $this->twig->render('security/index.html.twig');
        }
    }
}