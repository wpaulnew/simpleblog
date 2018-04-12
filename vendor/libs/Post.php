<?php

namespace vendor\libs;

class Post
{
    public static function verification($key) {
        if (isset($_POST[$key])) {
            return true;
        }
        return false;
    }

    public static function set($key, $value) {
        return $_POST[$key] = $value;
    }

    public static function get($key) {
        return $_POST[$key];
    }

    public static function gets($key1, $key2) {
        return $_POST[$key1][$key2];
    }
}