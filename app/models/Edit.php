<?php

namespace app\models;

use vendor\core\Model;

class Edit extends Model
{
    public $id;
    public $title;
    public $description;
    public $text;
    public $img;
    public $time;

    public function roll() {
        return $this->getRow("SELECT * FROM `article` WHERE `id` = ?", [$this->id]);
    }

    public function overwrite() {
        $this->insertRow("UPDATE `article` SET `title` = ?, `description` = ?, `text` = ? WHERE `id` = ?", [$this->title, $this->description, $this->text, $this->id]);
//        $this->insertRow("UPDATE `article` SET `title` = ?, `description` = ?, `text` = ?, `img` = ?, 'time' = ?", [$this->title, $this->description, $this->text, $this->img, $this->time]);
    }


}
