<?php

namespace App\Controller;

use App\Controller\Controller;

class SingupController extends Controller
{
    public function index()
    {
        if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
            $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
            $password_confirm = htmlspecialchars($_POST['password_confirm'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $auth = new \App\Security\Authenticator();
            if($auth->singup($name, $firstname, $pseudo, $password, $password_confirm, $email)){
                $_SESSION['user_created'] = true;
                header('Location: /');
            } else {
                echo $this->twig->render('security/index.html.twig', [
                    'error' => 'Pseudo ou mot de passe incorrect'
                ]);
            }
        } else {
            echo $this->twig->render('security/signup.html.twig');
        }
    }
}