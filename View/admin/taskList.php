<div class="row">
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/create">Create task</a></li>
            </ul>
            <div class="navbar-form navbar-right">
                <select id="order-by" class="form-control" onchange="chOrder()">
                    <option value="">---</option>
                    <option value="id" <?= $_GET['orderBy'] == 'id' ? 'selected' : '' ?>>id</option>
                    <option value="email" <?= $_GET['orderBy'] == 'email' ? 'selected' : '' ?>>email</option>
                    <option value="status" <?= $_GET['orderBy'] == 'status' ? 'selected' : '' ?>>status</option>
                </select>
            </div>
            <div class="navbar-form navbar-right">
                <form action="/logout" method="post">
                    <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?>">
                    <button class="logoutBtn" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</div>

<table class="tasks-list table table-hover">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Edit</th>
    </tr>
    <?php
    foreach ($tasks as $task):
        ?>
        <tr>
            <td onclick="getTaskDetails(<?= $task['id'] ?>)"><?= $task['name'] ?></td>
            <td onclick="getTaskDetails(<?= $task['id'] ?>)"><?= $task['email'] ?></td>
            <td onclick="getTaskDetails(<?= $task['id'] ?>)"><?= Lib\Helpers::statusText($task['status']) ?></td>

            <td><a href="/task/edit?id=<?= $task['id'] ?>" <i class="fa fa-edit"></i></td>
        </tr>

        <?php
    endforeach;
    ?>

</table>

<div class="pagination-container">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <li onclick="nextPage(<?= $i ?>)" class="<?= $currentPage == $i ? 'active' : '' ?>"><span><?= $i ?></span>
            </li>
        <?php endfor; ?>

    </ul>
</div>
