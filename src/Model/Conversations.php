<?php 

namespace App\Model;

class Conversations extends Model
{
    public function getConversations()
    {
        $sql = 'SELECT * FROM conversations';
        $query = self::$instance->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getConversationById($id)
    {
        $sql = 'SELECT * FROM conversations WHERE id = ?';
        $query = self::$instance->prepare($sql);
        $query->execute([$id]);
        return $query->fetch();
    }

    public function getConversationByUser($user_id)
    {
        $sql = 'SELECT * FROM conversations WHERE user_id = ?';
        $query = self::$instance->prepare($sql);
        $query->execute([$user_id]);
        return $query->fetchAll();
    }

    public function createConversation($user_id, $message)
    {
        $sql = 'INSERT INTO conversations (user_id, title) VALUES (?, ?)';
        $query = self::$instance->prepare($sql);
        $query->execute([$user_id, $message]);
    }

    public function deleteConversation($id)
    {
        $sql = 'DELETE FROM conversations WHERE id = ?';
        $query = self::$instance->prepare($sql);
        $query->execute([$id]);
    }
}