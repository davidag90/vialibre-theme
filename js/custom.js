jQuery(function ($) {
    // Owl Carousel
    $(".owl-carousel").on("initialized.owl.carousel", () => {
        setTimeout(() => {
            $(".owl-item.active .owl-slide-animated").addClass("is-transitioned");
        }, 200);
    });

    const $owlCarousel = $(".owl-carousel").owlCarousel({
        items:              1,
        loop:               true,
        nav:                true,
        dots:               false,
        autoplayHoverPause: true,
        navText:            [
                                '<svg id="arrow-left" width="50" height="50" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>',
                                '<svg id="arrow-right" width="50" height="50" viewBox="0 0 24 24"><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>'
                            ]
    });

    $owlCarousel.on("changed.owl.carousel", e => {
        $(".owl-slide-animated").removeClass("is-transitioned");
        const $currentOwlItem = $(".owl-item").eq(e.item.index);
        $currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
    });

    $(window).load(function(){
        $owlCarousel.trigger('play.owl.autoplay',[7500]);
    });

    // Add class link-light to footer menus
    $('#menu-cordoba > .menu-item > a').addClass('link-light');
    $('#menu-alta-montana > .menu-item > a').addClass('link-light');

    // Clase .list-group-item para sub-elementos de .list-group
    $('div.list-group').find('p').unwrap();
    $('div.list-group').find('a').unwrap();
    $('div.list-group').children('a').addClass('list-group-item list-group-item-action');

}); // jQuery End
