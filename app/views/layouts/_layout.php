<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?= $description ?>"/>
    <meta name="author" content="<?= $author ?>">
    <meta name="keywords" content="<?= $keywords ?>"/>

    <link rel="stylesheet" href="/public/css/main.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="/public/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <title>Hello, world!</title>
</head>

<!-- Я меню подключил из вида line:40 -->
<?php //require(VIEWS . '/components/default.php') ?>
<?php require_once(VIEWS . "/components/menu/{$menu}.php") ?>

<?php echo $content; ?>

<script src="/public/js/jquery-3.2.1.slim.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/nicEdit.js"></script>

<?php
foreach ($scripts as $script) {
    echo $script;
};
?>

</body>
</html>