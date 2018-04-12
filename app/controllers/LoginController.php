<?php

namespace app\controllers;

use app\models\U;
use vendor\libs\Post;
use vendor\libs\Session;
use vendor\core\Controller;


class LoginController extends Controller
{
    public function indexAction()
    {

        if ($this->isAjax()) {

            $u = new U();

            $u->email = Post::get("email");
            $u->password = Post::get("password");

            if ($u->correct()) {

                Session::create("email", $u->email);
                Session::create("password", $u->password);

                exit(json_encode(true));
            } else {
                exit(json_encode(false));
            }
        }

        $this->view->footer = "admin";
        $this->view->menu = "login";
        $this->view->render("login/index");
        return true;
    }
}