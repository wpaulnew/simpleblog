<?php

namespace app\models;

use vendor\core\Model;

class Instrument extends Model
{
    public function rolls() {
        return $this->getRows("SELECT * FROM `article` ORDER BY `id` DESC");
    }

}
