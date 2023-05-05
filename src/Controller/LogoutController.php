<?php

namespace App\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        if($this->isUserLogged()) {
            $this->isUserLogout();
            header('Location: /');
        } else {
            echo $this->twig->render('security/index.html.twig');
        }
    }

    public function isUserLogout()
    {
        if(isset($_SESSION['user_connected']) && $_SESSION['user_connected'] == true){
            session_destroy();
            header('Location: /');
        }
    }
}
