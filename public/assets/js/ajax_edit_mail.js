$(document).ready(function() {

    //  Check Email
    function CheckEmail() {
        var emailAdress = $('#edit_email').val();
        var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (emailAdress.match(regexEmail)) {
            $("#edit_email").css('border', '1px solid green');
        } else {
            $("#edit_email").css('border', '1px solid red');
        }
    }
    $("#edit_email").keyup(CheckEmail);



    // check old password
    $("#password_email").on("keyup", function() {

        var password_email = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "account_check_password/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, current_password: password_email, search_paswword: 'search_paswword' },
            success: function(response) {
                $("#password_email").css('border', '1px solid red');



                //  edit email
                $("#email_submit").on("click", function() {

                    var edit_email = $('#edit_email').val();
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "account_edit_email/",
                        type: 'POST',
                        dataType: 'json',
                        data: { _token: CSRF_TOKEN, edit_email: edit_email },
                        success: function(response) {

                            $('.succ_reset').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                                "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>NO25</div>");
                            $('.alert_close').fadeOut(3000)

                            $("#edit_email").val("");
                            $("#password_email").val("");

                        },
                        error: function(response) {

                            $('.succ_reset').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                                "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>YES25</div>");
                            $('.alert_close').fadeOut(3000)

                            $("#edit_email").val("");
                            $("#password_email").val("");

                        }
                    });
                });
            },
            error: function(response) {
                $("#password_email").css('border', '1px solid green');
            }
        });
    });





    //  check password delete profile

    // check old password
    $("#delete_profile_confirm").on("click", function() {

        var delete_profile = $('#delete_profile').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "account_delete/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, delete_profile: delete_profile },
            success: function(response) {
                window.location.href = "http://127.0.0.1:8000/";
                $("#delete_profile").css('border', '1px solid green');
            },
            error: function(response) {
                $("#delete_profile").css('border', '1px solid red');
            }
        });
    });
});