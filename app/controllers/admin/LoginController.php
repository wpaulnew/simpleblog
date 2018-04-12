<?php

namespace app\controllers\admin;

use vendor\core\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $this->view->menu = "admin";

        $this->view->render("admin/login/index");
        return true;
    }

    public function exitAction()
    {
        $this->view->menu = "admin";

//        $this->view->render("admin/admin/index");
        $this->view->render("admin/admin/index");
        return true;
    }
}