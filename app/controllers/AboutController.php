<?php

namespace app\controllers;

use vendor\core\Controller;

class AboutController extends Controller
{

    public function indexAction()
    {
        $this->view->footer = "admin";
        $this->view->render('about/index');
        return true;
    }

}