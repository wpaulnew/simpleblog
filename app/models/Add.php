<?php

namespace app\models;

use vendor\core\Model;

class Add extends Model
{
    public $title;
    public $description;
    public $text;
    public $img;
    public $time;

    public function save() {
        $this->insertRow("INSERT INTO `article` (`title`, `description`, `text`, `img`, `time`) VALUES (?, ?, ?, ?, ?)", [$this->title, $this->description, $this->text, $this->img, $this->time]);
    }
}
