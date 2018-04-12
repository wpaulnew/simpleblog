<?php

namespace app\models;

use vendor\core\Model;

class Article extends Model
{
    public $id;
    protected $title;
    protected $description;
    protected $time;
    protected $img;
    protected $text;
    public $likes;
    public $comments;

    public function rolls()
    {
//        return $this->getRows("SELECT article.id, count(comments.id) from article join comments on (article.id = comments.article) group by article.id ORDER BY `id` DESC LIMIT 3");
        return $this->getRows("SELECT * FROM `article` ORDER BY `id` DESC LIMIT 3");
    }

    public function reveal()
    {
        return $this->getRow("SELECT * FROM `article` WHERE `id`='{$this->id}'");
    }

    public function like()
    {
        $this->updateRow("UPDATE `article` SET `likes` = `likes` + ? WHERE `id` = ?", [+1, $this->id]);
    }

    // Возвращает количество лайков статьи по ее id
    public function likes()
    {
        return $this->getRow("SELECT `likes` FROM `article` WHERE `id`='{$this->id}'");
    }

    public function comment()
    {
        try {
            $this->updateRow("UPDATE `article` SET `comments` = `comments` + ? WHERE `id` = ?", [+1, $this->id]);
        } catch (\Exception $e) {
            echo 'В таблице `article`, нет поля `comments`', $e->getMessage(), "\n";
        }
    }

    // Возвращает количество лайков статьи по ее id
    public function comments()
    {
        try {
            return $this->getRow("SELECT `comments` FROM `article` WHERE `id`='{$this->id}'");
        } catch (\Exception $e) {
            echo 'Ошибка при возвращении количества лайков статьи по ее id ', $e->getMessage(), "\n";
        }
    }

    // Отвечает за загрузку дополнителых статей
    public function more($count_show, $count_add)
    {
        return $this->getRows("SELECT * FROM `article` ORDER by `id` DESC LIMIT {$count_show}, {$count_add}");
    }

    // Удалить статью по id
    public function remove() {
        try {
            $this->deleteRow("DELETE FROM `article` WHERE `id` = ?", [$this->id]);
        }catch (\Exception $e) {
            echo 'Ошибка при удалении статьи по ее id', $e->getMessage(), "\n";
        }
    }

    // Получает img статьи по id статьи
    public function img() {
        try {
            return $this->getRow("SELECT `img` FROM `article` WHERE `id`='{$this->id}'");
        } catch (\Exception $e) {
            echo 'Ошибка при возвращении img статьи по ее id ', $e->getMessage(), "\n";
        }
    }

//    // Подсчитывает количество коментариев к статье
//    public function count() {
//        $comments = $this->pdo->pdo->query("SELECT `comments` FROM `article` WHERE `id` = '{$this->id}'");
//        return $comments->rowCount();
//    }
//
//    // Запывает количество коментариев в таблицу, зависит от count()
//    public function update()
//    {
//        $this->updateRow("UPDATE `article` SET `comments` = ? WHERE `id` = ?", [$this->comments, $this->id]);
//    }

//    // Возвращает количество коментариев из таблицы
//    public function number() {
//        return $this->getRow("SELECT `comments` FROM `article` WHERE `id` = ?", [$this->id]);
//    }
}
