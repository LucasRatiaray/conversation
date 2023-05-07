<?php

namespace App\Security;

use App\Model\User;

class Authenticator
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login($pseudo, $password)
    {
        $user = $this->user->getUserByPseudo($pseudo);
        if($user){
            if(password_verify($password, $user->password)){
                $_SESSION['user'] = $user;
                $_SESSION['user']->id = intval($user->id);
                $_SESSION['user']->name = $user->name;
                $_SESSION['user']->firstname = $user->firstname;
                $_SESSION['user']->pseudo = $user->pseudo;
                $_SESSION['user']->email = $user->email;
                return true;
            } else {
                return false;
            }
        }
    }

    public function singup($name, $firstname, $pseudo, $password, $password_confirm, $email)
    {
        if($password === $password_confirm){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = $this->user->getUserByPseudo($pseudo);
            if(!$user){
                $this->user->createUser($name, $firstname, $pseudo, $password, $email);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}