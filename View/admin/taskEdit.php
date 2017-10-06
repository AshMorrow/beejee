<div class="col-md-8 col-md-offset-2">
    <div class="box box-warning">
        <div class="box-body">
            <div class="col-md-6 text-center">
                <div class="image-container">
                    <div>
                        <img id="task-image" src="/uploads/<?= $task['id'] ?>.png" class="img-responsive" style="margin: 0 auto">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form id="task-creation-form" method="post" action="">
                    <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?> ">
                    <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
                    <div>
                        <div class="creator-info-container">
                            <div class="form-group">
                                <label for="task-name">
                                    <span>Name: </span>
                                </label>
                                <input id="task-name" type="text" class="form-control" value="<?= $task['name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="task-email">
                                    <span>Email: </span>
                                </label>
                                <input id="task-email" type="email" class="form-control" value="<?= $task['email'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <textarea id="taskText" class="form-control" name="text"><?= $task['text'] ?></textarea>
                    <div class="button-group row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <label class="trigger-container">
                                <input type="checkbox" <?= $task['status']? 'checked': '' ?> name="status">
                                <div class="trigger-bg">
                                    <div class="trigger-knob"></div>
                                </div>
                            </label>
                        </div>
                        <div class="col-md-8 text-right" >
                            <button class="btn btn-info" type="button" onclick="taskPreview()">Preview</button>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview modal -->
<div class="modal fade" id="task-details" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
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
                <div class="modal-task-text col-md-8">
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


<script>
    CKEDITOR.replace('taskText');
</script>