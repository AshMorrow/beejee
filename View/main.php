<!DOCTYPE html>
<html>
<head>
    <title><?= $title?? 'Task List'?></title>
    <base href="/">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/TaskImage.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="/css/style.css">

    <!-- ckeditor -->
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body>

<main class="container">
    <?= $content ?>
</main>
<div id="ajax-content"></div>
<div id="notifications_holder"></div>
</body>
</html>