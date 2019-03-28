
$(document).ready(function() {

    $("#scrollBotm").click(function() {
        $('html, body').animate({
            scrollTop: $("#tricks").offset().top
        }, 1500);
    });

    // $('#scrollBotm').click(function(){
    //     $('html, body').animate({scrollTop:$(document).height()}, 1500);
    //     return false;
    // });

    $('#scrollTop').click(function () {
        $('html, body').animate({
            scrollTop: '700px'
        },
        1500);
        return false;
    });

});
