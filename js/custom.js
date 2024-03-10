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
                                '<svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" height="3rem" viewBox="0 0 320 512"><style>svg{fill:#ffffff}</style><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>'
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
    $('.footer_widget > div > ul > li > a').addClass('link-light');

    // Tratamiento de div ".list-group" para cumplir especificaciones Bootstrap
    $('div.list-group').find('p').unwrap();
    $('div.list-group').find('a').unwrap();
    $('div.list-group').children('a').addClass('list-group-item list-group-item-action');

    $('.wp-block-embed-youtube > div').addClass('ratio ratio-16x9');
    
    $('.btn.acceso-modal').each(function() {
        var target = $(this).attr('href');
        var content = $(this).html();
        
        $(this).replaceWith('<button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="' + target + '" >' + content + '</button>'); 
    });
}); // jQuery End
