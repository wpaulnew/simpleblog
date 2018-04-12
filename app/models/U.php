<?php

namespace app\models;

use vendor\core\Model;

class U extends Model
{
    public $id;
    public $email;
    public $password;

    public function correct() {
        $login = $this->getRow("SELECT * FROM `login` WHERE `email` = '{$this->email}' AND `password` = '{$this->password}'");
        if (!$login) {
            return false;
        }
        return true;
    }
}
