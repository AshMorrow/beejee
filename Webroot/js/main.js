function getTaskDetails(id) {

    $.ajax({
        url: '/task-details',
        method: 'POST',
        data: {postId: id}
    }).done(function (result) {
        if (result != 0) {
            $('#ajax-content').html(result);
            $('#task-details').modal();
        }
    });


}

function taskPreview() {
    var image = $("#task-image-url").val();
    var name = $("#task-name").val();
    var email = $("#task-email").val();
    var text = CKEDITOR.instances.taskText.getData();

    $('#task-details .modal-title').text(name);
    $('#task-details .task-email').text(email);
    $('#modal-task-image').attr('src', image);
    $('#task-details .modal-task-text').html(text);

    $('#task-details').modal();
}

function taskEditPreview() {
    var text = CKEDITOR.instances.taskText.getData();
    $('#task-details .modal-task-text').html(text);

    $('#task-details').modal();
}

/**
 * Using for change ordering type
 */
function chOrder() {
    var ordering = $('#order-by').find(':selected').val();
    var url = new URL(window.location.href);
    var page = url.searchParams.get("page");
    url = '';
    if (page) {
        url = '?';
        if (ordering !== '') url += 'orderBy=' + ordering + '&';
        url += 'page=' + page;
    } else if (ordering !== '') {
        url = '?orderBy=' + ordering;
    }

    window.location.href = window.location.origin + window.location.pathname + url;
}

/**
 * Using for pagination
 * @param page
 */
function nextPage(page) {
    if (page !== 'undefined') ;
    var ordering = $('#order-by').find(':selected').val();
    var url = '?';
    if (ordering) {
        url += 'orderBy=' + ordering + '&page=' + page;
    } else {
        url += 'page=' + page;
    }

    window.location.href = window.location.origin + window.location.pathname + url;
}

function showNotification(text, type) {

    var nt = $('#notifications_holder').append('<div class="nt_' + type + '">' + text + '</div>').find('div:last-child');

    if ($('#notifications_holder div').length > 4) {
        $('#notifications_holder div:first-child').remove();
    }
    window.setTimeout(function () {
        $(nt).fadeOut(function () {
            nt.remove();
        })
    }, 5000)
}
