$(document).ready(function() {

    $('.block_id').on('click', function() {

        var BlockUserId = $(this).attr('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "Raz_Block_User/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, block_user_id: BlockUserId },
            success: function(data) {
                $('#remove_div' + data).remove();
            },
            error: function(response) {
                console.log(response);
            }
        })
    })

})