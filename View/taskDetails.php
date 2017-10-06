<div class="modal fade" id="task-details" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $task['name'] ?></h4>
            </div>
            <div class="modal-body" style="">
                <div class="col-md-4">
                    <div class="task-image">
                        <img id="modal-task-image" class="img-responsive" src="/uploads/<?= $task['id'] ?>.png"
                             onerror="$(this).attr('src', '/img/image-placeholder.jpg')">
                    </div>
                    <div class="task-info">
                        <div class="task-info-group">
                            <span class="task-info-label">Email: </span>
                            <span class="task-email"><?= $task['email'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?= $task['text'] ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer" style="background-color: #fff">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        <div class="clearfix"></div>
    </div>
</div>