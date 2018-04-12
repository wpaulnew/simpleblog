<?php

namespace app\controllers;

use app\models\Contact;
use vendor\core\Controller;
use vendor\libs\Post;

class ContactController extends Controller
{

    public function indexAction()
    {
        if ($this->isAjax()) {
            $contact = new Contact();
            $contact->name = htmlspecialchars(Post::get('name'));
            $contact->email = htmlspecialchars(Post::get('email'));
            $contact->message = htmlspecialchars(Post::get('message'));

            $contact->save();
            exit(json_encode(
                ["correct" => true]
            ));
        }

        $this->view->footer = "admin";
        $this->view->render('contact/index');
        return true;
    }

}