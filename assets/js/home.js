
$(document).ready(function () {

    $("#scrollBotm").click(function () {
        $('html, body').animate({
            scrollTop: $("#tricks").offset().top
        }, 1000);
    });

    $('#scrollTop').click(function () {
        $('html, body').animate({
            scrollTop: '700px'
        },
            1000);
        return false;
    });
});
