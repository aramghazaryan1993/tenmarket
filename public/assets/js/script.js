$(document).ready(function() {


    $("div.alert").fadeOut(3000)


    // Fizicheskoye
    $('#lastname,#username,#surname,#phone_number,#email,#post_code,#city').on('keyup click', function() {

        var lastname = $('#lastname').val();
        var username = $('#username').val();
        var surname = $('#surname').val();
        var phone_number = $('#phone_number').val();
        var email = $('#email').val();
        var post_code = $('#post_code').val();
        var city = $('#city').val();

        var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        //alert(lastname);
        if (lastname != '' && lastname != ' ') {
            $("#lastname").css('border', '1px solid green');
        } else {
            $("#lastname").css('border', '1px solid red');
        }

        if (username != '' && username != ' ') {
            $("#username").css('border', '1px solid green');
        } else {
            $("#username").css('border', '1px solid red');
        }

        if (surname != '' && surname != ' ') {
            $("#surname").css('border', '1px solid green');
        } else {
            $("#surname").css('border', '1px solid red');
        }

        if (phone_number != '' && phone_number != ' ') {
            $("#phone_number").css('border', '1px solid green');
        } else {
            $("#phone_number").css('border', '1px solid red');
        }

        if (email != '' && email != ' ' && email.match(regexEmail)) {
            $("#email").css('border', '1px solid green');
        } else {
            $("#email").css('border', '1px solid red');
        }

        if (post_code != '' && post_code != ' ' && post_code.length >= 4 && post_code.length <= 10) {
            $("#post_code").css('border', '1px solid green');
            //$('.post_code').html('Количество знаков не должно превышать 4 и 4 и Количество не должно превышать 10')
        } else {
            $("#post_code").css('border', '1px solid red');
        }

        if (city != '' && city != ' ') {
            $("#city").css('border', '1px solid green');
        } else {
            $("#city").css('border', '1px solid red');
        }

    });


    // Yuridicheskoye
    $('#inn,#kno,#pno,#kpp,#ogrn,#telephone,#mail,#contact_person,#legal_address,#mailadd,#post_index1,#customer_box1,#post_address1,#locality,#street,#to_post_index,#house,#to_post_address').on('keyup click', function() {

        var inn = $('#inn').val();
        var kno = $('#kno').val();
        var pno = $('#pno').val();
        var kpp = $('#kpp').val();
        var ogrn = $('#ogrn').val();
        var telephone = $('#telephone').val();
        var mail = $('#mail').val();
        var contact_person = $('#contact_person').val();
        var legal_address = $('#legal_address').val();

        var mailadd = $('#mailadd').val();
        var mailadd2 = $('#mailadd2').val();

        var post_index1 = $('#post_index1').val();
        var customer_box1 = $('#customer_box1').val();


        var locality = $('#locality').val();
        var street = $('#street').val();
        var to_post_index = $('#to_post_index').val();
        var house = $('#house').val();



        var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        //alert(lastname);
        if (inn != '' && inn != ' ' && inn.length >= 10 && inn.length <= 12) {
            $("#inn").css('border', '1px solid green');
        } else {
            $("#inn").css('border', '1px solid red');
        }

        if (kno != '' && kno != ' ') {
            $("#kno").css('border', '1px solid green');
        } else {
            $("#kno").css('border', '1px solid red');
        }

        if (pno != '' && pno != ' ') {
            $("#pno").css('border', '1px solid green');
        } else {
            $("#pno").css('border', '1px solid red');
        }

        if (kpp != '' && kpp != ' ' && kpp.length == 9) {
            $("#kpp").css('border', '1px solid green');
        } else {
            $("#kpp").css('border', '1px solid red');
        }


        if (ogrn != '' && ogrn != ' ' && ogrn.length >= 13 && ogrn.length <= 20) {
            $("#ogrn").css('border', '1px solid green');
        } else {
            $("#ogrn").css('border', '1px solid red');
        }

        if (telephone != '' && telephone != ' ') {
            $("#telephone").css('border', '1px solid green');
        } else {
            $("#telephone").css('border', '1px solid red');
        }

        if (mail != '' && mail != ' ' && mail.match(regexEmail)) {
            $("#mail").css('border', '1px solid green');
        } else {
            $("#mail").css('border', '1px solid red');
        }

        if (legal_address != '' && legal_address != ' ') {
            $("#legal_address").css('border', '1px solid green');
        } else {
            $("#legal_address").css('border', '1px solid red');
        }


        //  абонентский ящик
        if (mailadd == 0) {

            if (post_index1 != '' && post_index1 != ' ' && post_index1.length >= 4 && post_index1.length <= 10) {
                $("#post_index1").css('border', '1px solid green');
            } else {
                $("#post_index1").css('border', '1px solid red');
            }

            // if (customer_box1 != '' && customer_box1 != ' ') {
            //     $("#customer_box1").css('border', '1px solid green');
            // } else {
            //     $("#customer_box1").css('border', '1px solid red');
            // }

        }

        //  по адресу
        if (mailadd2 == 1) {

            if (locality != '' && locality != ' ') {
                $("#locality").css('border', '1px solid green');
            } else {
                $("#locality").css('border', '1px solid red');
            }

            if (street != '' && street != ' ') {
                $("#street").css('border', '1px solid green');
            } else {
                $("#street").css('border', '1px solid red');
            }

            if (to_post_index != '' && to_post_index != ' ' && to_post_index.length >= 4 && to_post_index.length <= 10) {
                $("#to_post_index").css('border', '1px solid green');
            } else {
                $("#to_post_index").css('border', '1px solid red');
            }

            if (house != '' && house != ' ') {
                $("#house").css('border', '1px solid green');
            } else {
                $("#house").css('border', '1px solid red');
            }

        }



    });

    $('#bik,#check_account,#kbk,#oktmo').on('click keyup', function() {

        var bik = $('#bik').val();
        var check_account = $('#check_account').val();
        var kbk = $('#kbk').val();
        var oktmo = $('#oktmo').val();


        // pardatir dasht chi
        if (bik.length == 9) {
            $("#bik").css('border', '1px solid green');
        } else {
            $("#bik").css('border', '1px solid #dedd23');
        }

        if (check_account != '' && check_account != ' ' && check_account.length == 20) {
            $("#check_account").css('border', '1px solid green');
        } else {
            $("#check_account").css('border', '1px solid #dedd23');
        }


        if (kbk.length >= 10 && kbk.length <= 25) {
            $("#kbk").css('border', '1px solid green');
        } else {
            $("#kbk").css('border', '1px solid #dedd23');
        }

        if (oktmo.length >= 10 && oktmo.length <= 25) {
            $("#oktmo").css('border', '1px solid green');
        } else {
            $("#oktmo").css('border', '1px solid #dedd23');
        }

    });



    $(function() {
        $("#submit").validate({
            rules: {
                mailadd: "required"
            },
            messages: {
                mailadd: "You must select an account type"
            },
            errorPlacement: function(error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.container'));
                } else { // This is the default behavior
                    error.insertAfter(element);
                }
            }
        });
    });
});