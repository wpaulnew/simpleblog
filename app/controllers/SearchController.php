<?php

namespace app\controllers;

use app\models\Search;
use vendor\libs\Post;
use vendor\libs\Session;
use vendor\core\Controller;


class SearchController extends Controller
{
    public function indexAction() {

        if ($this->isAjax()) {
            $search = new Search();
            $search->search = Post::get('input');
            exit(json_encode($search->getSearchElements(), JSON_UNESCAPED_UNICODE));
        }

//        $this->view->menu = "search";
        $this->view->render("search/index", []);
        return true;
    }
}