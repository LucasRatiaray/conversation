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

    public function createUser($name, $firstname, $pseudo, $password, $email)
    {
        $sql = 'INSERT INTO users (name, firstname, pseudo, password, email) VALUES (?, ?, ?, ?, ?)';
        $query = self::$instance->prepare($sql);
        $query->execute([$name, $firstname, $pseudo, $password, $email]);
    }
}