<div class="col-md-8 col-md-offset-2">
    <div class="box box-warning">
        <div class="box-body">
            <div class="col-md-6 text-center">
                <div class="image-container">
                    <div>
                        <img id="task-image" src="/img/image-placeholder.jpg" class="img-responsive" style="margin: 0 auto">
                    </div>
                </div>
                <button type="button" class="remove-item-container btn btn-danger" style="display: none; margin-top:10px;" onclick="TaskImage.remove()">
                    <i class="fa fa-remove"></i>
                    <span>remove image</span>
                </button>
            </div>
            <div class="col-md-6">
                <form id="task-creation-form" method="post" action="">
                    <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?> ">
                    <div>
                        <div class="file-upload-container">
                            <input id="task-image-input" type="file" onchange="TaskImage.upload(event)"
                                   style="display: none">
                            <input id="task-image-url" name="image" value="" hidden>
                            <canvas id="task-image-canvas" width="320" height="240" style="display: none"></canvas>
                        </div>
                        <div class="creator-info-container">
                            <div class="form-group">
                                <label for="task-name">
                                    <span>Name: </span>
                                </label>
                                <input id="task-name" type="text" name="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="task-email">
                                    <span>Email: </span>
                                </label>
                                <input id="task-email" type="email" name="email" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <textarea id="taskText" class="form-control" name="text"></textarea>
                    <div class="button-group row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <button class="btn btn-warning" type="button" onclick="$('#task-image-input').click()">Upload image</button>
                        </div>
                        <div class="col-md-8 text-right" >
                            <button class="btn btn-info" type="button" onclick="taskPreview()">Preview</button>
                            <button class="btn btn-success" type="submit">Create</button>
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
                        <img id="modal-task-image" class="img-responsive" src="/img/image-placeholder.jpg"
                             onerror="$(this).attr('src', '/img/image-placeholder.jpg')">
                    </div>
                    <div class="task-info">
                        <div class="task-info-group">
                            <span class="task-info-label">Email: </span>
                            <span class="task-email"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-task-text col-md-8">
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