<div class="row">
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/create">Create task</a></li>
            </ul>
            <div class="navbar-form navbar-right">
                <select id="order-by" class="form-control" onchange="chOrder()">
                    <option value="">---</option>
                    <option value="id" <?= $_GET['orderBy'] == 'id'? 'selected': '' ?>>id</option>
                    <option value="email" <?= $_GET['orderBy'] == 'email'? 'selected': '' ?>>email</option>
                    <option value="status" <?= $_GET['orderBy'] == 'status'? 'selected': '' ?>>status</option>
                </select>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="tasks-list">
    <?php

    foreach ($tasks as $task):
        ?>

        <div class="col-lg-4 col-sm-6 task-tile-container">
            <div class="task-tile" onclick="getTaskDetails(<?= $task['id'] ?>)">
                <div class="task-image">
                    <img class="task-img img-responsive" src="/uploads/<?= $task['id'] ?>.png" alt=""
                         onerror="$(this).attr('src', '/img/image-placeholder.jpg')">
                </div>
                <div class="task-body">
                    <h4 class="task-name">
                        <?= $task['name'] ?>
                    </h4>
                    <div class="task-text">
                        <?= substr($task['text'], 0, 255) ?>
                    </div>
                </div>
                <div class="task-status">
                    <span>Status: <?= Lib\Helpers::statusText($task['status']) ?></span>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    ?>

</div>

<div class="pagination-container">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <li onclick="nextPage(<?= $i ?>)" class="<?= $currentPage == $i? 'active': '' ?>"><span><?= $i ?></span></li>
        <?php endfor; ?>

    </ul>
</div>
