jQuery(function ($) {
  // Owl Carousel
  $(".owl-carousel").on("initialized.owl.carousel", () => {
    setTimeout(() => {
      $(".owl-item.active .owl-slide-animated").addClass("is-transitioned");
    }, 200);
  });

  const $owlCarousel = $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    dots: false,
    autoplayHoverPause: true,
    navText: [
      '<i class="fa-solid fa-circle-arrow-left fa-2xl text-light shadow-lg"></i>',
      '<i class="fa-solid fa-circle-arrow-right fa-2xl text-light shadow-lg"></i>',
    ],
  });

  $owlCarousel.on("changed.owl.carousel", (e) => {
    $(".owl-slide-animated").removeClass("is-transitioned");
    const $currentOwlItem = $(".owl-item").eq(e.item.index);
    $currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
  });

  /* $(window).load(function(){
        $owlCarousel.trigger('play.owl.autoplay',[7500]);
    }); */

  // Add class link-light to footer menus
  $("#menu-cordoba > .menu-item > a").addClass("link-light");
  $("#menu-alta-montana > .menu-item > a").addClass("link-light");

  // Clase .list-group-item para sub-elementos de .list-group
  $("div.list-group").find("p").unwrap();
  $("div.list-group").find("a").unwrap();
  $("div.list-group")
    .children("a")
    .addClass("list-group-item list-group-item-action");

  // Botones flotantes
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 500) {
      $(".float-btn").addClass("visible");
    } else {
      $(".float-btn").removeClass("visible");
    }
  });
}); // jQuery End
