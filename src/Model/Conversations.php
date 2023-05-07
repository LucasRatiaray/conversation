<?php

namespace App\Model;

class Conversations extends Model
{
    public function getConversations()
    {
        $sql = 'SELECT * FROM conversations';
        $query = $this->connection->query($sql);
        return $query->fetchAll();
    }

    public function addMessage($user_id, $message)
    {
        $sql = 'INSERT INTO conversations (user_id, message) VALUES (:user_id, :message)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'user_id' => $user_id,
            'message' => $message
        ]);
        return $this->connection->lastInsertId();
    }
}