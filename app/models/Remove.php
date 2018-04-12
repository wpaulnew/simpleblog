<?php

namespace app\models;

use vendor\core\Model;

class Remove extends Model
{
    public $id;

    public function remove() {
        $this->deleteRow("DELETE FROM `article` WHERE `id` = ?", [$this->id]);
    }
}
