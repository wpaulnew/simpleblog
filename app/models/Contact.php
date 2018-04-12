<?php

namespace app\models;

use vendor\core\Model;

class Contact extends Model
{
    public $id;
    public $name;
    public $email;
    public $message;

    public function save()
    {
        return $this->insertRow("INSERT INTO `contact` (name, email, message) VALUES (?, ?, ?)", [$this->name, $this->email, $this->message]);
    }

    public function reveal()
    {
        return $this->getRow("SELECT * FROM `article` WHERE `id`='{$this->id}'");
    }

    public function rolls()
    {
        return $this->getRows("SELECT * FROM `contact` ORDER BY `id` DESC");
    }

    public function remove()
    {
        return $this->pdo->pdo->exec("DELETE FROM `contact` WHERE `id` = '{$this->id}'");
    }
}
