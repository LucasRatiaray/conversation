<?php

namespace App\Controller;

class ConversationsController extends Controller
{
    public function index()
    {
        $conv = new \App\Model\Conversations();
        if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
            // $this->conversations->createConversation($_SESSION['user']->id, $message);
            $conv->createConversation($_SESSION['user']->id, $message);
            header('Location: /');
            var_dump($this->conversations->getConversations());
            die();
        } else {
            header('Location: /');
        }
    }

    public function show($id)
    {
        $conv = $this->conversations->getConversationById($id);
        echo $this->twig->render('conversation.html.twig', [
            'user' => $conv
        ]);
    }

    public function delete($id)
    {
        $this->conversations->deleteConversation($id);
        header('Location: /conversations');
    }
}