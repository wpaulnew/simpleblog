<?php

namespace app\models;

use vendor\core\Model;

class Search extends Model
{
    public $search;

    public function getSearchElements()
    {
        return $this->getRows("SELECT * FROM `article` WHERE `title` LIKE ?", ['%' . $this->search . '%']);
//        return $this->getRow("SELECT `id`,`category`,`title`, `publication`, `description` FROM `article` WHERE `title` LIKE ?", ['%' . $this->search . '%']);
    }
}
