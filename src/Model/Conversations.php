<?php

namespace App\Model;

class Conversations extends Model
{
    public function getConversations()
    {
        $sql = 'SELECT c.*, u.pseudo as user_pseudo FROM conversations c JOIN users u ON c.user_id = u.id ORDER BY c.id ASC';
        $query = $this->connection->query($sql);
        return $query->fetchAll();
    }

    public function addMessage($user_id, $user_pseudo, $message)
    {
        $sql = 'INSERT INTO conversations (user_id, user_pseudo, message) VALUES (:user_id, :user_pseudo, :message)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'user_id' => $user_id,
            'user_pseudo' => $user_pseudo,
            'message' => $message
        ]);
        return $this->connection->lastInsertId();
    }    

    public function getPseudoMessage($user_id)
    {
        $sql = 'SELECT pseudo FROM users WHERE id = :user_id';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'user_id' => $user_id
        ]);
        return $query->fetch();
    }
}