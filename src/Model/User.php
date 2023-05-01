<?php

namespace App\Model;

class User extends Model
{
    public function getUserByPseudo($pseudo)
    {
        $sql = 'SELECT * FROM users WHERE pseudo = ?';
        $query = self::$instance->prepare($sql);
        $query->execute([$pseudo]);
        return $query->fetch();
    }
}