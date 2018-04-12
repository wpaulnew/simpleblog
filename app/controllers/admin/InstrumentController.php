<?php

namespace app\controllers\admin;

use app\models\Add;
use app\models\Article;
use app\models\Contact;
use app\models\Edit;
use vendor\libs\Post;
use vendor\libs\Session;
use app\models\Instrument;
use vendor\core\Controller;

class InstrumentController extends Controller
{
    public function indexAction()
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        $instrument = new Instrument();

        /**
         * Может стоит использывать одну и туже модель для получние статей
         */

        $rolls = $instrument->rolls();

        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render("admin/home/index", [
            'rolls' => $rolls
        ]);
        return true;
    }

    public function addAction()
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        if (!empty($_FILES)) {
            $filename = $_FILES['pictures']['name'];

            $filename = time() . ".jpeg";

            $uploaddir = IMG . '/upload/';
            $uploadfile = $uploaddir . basename($filename);
            // на
// на
            /*
            if ($_FILES['pictures']['tmp_name'] == "image/jpeg") {
                $uploadfile = time().".jpg";
            }
            if ($_FILES['pictures']['tmp_name'] == "image/png") {
                $namefile = time() . ".png";
                $uploadfile = $namefile;
            }
            */
            if (copy($_FILES['pictures']['tmp_name'], $uploadfile)) {
                exit($filename);
            }

        }

        if ($this->isAjax()) {
            $add = new Add();

            $add->title = Post::get('title');
            $add->description = Post::get("description");
            $add->text = Post::get("text");
            $add->img = Post::get("img");
            $add->time = $today = date("F j, Y");


            $add->save();

            exit(json_encode(true));
        }

        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render("admin/add/index");
        return true;
    }

    public function editAction($id)
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        $edit = new Edit();
        $edit->id = $id;
        $roll = $edit->roll();

        if ($this->isAjax()) {
            $edit = new Edit();

            $edit->id = $id;
            $edit->title = Post::get('title');
            $edit->description = Post::get("description");
            $edit->text = Post::get("text");

            $edit->overwrite();

            exit(json_encode(true));
        }

        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render("admin/edit/index", [
            'roll' => $roll
        ]);
        return true;
    }

    public function contactsAction()
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        if ($this->isAjax()) {

            $contact = new Contact();

            $contact->id = Post::get("id");
            $remove = $contact->remove();
            if ($remove) {
                $exit = [
                    "correct" => true
                ];
                exit(json_encode($exit));
            }
        }

        $contact = new Contact();
        $contacts = $contact->rolls();

        $this->view->menu = "admin";
        $this->view->footer = "admin";
        $this->view->render("admin/contacts/index", [
            'contacts' => $contacts
        ]);
        return true;
    }

    public function removeAction($id)
    {
        if (!Session::isSession('email')) {
            $this->redirect('/login');
        }

        $article = new Article();
        $article->id = $id;
        $img = $article->img();

        unlink(IMG . '/upload/' . $img['img']);

        $article->remove();
        $this->redirect($_SERVER['HTTP_REFERER']);
        return true;
    }

    public function exitAction()
    {
        Session::remove("email");
        Session::remove("password");
        $this->redirect("/all");
    }
}