<?php

return [

    // АДМИНКА
    'admin/contacts' => 'admin/instrument/contacts',
    'admin/comments/([0-9]+)/remove' => 'admin/comments/remove/$1',
    'admin/comments/([0-9]+)' => 'admin/comments/index/$1',
    'admin/remove/([0-9]+)' => 'admin/instrument/remove/$1',
    'admin/edit/([0-9]+)' => 'admin/instrument/edit/$1',
    'admin/add' => 'admin/instrument/add',
    'admin/exit' => 'admin/instrument/exit',
    'admin/home' => 'admin/instrument/index',
    'admin' => 'admin/instrument/index',


    // ИНСТРУМЕНТЫ

    //'article/([0-9]+)' => 'article/index/$1',
    //'article/all' => 'article/category',
    //'search' => 'search/index', // POST
    //'^$' => 'article/category/all',

    'all' => 'article/all', // +
    '^([0-9]+)$' => 'article/index/$1', // +
    'about' => 'about/index',
    'login' => 'login/index',
    'contact' => 'contact/index',
    '^$' => 'article/all',

];