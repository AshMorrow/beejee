<div class="box">
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <div class="dataTables_length">
                        <label>
                            <select id="order-by" class="form-control" onchange="chOrder()">
                                <option value="">---</option>
                                <option value="name" <?= $_GET['orderBy'] == 'name' ? 'selected' : '' ?>>name</option>
                                <option value="email" <?= $_GET['orderBy'] == 'email' ? 'selected' : '' ?>>email
                                </option>
                                <option value="status" <?= $_GET['orderBy'] == 'status' ? 'selected' : '' ?>>status
                                </option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Email</th>
                            <th rowspan="1" colspan="1">Text</th>
                            <th rowspan="1" colspan="1">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($tasks as $task):
                            ?>
                            <tr onclick="getTaskDetails(<?= $task['id'] ?>)">
                                <td>
                                    <div class="task-list-img-container" style="height: 80px; width: 80px">
                                        <img class="task-img img-responsive" src="/uploads/<?= $task['id'] ?>.png" alt=""
                                             onerror="$(this).attr('src', '/img/image-placeholder.jpg')">
                                    </div>
                                </td>
                                <td>
                                    <?= $task['name'] ?>
                                </td>
                                <td>
                                    <?= $task['email'] ?>
                                </td>
                                <td class="task-list-short-text">
                                    <?= $task['short_text'] ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <div class="status-info status-info-<?= $task['status'] ?>">
                                        <div></div>
                                    </div>
                                </td>
                            </tr>

                            <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                </div>
                <div class="col-sm-7">
                    <div style="text-align: right">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $pages; $i++): ?>
                                <li onclick="nextPage(<?= $i ?>)"
                                    class="paginate_button <?= $currentPage == $i ? 'active' : '' ?>">
                                    <span><?= $i ?></span>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
