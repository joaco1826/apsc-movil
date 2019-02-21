require('./bootstrap');

$(document).ready(function () {
    $('.date').datetimepicker({
        locale: 'es',
        viewMode: 'years',
        defaultDate: false,
        format: 'YYYY-MM-DD',
    });
   $(".menu").click(function () {
       $(".content-menu").animate({left: "0", opacity: 1}, 400)
       $(this).css("display", "none");
       $(".close-menu").css("display", "inline-block");
   });
    $(".close-menu").click(function () {
        $(".content-menu").animate({left: "-100%", opacity: 0}, 400)
        $(this).css("display", "none");
        $(".menu").css("display", "inline-block");
    });

    $('#frmLogin').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            async:true,
            type: "POST",
            dataType: "json",
            url:"/login",
            data: $("#frmLogin").serialize(),
            statusCode: {
                200: function(data) {
                    location.href="/home";
                },
                400: function (data) {
                    swal('¡Ups!', data.responseJSON.message, 'warning')
                },
                500: function (data) {
                    swal('¡Ups!', 'Algo salió mal, contacte a su administrador', 'warning')
                },

                422: function (data) {
                    $.each(data.responseJSON.errors, function (key, text) {
                        swal(key, text, 'warning');
                        return false;
                    });
                }
            }
        });
    });

    $('#frmRegister').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            async:true,
            type: "POST",
            dataType: "json",
            url:"/register",
            data: $("#frmRegister").serialize(),
            statusCode: {
                201: function(data) {
                    location.href="/home";
                },
                400: function (data) {
                    swal('¡Ups!', data.responseJSON.message, 'warning')
                },
                500: function (data) {
                    swal('¡Ups!', 'Algo salió mal, contacte a su administrador', 'warning')
                },

                422: function (data) {
                    $.each(data.responseJSON.errors, function (key, text) {
                        swal(key, text, 'warning');
                        return false;
                    });
                }
            }
        });
    });
});