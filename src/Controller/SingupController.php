<?php

namespace App\Controller;

use App\Controller\Controller;

class SingupController extends Controller
{
    public function index()
    {
        if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            

        } else {
            echo $this->twig->render('security/signup.html.twig');
        }
    }
}