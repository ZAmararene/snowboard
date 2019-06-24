/******************************
 * Icônes SVG trumbowyg
 *****************************/

$.trumbowyg.svgPath = '/icons.svg';

$('#add_trick_content').trumbowyg();
$('#comment_content').trumbowyg();

/*******************************
 * Carousel
 *******************************/

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

/*********************************************************************/
// Correction du bug lié au téléchargement de fichier de bootstrap 4,
// le fichier ou image téléchargé n'apparait pas
/************************************************************************/

$(document).on('change', '.custom-file-input', function () {
    let fileName = $(this).val().replace(/\\/g, '/').replace(/.*\//, '');
    $(this).parent('.custom-file').find('.custom-file-label').text(fileName);
});

/***************************************************************** */
// Gestion des Collections of Forms pour l'ajout de trick (figure)
/*********************************************************************/

$(".btn-add").on("click", function () {
    var $collectionHolder = $($(this).data("rel"));
    var index = $collectionHolder.data("index");
    var prototype = $collectionHolder.data("prototype");
    $collectionHolder.append(prototype.replace(/__name__/g, index));
    $collectionHolder.data("index", index + 1);
});

$("body").on("click", ".btn-remove", function () {
    $($(this).data("rel")).remove();
});