$(document).ready(function() {

    // Check confirm password
    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password != confirmPassword) {
            $("#txtConfirmPassword").css('border', '1px solid red');
            $("#CheckPasswordMatch").html("Пароли не совпадают!");
        } else {
            $("#CheckPasswordMatch").html("");
            $("#txtConfirmPassword").css('border', '1px solid green');
        }

    }
    // Check Count
    function CheckCount() {
        var password = $("#txtNewPassword").val().length;


        if (password >= 6) {
            $("#txtNewPassword").css('border', '1px solid green');
            $("#CheckCount").html("");
        } else {
            $("#CheckCount").html("Должно быть не менее 6 символов");
            $("#txtNewPassword").css('border', '1px solid red');
        }
    }
    $(document).ready(function() {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
        $("#txtNewPassword").keyup(CheckCount);
    });

    // check old password
    $("#current_password").on("keyup", function() {

        var current_password = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "account_check_password/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, current_password: current_password, search_paswword: 'search_paswword' },
            success: function(response) {
                $("#current_password").css('border', '1px solid red');


                //  reset password
                $(".reset_password").on("click", function() {

                    var confirmPassword = $('#txtConfirmPassword').val();
                    var NewPassword = $('#txtNewPassword').val();
                    // var abc = "";
                    // abc = $('#abc').val("1");
                    // abc = $('#abc').val();

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    //alert(abc);
                    $.ajax({
                        url: "account_reset_password/",
                        type: 'POST',
                        dataType: 'json',
                        data: { _token: CSRF_TOKEN, confirmPassword: confirmPassword, NewPassword: NewPassword },
                        success: function(response) {

                            $('.succ_reset').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                                "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>NO</div>");
                            $('.alert_close').fadeOut(3000)

                            $("#txtConfirmPassword").val("");
                            $("#txtNewPassword").val("");
                            $("#current_password").val("");
                        },
                        error: function(response) {
                            $('.succ_reset').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                                "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>YES</div>");
                            $('.alert_close').fadeOut(3000)

                            $("#txtConfirmPassword").val("");
                            $("#txtNewPassword").val("");
                            $("#current_password").val("");
                        }
                    });
                });
            },
            error: function(response) {


                $("#current_password").css('border', '1px solid green');
            }
        });
    });






});