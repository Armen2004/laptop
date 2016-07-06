$(document).ready(function () {

    /*OPEN_CLOSE menu*/
    $(document).on('click', '.open-menu', function () {
        $('.content-section').addClass('short-content');
        $('.header-part-2').addClass('add-width');
        $('.content-left').css({"display": "block"});
        $('.user-area').addClass('display-hide');
    });

    $(document).on('click', '.clos-content', function () {
        $('.content-section').removeClass('short-content');
        $('.content-left').css({"display": "none"});
        $('.user-area').removeClass('display-hide');
        $('.header-part-2').removeClass('add-width');
    });

    /*OPEN_CLOSE menu END*/


    ImageWidth();
    fixBlogHeight();
    fixCenterHeight();
    $(window).resize(function () {
        ImageWidth();
        fixBlogHeight();
        fixCenterHeight();

    });


    function ImageWidth() {
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        var docHeight = $(document).height();
        if (winWidth < 991) {
            $('.content-left').height($('.full-height-container').height());
        }

        if (docHeight > winHeight) {
            $('.sales-page').css({"height": docHeight});

        } else {
            $('.sales-page').css({"height": winHeight});
        }

        $('.get-started-page').css({"width": winWidth, "height": winHeight});

    }


    function fixBlogHeight() {
        $('.blog-post-left').each(function () {
            $(this).next().find('img').height($(this).outerHeight());
        })
    }

    function fixCenterHeight() {
        $('.get-started-content').css('marginTop', ($(window).height() - $('.get-started-content').height()) / 2)
    }

    Placeholdem(document.querySelectorAll('[placeholder]'));


    /*Accordion JS*/
    $('.collapse.in').prev('.panel-heading').addClass('active');

    $('#accordion, #bs-collapse')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });

    // make code pretty
    window.prettyPrint && prettyPrint();

    //call sliphover plugin
    $('.demo').sliphover();

    $('#demo').pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
    });

});
