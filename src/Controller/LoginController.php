<?php

namespace App\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if($this->isUserLogged()) {
            header('Location: /');
        } else if(isset($_POST['pseudo']) && isset($_POST['password'])) {
            $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
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