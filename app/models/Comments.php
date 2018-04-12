<?php

namespace app\models;

use vendor\core\Model;

class Comments extends Model
{
    public $id;
    public $article;
    public $name;
    public $email;
    public $time;
    public $comment;
    public $answer;

    // Выводит скоментари к статье по id
    public function comments()
    {
        return $this->getRows("SELECT * FROM `comments` WHERE `article` = '{$this->id}'");
    }

    // Добавляет коменатий к статье
    public function save()
    {
        try {
            return $this->insertRow("INSERT INTO `comments`(`article`, `name`, `time`, `comment`) VALUES (?, ?, ?, ?)", [$this->article, $this->name, $this->time, $this->comment]);
        }catch (\Exception $e) {
            echo 'Ошибка при добавлении коментария',  $e->getMessage(), "\n";
        }

    }

    // Возвращает последний добавленый коментарий
    public function view()
    {
        try {
            return $this->getRow("SELECT * FROM `comments` WHERE `id`=(SELECT MAX(id) FROM `comments`)");
        }catch (\Exception $e) {
            echo 'Ошибка при возвращении последнего коментария',  $e->getMessage(), "\n";
        }
    }

    // Удаляет по id
    public function remove() {
        $this->deleteRow("DELETE FROM `comments` WHERE `id` = ?", [$this->id]);
    }

    // Делаем подсчет коментариев в таблице в базе и записываем числов в статью
    public function count() {
        $count = $this->getRows("SELECT * FROM `comments` ");
    }

    // Добавляем ответ к коментарию
    public function add() {
        $this->updateRow("UPDATE `comments` SET `answer` = ? WHERE `id` = ?", [$this->answer, $this->id]);
    }

//    // При добавлении коментария записывает +1 в таблицу
//    public function update() {
//        $this->updateRow("UPDATE `article` SET `comments` = `comments` + ? WHERE `id` = ?", [+1, $this->id]);
//    }

}
