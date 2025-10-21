jQuery(document).ready(function($){
/* reviews */
    var $reviews_slider = $('.reviews_list');

    $reviews_slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: $('.reviews-pagination .arrow-prev'),
        nextArrow: $('.reviews-pagination .arrow-next'),
        speed: 1000,
        cssEase: 'ease-in-out'
    });

    function updateArrows_reviews() {
        var slickObj = $reviews_slider.slick('getSlick');
        var currentSlide = slickObj.currentSlide;
        var totalSlides = slickObj.slideCount;
        var slidesToShow = slickObj.options.slidesToShow;

        if (currentSlide === 0) {
            $('.reviews-pagination .arrow-prev').addClass('slick-disabled');
        } else {
            $('.reviews-pagination .arrow-prev').removeClass('slick-disabled');
        }

        if (currentSlide >= totalSlides - slidesToShow) {
            $('.reviews-pagination .arrow-next').addClass('slick-disabled');
        } else {
            $('.reviews-pagination .arrow-next').removeClass('slick-disabled');
        }
    }

    updateArrows_reviews();

    $reviews_slider.on('afterChange', function() {
        updateArrows_reviews();
    });
/* end */

/* resources */
    var $resources_slider = $('.resources_list');
    if (!$resources_slider.hasClass('slick-initialized')) {
        $resources_slider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            arrows: true,
            prevArrow: $('.resources-pagination .arrow-prev'),
            nextArrow: $('.resources-pagination .arrow-next'),
            speed: 1000,
            cssEase: 'ease-in-out',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }

    function updateArrows_resources() {
        var slickObj = $resources_slider.slick('getSlick');
        var currentSlide = slickObj.currentSlide;
        var totalSlides = slickObj.slideCount;
        var slidesToShow = slickObj.options.slidesToShow;

        if (currentSlide === 0) {
            $('.resources-pagination .arrow-prev').addClass('slick-disabled');
        } else {
            $('.resources-pagination .arrow-prev').removeClass('slick-disabled');
        }

        if (currentSlide >= totalSlides - slidesToShow) {
            $('.resources-pagination .arrow-next').addClass('slick-disabled');
        } else {
            $('.resources-pagination .arrow-next').removeClass('slick-disabled');
        }
    }

    updateArrows_resources();

    $resources_slider.on('afterChange', function() {
        updateArrows_resources();
    });
/* end */








});














































// jQuery(document).ready(function($){

//     var $slider = $('.resources_itemss');
//     if (!$slider.hasClass('slick-initialized')) {
//         $slider.slick({ 
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             infinite: false,
//             arrows: true,
//             prevArrow: $('.arrow-prev'),
//             nextArrow: $('.arrow-next'),
//             speed: 1000,
//             cssEase: 'ease-in-out',
//             responsive: [
//                 {
//                     breakpoint: 1024,
//                     settings: {
//                         slidesToShow: 2,
//                         slidesToScroll: 2,
//                     }
//                 },
//                 {
//                     breakpoint: 768,
//                     settings: {
//                         slidesToShow: 1,
//                         slidesToScroll: 1,
//                     }
//                 }
//             ]
//         });
//     }
// });
