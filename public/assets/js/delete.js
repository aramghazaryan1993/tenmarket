$(document).ready(function() {

    $('.closeDiv').on('click', function() {

        var ImgId = $(this).attr('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/DeleteImgArganizacya",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, ImgId: ImgId },
            success: function(data) {
                alert('Картина удалена');
            },
            error: function(response) {
                console.log(response);

            }
        })
    })

    $('.rkuplyu').on('click', function() {

        var ImgId = $(this).attr('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/DeleteImgKuplyu",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, ImgId: ImgId },
            success: function(data) {
                alert('Картина удалена');
            },
            error: function(response) {
                console.log(response);

            }
        })
    })

})
