<?php

namespace app\controllers\admin;

use vendor\libs\Post;
use vendor\libs\Session;
use app\models\Comments;
use vendor\core\Controller;

class CommentsController extends Controller
{
    public function indexAction($id)
    {

        $this->view->menu = "admin";
        $this->view->footer = "admin";

        $comment = new Comments();
        $comment->id = $id;
        $comments = $comment->comments();

        if ($this->isAjax()) {
            if (Post::verification("answer")) {

                echo json_encode($_POST);

                $comment = new Comments();
                $comment->id = htmlspecialchars(Post::gets("answer", "id"));
                $comment->answer = htmlspecialchars(Post::gets("answer", "message"));
                $comment->add();
                exit();
            }
        }

        $this->view->render("admin/comments/index", [
            'comments' => $comments
        ]);
        return true;
    }

    public function removeAction($id)
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        $remove = new Comments();
        $remove->id = $id;
        $remove->remove();

        /**
         * Обновить числа
         */

        $this->redirect($_SERVER['HTTP_REFERER']);
        return true;
    }
}