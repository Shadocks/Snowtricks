$(document).ready(function(){

    $('.btnDelete').click(function(){
        $("#removeTrickModal").modal();
        $('a').attr('href', $(this).attr('data-href'));
        return false;
    });

    $(".trick").slice(0, 12).show();

    $("#loadMore").on('click', function (e) {
        e.preventDefault();

        $(".trick:hidden").slice(0, 4).slideDown();

        if ($(".trick:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }

        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});