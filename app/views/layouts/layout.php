<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?= $description ?>"/>
    <meta name="author" content="<?= $author ?>">
    <meta name="keywords" content="<?= $keywords ?>"/>

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.4.css">
<!--    <link rel="stylesheet" href="/public/css/bootstrap.min.css">-->

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="/public/awesome/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/public/css/clean-blog.min.css" rel="stylesheet">
    <link href="/public/css/correct.css" rel="stylesheet">

</head>

<body>
<!-- Я меню подключил из вида line:40 -->
<?php //require(VIEWS . '/components/default.php') ?>
<?php require_once(VIEWS . "/components/menu/{$menu}.php") ?>

<?php echo $content; ?>

<?php require_once(VIEWS . "/components/footer/{$footer}.php") ?>

<!--<script src="/public/js/jquery-3.2.1.slim.min.js"></script>-->
<!--<script src="/public/js/bootstrap.min.js"></script>-->
<script src="/public/js/jquery.min.js"></script>

<!--
    Оптимизировать шаблоны, то есть для админки
    подключать другой шаблон ( что бы не грузилсь лтсшние скрипты )
-->



<!--<script src="/public/js/nicEdit.js"></script>-->
<script src="/public/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/clean-blog.min.js"></script>
<script src="/public/js/ckeditor/ckeditor.js"></script>

<script src="/public/js/jquery.lazyload.js"></script>
<script src="/public/js/jquery.validate.js"></script>

<?php
foreach ($scripts as $script) {
    echo $script;
};
?>

</body>
</html>