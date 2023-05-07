<?php

namespace App\Controller;

class ConversationsController extends Controller
{
    public function index()
    {
        if($this->isUserLogged()) {
            if(isset($_POST['message']) && !empty($_POST['message'])) {
                $this->loadModel('Conversations')->addMessage($_SESSION['user']['id'], $_POST['message']);
                header('Location: /');
            } else {
                header('Location: /');
            }
        } else {
            header('Location: /');
        }

    }
}