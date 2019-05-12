
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

/********************************************** */
//Correction du bug lié au téléchargement de fichier de bootstrap 4, le fichier ou image téléchargé n'apparait pas
/********************************************** */

$(document).on('change', '.custom-file-input', function () {
    let fileName = $(this).val().replace(/\\/g, '/').replace(/.*\//, '');
    $(this).parent('.custom-file').find('.custom-file-label').text(fileName);
});

/********************************************** */
// Gestion des Collection of Forms pour l'ajout de trick (figure)
/********************************************** */
var $collectionHolder;

// setup an "add a picture" link
var $addPictureButton = $('<button type="button" class="add_picture_link btn btn-primary rounded-0 my-2">Ajouter une image</button>');
var $newLinkLi = $('<div></div>').append($addPictureButton);

jQuery(document).ready(function () {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('div.pictures');

    // add the "add a picture" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addPictureButton.on('click', function (e) {
        // add a new tag form (see next code block)
        addForm($collectionHolder, $newLinkLi);
    });
    // });

    function addForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an div, before the "Add a tag" div
        var $newFormLi = $('<div class="d-flex-img"></div>').append(newForm);
        $newLinkLi.before($newFormLi);

        addPictureFormDeleteLink($newFormLi);
    }

    function addPictureFormDeleteLink($pictureFormLi) {
        var $removeFormButton = $('<div class="text-right delete-img"><button type="button" class="btn btn-primary btn-delete-img rounded-0"><i class="far fa-trash-alt"></i></button></div>');
        $pictureFormLi.append($removeFormButton);

        $removeFormButton.on('click', function (e) {
            $pictureFormLi.remove();
        });
    }
});

/************************ */
/** Ajouter video */
/********************* */
var $collection;

// setup an "add a picture" link
var $addVideoButton = $('<button type="button" class="add_picture_link btn btn-primary rounded-0 my-2">Ajouter une video</button>');
var $newLink = $('<div></div>').append($addVideoButton);

jQuery(document).ready(function () {
    // Get the ul that holds the collection of tags
    $collection = $('div.videos');

    // add the "add a picture" anchor and li to the tags ul
    $collection.append($newLink);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collection.data('index', $collection.find(':input').length);

    $addVideoButton.on('click', function (e) {
        // add a new tag form (see next code block)
        addVideoForm($collection, $newLink);
    });

    function addVideoForm($collection, $newLink) {
        // Get the data-prototype explained earlier
        var prototype = $collection.data('prototype');

        // get the new index
        var index = $collection.data('index');

        var newForm = prototype;

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collection.data('index', index + 1);

        // Display the form in the page in an div, before the "Add a tag" div
        var $newForm = $('<div class="d-flex-img"></div>').append(newForm);
        $newLink.before($newForm);

        addVideoFormDeleteLink($newForm);
    }

    function addVideoFormDeleteLink($pictureForm) {
        var $removeFormButton = $('<div class="text-right delete-img"><button type="button" class="btn btn-primary btn-delete-img rounded-0"><i class="far fa-trash-alt"></i></button></div>');
        $pictureForm.append($removeFormButton);

        $removeFormButton.on('click', function (e) {
            $pictureForm.remove();
        });
    }
});