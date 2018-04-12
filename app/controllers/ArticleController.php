<?php

namespace app\controllers;

use app\models\Article;
use app\models\Comments;
use app\models\Menu;
use vendor\core\Model;
use vendor\libs\Session;
use \vendor\libs\Post;
use vendor\core\Controller;

class ArticleController extends Controller
{

    /**
     * СДЕЛАТЬ ОТДЕЛНО _GET ОТВЕЧАЕТ ЗА РЕНДЕР СТРАНИЦЫ
     * _POST ЗА ПРИНЯТИЕ ЗАПРОСОВ
     * РАЗДЕЛЕНИЕ ЛОГИКИ
     */

    // Просмотр одной статьи
    public function indexAction($id)
    {
        $article = new Article();
        $article->id = $id;
        $reveal = $article->reveal();

        $comment = new Comments();
        $comment->id = $id;
        $comments = $comment->comments();


//        $this->view->menu = "roll";


        if ($this->isAjax()) {

            if (Post::verification('comment')) {
                $comment->article = $id;
                $comment->name = htmlspecialchars($_POST['comment']['name']);
                $comment->email = htmlspecialchars($_POST['comment']['email']);
                $comment->time = date('l jS');
                $comment->comment = htmlspecialchars($_POST['comment']['message']);

                $comment->save();

//                $article->id = $id;
//                $article->comment();

                exit(json_encode([
                    'view' => $comment->view(),
//                    'comments' => $article->comments()
                ]));
            }

        }

        if ($reveal) {
            $this->view->footer = "admin";
            $this->view->render("article/index", [
                'reveal' => $reveal,
                'comments' => $comments
            ]);
        }

        $this->view->footer = "admin";
        $this->view->render("article/error", [
            'id' => $id
        ]);


        return true;
    }

    // Просмотр статей по категориям
    public function allAction()
    {

        $article = new Article();
        $rolls = $article->rolls();

        if (!$rolls) {
            $this->view->footer = "admin";
            $this->view->render("article/error");
        }

        if ($this->isAjax()) {

            if (Post::verification('like')) {
                $article->id = Post::gets("like", "id");
                $article->like();

                exit(json_encode($article->likes()));
            }

            if (Post::verification('more')) {
                $more = $article->more(Post::gets("more", "count_show"), Post::gets("more", "count_add"));

                if ($more) {
                    $html = "";
                    foreach ($more as $i) {
                        $html .= "
                        <div class=\"post-preview\">
                        <a href=\"/{$i["id"]}\">
                            <h2 class=\"post-title\">
                                {$i['title']}
                            </h2>
                            <h3 class=\"post-subtitle\">
                                {$i['description']}
                            </h3>
                        </a>
                        <p class=\"post-meta\">{$i['time']}</p>
                    </div>
                    <hr>
			        ";
                    }

                    exit(json_encode([
                        'correct' => true,
                        'html' => $html
                    ]));
                }

                if (!$more) {
                    exit(json_encode([
                        'correct' => false
                    ]));
                }
            }


        }

        $this->view->description = "Главная страница";
        $this->view->author = "LIFEBLOG";
        $this->view->keywords = "Главная страница, домой, дом, страница, LIFEBLOG, lifeblog";
        $this->view->footer = "admin";
        $this->view->render("article/all", [
            'rolls' => $rolls
        ]);
        return true;
    }
}