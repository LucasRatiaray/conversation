<?php

namespace App\Controller;

class LoginController extends Controller
{
    public function index()
    {
        session_start();
        if(isset($_POST['pseudo']) && isset($_POST['password'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            $auth = new \App\Security\Authenticator();
            if($auth->login($pseudo, $password)){
                $_SESSION['user_connected'] = true;
                header('Location: /');
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