var TaskImage = {

    remove: function () {
        $('#task-image-url').val('');
        $('#task-image-input').val('');
        $('#task-image').attr('src','/img/image-placeholder.jpg');
        $('.remove-item-container').css('display', 'none');
    },

    upload: function updateImageDisplay(e) {
        var files = e.target.files[0];
        if(files.type.match('image/jpeg') || files.type.match('image/gif') || files.type.match('image/png')){
            var fr = new FileReader();
            fr.onload = function (e) {
                var canvas = document.getElementById('task-image-canvas');
                var context = canvas.getContext('2d');
                var imageObj = new Image();
                imageObj.onload = function() {
                    if(this.width > 320 || this.height > 240){
                        if(this.width > this.height){
                            canvas.width = 320;
                            canvas.height = this.height * (320 / this.width);
                            if(canvas.height > 240){
                                canvas.width = this.width * (240 / this.height);
                                canvas.height = 240;
                            }
                        }else{
                            canvas.width = this.width * (240 / this.height);
                            canvas.height = 240;
                        }
                    }


                    context.drawImage(this, 0, 0, canvas.width, canvas.height);
                    var imgUrl = canvas.toDataURL();
                    $('#task-image-url').val(imgUrl);
                    $('#task-image').attr('src',imgUrl);
                    $('.remove-item-container').fadeIn();
                };

                imageObj.src = e.target.result;
            };
            fr.readAsDataURL(files);
        }else {
            showNotification('Incorrect image type', 'error')
        }
    }

};