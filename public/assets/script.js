$(document).ready(function() {

    $('input[type=password]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

//validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }
        //validate simbol
        if ( pswd.match(/[!@#$%^&*]/) ) {
            $('#simbol').removeClass('invalid').addClass('valid');
        } else {
            $('#simbol').removeClass('valid').addClass('invalid');
        }


//validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });
    function myFunction()
    {

    }
    $(".show-pwd").click(function() {

        $(this).toggleClass("bx-show bx-hide");
        const input = $($(this).attr("toggle"));
        const x = document.getElementById("password");
        const z = document.getElementById("password-confirmation");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
    });
    $(".login-pwd").click(function() {

        $(this).toggleClass("bx-show bx-hide");
        const input = $($(this).attr("toggle"));
        const x = document.getElementById("user-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });
});
