jQuery(document).ready(function($) {

    $(".nav-primary .pg-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');

    $(".responsive-menu-icon").click(function(){
        $(this).next(".nav-primary .pg-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1206) {
            $(".nav-primary .pg-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".responsive-menu > li").removeClass("menu-open");
        }
    });

    $(".responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("menu-open");
        });
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    $(".cgal-social-search-icon").on('click', function (e) {
        e.preventDefault();
        $('.social-search-box').slideToggle(400);
    });

    $(".entry-content").fitVids();

    $(".cgal-sitemain-wrapper, .cgal-sidebar-wrapper").theiaStickySidebar({
      // Settings
      containerSelector: ".site-content-inside",
      additionalMarginTop: 0,
      additionalMarginBottom: 0,
      minWidth: 1206,
    });

});