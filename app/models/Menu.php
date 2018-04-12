<?php

namespace app\models;

use vendor\core\Model;

class Menu extends Model
{
    public static function elements()
    {
        return [
            [
                'title' => 'Css',
                'link' => '/article/category/css'
            ],
            [
                'title' => 'Html',
                'link' => '/article/category/html'
            ],
            [
                'title' => 'Php',
                'link' => '/article/category/php'
            ]

        ];
    }
}
