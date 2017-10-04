<div>
    <div class="col-md-4">
        <div class="image-container">
            <img id="task-image" src="/img/image-placeholder.jpg" class="img-responsive">

            <div class="remove-item-container" style="display: none" onclick="TaskImage.remove()">
                <i class="fa fa-remove"></i>
                <span>remove image</span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form id="task-creation-form" method="post" action="">
            <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?> ">
            <div>
                <div class="image-container">
                    <input id="task-image-input" type="file" onchange="TaskImage.upload(event)" style="display: none">
                    <input id="task-image-url" name="image" value="" hidden>
                    <canvas id="task-image-canvas" width="320" height="240" style="display: none"></canvas>
                </div>
                <div class="creator-info-container">
                    <label>
                        <span>Name: </span>
                        <input id="task-name" type="text" name="name" required class="form-control">
                    </label>
                    <div class="separator hidden-sm"></div>
                    <label>
                        <span>Email: </span>
                        <input id="task-email" type="email" name="email" required class="form-control">
                    </label>
                </div>
            </div>
            <textarea id="taskText" class="form-control" name="text"></textarea>
            <div class="button-group">
                <button type="button" onclick="$('#task-image-input').click()">Upload image</button>
                <div>
                    <button type="button" onclick="taskPreview()">Preview</button>
                    <button type="submit">Create</button>
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
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="">
                <div class="col-md-5 left-side">
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