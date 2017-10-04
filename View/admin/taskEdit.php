<div>
    <div class="col-md-4">
        <div class="image-container">
            <img id="task-image" src="/uploads/<?= $task['id'] ?>.png" class="img-responsive"
                 onerror="$(this).attr('src', '/img/image-placeholder.jpg')">
        </div>
    </div>
    <div class="col-md-8">
        <form id="task-creation-form" method="post" action="">
            <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?> ">
            <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
            <div>
                <div class="creator-info-container">
                    <label>
                        <span>Name: </span>
                        <span id="task-name">
                            <?= $task['name'] ?>
                        </span>
                    </label>
                    <div class="separator hidden-sm"></div>
                    <label>
                        <span>Email: </span>
                        <span id="task-email">
                            <?= $task['email'] ?>
                        </span>
                    </label>
                </div>
            </div>
            <textarea id="taskText" class="form-control" name="text"><?= $task['text'] ?></textarea>
            <div class="button-group">
                <label class="task-status-trigger">
                    <input style="display: none" type="checkbox" name="status" <?= $task['status'] ? 'checked' : '' ?> >
                    <div class="bg">
                        <div class="knob"></div>
                    </div>
                </label>
                <div>
                    <button type="button" onclick="taskEditPreview()">Preview</button>
                    <button type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="task-details" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= $task['name'] ?></h4>
            </div>
            <div class="modal-body" style="">
                <div class="col-md-5 left-side">
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
                <div class="modal-task-text col-md-7 right-side">

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('taskText');
</script>