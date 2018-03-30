$(document).ready(function () {
    $(".comment").slice(0, 4).show();

    $("#loadMore").on('click', function (e) {
        e.preventDefault();

        $(".comment:hidden").slice(0, 4).slideDown();

        if ($(".comment:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }

        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});
