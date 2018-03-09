$(document).ready(function() {
    var $container = $('div#trick_update_picture');
    var index;

    /********************* REMOVE LABEL CLASS="REQUIRED" **********************/

    var labelNumber = document.querySelectorAll('label[class="required"]');
    labelNumber.forEach(
        function (t) {
            t.remove();
        }
    );

    /**************** REMOVE FIELD TYPE-FIELD AND DEFINE INDEX ****************/

    if (document.querySelectorAll('input[type="file"]').length === 0) {
        index = $container.find('div#trick_update_picture').length;
    } else {
        index = document.querySelectorAll('input[type="file"]').length;

        var input = document.querySelectorAll('input[type="file"]');
        input.forEach(
            function (v) {
                v.remove();
            }
        );
    }

    $('#add_picture').click(function(e) {
        addPicture($container);
        e.preventDefault();
        return false;
    });


    if (index === 0) {
        addPicture($container);
    }

    function addPicture($container) {
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Image n°' + (index+1))
            .replace(/__name__/g, index)
        ;

        var $prototype = $(template);
        addDeleteLink($prototype);
        $container.append($prototype);
        index++;
    }

    function addDeleteLink($prototype) {
        var $deleteLink = $('<a href="#" class="btn btn-danger btn-xs">Supprimer image</a>');

        $prototype.append($deleteLink);

        $deleteLink.click(function(e) {
            $prototype.remove();

            e.preventDefault();
            return false;
        });
    }
});

$(document).ready(function() {
    var $container = $('div#trick_update_video');
    var index;

    /*************************** DEFINE INDEX *********************************/

    if (document.querySelectorAll('a[id="video"]').length === 0) {
        index = $container.find('div#trick_update_picture').length;
    } else {
        index = document.querySelectorAll('a[id="video"]').length;
    }

    $('#add_video').click(function(e) {
        addVideo($container);
        e.preventDefault();
        return false;
    });


    if (index === 0) {
        addVideo($container);
    }

    function addVideo($container) {
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Vidéo n°' + (index+1))
            .replace(/__name__/g, index)
        ;

        var $prototype = $(template);
        addDeleteLink($prototype);
        $container.append($prototype);
        index++;
    }

    function addDeleteLink($prototype) {
        var $deleteLink = $('<a href="#" class="btn btn-danger btn-xs">Supprimer vidéo</a>');

        $prototype.append($deleteLink);

        $deleteLink.click(function(e) {
            $prototype.remove();

            e.preventDefault();
            return false;
        });
    }
});
