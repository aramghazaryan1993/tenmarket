$(document).ready(function() {
    $("contact_info").css('text-align', 'center');


    // var pn = $("#pn").text();
    // alert(pn)
    // if (pn == "") {
    //     alert(pn);
    //     $("#del_tel").removeClass("fancybox");
    // } else {
    //     $("#del_tel").addClass("fancybox");
    // }

    // $("#pn").on("click", function() {
    //     if (pn == "") {
    //         alert(pn);
    //         $("#del_tel").removeClass("fancybox");
    //     } else {
    //         $("#del_tel").addClass("fancybox");
    //     }
    // })

    // edit phone number
    $("#phone_number_save").on("click", function() {

        var phone_number_input = $('#phone_number_input').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, phone_number_input: phone_number_input, phone: 'phone' },
            success: function(data) {
                // alert('444');
                // $(".phone_number").html(phone_number_input);

                // $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                //     "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                // $('.alert_close').fadeOut(3000)

                // $("#del_tel").addClass("fancybox");
            },
            error: function(response) {
                $(".phone_number").html(phone_number_input);

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

                $("#del_tel").addClass("fancybox");
                console.log(response);
            }
        });
    });


    // delete phone number
    $("#phone_number_delete").on("click", function() {

        var phone_number_delete_value = $('#phone_number_delete_value').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, phone_number_input: phone_number_delete_value, phone: 'phone' },
            success: function(data) {
                $(".phone_number").html(phone_number_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

                //$("#del_tel").removeClass("fancybox");

            },
            error: function(response) {
                $(".phone_number").html(phone_number_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)
            }
        });
    });

    // edith viber
    $("#viber_save").on("click", function() {

        var viber_input = $('#viber_input').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, viber_input: viber_input, viber: 'viber' },
            success: function(data) {

                $(".viber").html(viber_input);

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

            },
            error: function(response) {
                $(".viber").html(viber_input);

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)
            }
        });
    });

    // delete viber
    $("#viber_delete").on("click", function() {

        var viber_delete_value = $('#viber_delete_value').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, viber_input: viber_delete_value, viber: 'viber' },
            success: function(data) {
                $(".viber").html(viber_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

            },
            error: function(response) {
                $(".viber").html(viber_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)
            }
        });
    });

    // edith whatsapp
    $("#whatsapp_save").on("click", function() {

        var whatsapp_input = $('#whatsapp_input').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, whatsapp_input: whatsapp_input, whatsapp: 'whatsapp' },
            success: function(data) {

                $(".whatsapp").html(whatsapp_input);

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

                // $("#del_tel").addClass("fancybox");
            },
            error: function(response) {
                $(".whatsapp").html(whatsapp_input);

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)
            }
        });
    });


    // delete whatsapp
    $("#whatsapp_delete").on("click", function() {

        var whatsapp_delete_value = $('#whatsapp_delete_value').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "edit_delete_contact_information/",
            type: 'POST',
            dataType: 'json',
            data: { _token: CSRF_TOKEN, whatsapp_input: whatsapp_delete_value, whatsapp: 'whatsapp' },
            success: function(data) {
                $(".whatsapp").html(whatsapp_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)

                //$("#del_tel").removeClass("fancybox");

            },
            error: function(response) {
                $(".whatsapp").html(whatsapp_delete_value);

                $("#fancybox-container-4").css('display', 'none');

                $('.contact_info').prepend("<div style='width:60%;margin:auto;'  class='alert alert-success contact_info alert_close'>" +
                    "<a  href='#' class='close' data-dismiss='alert' aria-label='close'>&times; </a>hfdhgkfhgkj</div>");

                $('.alert_close').fadeOut(3000)
            }
        });
    });
});