<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Task List' ?></title>
    <base href="/">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/TaskImage.js"></script>

    <!-- fav icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- bootstrap -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="/css/style.css">

    <!-- admin lte-->
    <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.css">
    <script src="/adminlte/dist/js/adminlte.min.js"></script>

    <!-- ckeditor -->
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body class="skin-black-light  fixed sidebar-collapse">

<header class="main-header">
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>T</b>M</span>
        <span class="logo-lg"><b>Task</b> Manager</span>
    </a>
    <nav class="navbar navbar-static-top">
        <div class="navbar-menu">
            <ul class="nav navbar-nav">
                <li><a href="/create">Create task</a></li>
            </ul>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php if ($_SESSION['logged']): ?>
                    <li>
                        <a href="/admin">Admin panel</a>
                    </li>
                    <li>
                        <form id="logout-form" action="/logout" method="post">
                            <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?>">
                        </form>
                        <a onclick="$('#logout-form').submit()" style="cursor: pointer">Logout</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

<main class="wrapper">
    <div class="content-wrapper">
        <div class="content">
            <?= $content ?>
        </div>
    </div>
</main>
<div id="ajax-content"></div>
<div id="notifications_holder"></div>
</body>
</html>