<?php

namespace vendor\core;

use vendor\libs\Post;

abstract class Controller
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    public function isAjax()
    {
        return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest";
    }

    public function redirect($url, $permanent = false)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }

    public function menu() {


        if ($this->isAjax()) {
            if (Post::verification("menu")){
                exit("MENU");
            }
        }
    }

    // другие полезные методы вроде redirect($url);
}