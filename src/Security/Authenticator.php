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
            if($user->password === $password){
                $_SESSION['user'] = $user;
                return true;
            } else {
                return false;
            }
        }
    }
}