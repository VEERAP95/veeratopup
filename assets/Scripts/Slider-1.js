$(document).ready(function () {
    var owl = $("#owl-demo");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 1],
            [1000, 1],
            [1200, 1],
            [1400, 1],
            [1600, 1]
        ],
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true
    });
    owl.trigger('owl.play', 5000);

    var owl = $("#owl-demo1");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 2],
            [1000, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
        ],
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true
    });
    owl.trigger('owl.play', 5000);

    var owl = $("#owl-operators");
    owl.owlCarousel({
        itemsCustom: [
            [0, 2],
            [450, 2],
            [600, 2],
            [700, 3],
            [1000, 4],
            [1200, 5],
            [1400, 5],
            [1600, 5]
        ],
        autoplay: true,
        autoPlaySpeed: 1000,
        autoPlayTimeout: 1000,
        autoplayHoverPause: true
    });
    owl.trigger('owl.play', 5000);
});