$(document).ready(function() {
    console.log('document-ready');
    $("#register-info").hide();
    $("#register-form").hide();
    var isHidden = false;
    $('#sign-up-btn').click(function() {

        if (!isHidden) {
            $('#login-info').animate({
                left: '-1000px',
                opacity: '0',
            });
            $("#register-info").css({ left: "600px" }).show().animate({
                left: '-0px',
                opacity: '1',
            });
            $('#login-form').animate({
                left: '-1000px',
                opacity: '0',
            }).hide();
            $("#register-form").css({ left: "600px" }).show().animate({
                left: '-0px',
                opacity: '1',
            });
            isHidden = true;
        }

    });

    $('#login-btn').click(function() {
        if (isHidden) {
            $('#register-info').animate({
                left: '-1000px',
                opacity: '0',
            });
            $("#login-info").css({ left: "600px" }).show().animate({
                left: '-0px',
                opacity: '1',
            });
            $('#register-form').animate({
                left: '-1000px',
                opacity: '0',
            }).hide();
            $("#login-form").css({ left: "600px" }).show().animate({
                left: '-0px',
                opacity: '1',
            });
            isHidden = false;
        }

    });

});