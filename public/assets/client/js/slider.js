window.addEventListener("DOMContentLoaded", (event) => {
    var swiperCateSlider = new Swiper(".cate__slide-container", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".mc_next",
            prevEl: ".mc_prev",
        },
        pagination: {
            el: ".mc_pagi",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    var swiperPoliSlider = new Swiper(".productInfoSwiper", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: true,
        breakpoints: {
            0: {
                slidesPerView: 1.2,
            },
            480: {
                slidesPerView: 1.5,
            },
            768: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 3.2,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    var swiperProductSaleSlider = new Swiper(".flash__slide-container", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".mf_next",
            prevEl: ".mf_prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                slidesPerColumnFill: "row",
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 5,
            },
        },
    });

    var swiperProduct3Slider = new Swiper(".product-container", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".mf_next",
            prevEl: ".mf_prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                slidesPerColumnFill: "row",
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    var swiperVideoSlider = new Swiper(".video-container", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".mv_next",
            prevEl: ".mv_prev",
        },
        breakpoints: {
            375: {
                slidesPerView: 1.2,
            },
            768: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    var swiperBlogSlider = new Swiper(".blog__cook-container", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".ml_next",
            prevEl: ".ml_prev",
        },
        breakpoints: {
            375: {
                slidesPerView: 1.2,
            },
            768: {
                slidesPerView: 2.3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });
    var swiperBlogSlider = new Swiper(".blog__cook-container-tab", {
        spaceBetween: 15,
        loop: false,
        speed: 1000,
        autoplay: false,
        navigation: {
            nextEl: ".ml_next",
            prevEl: ".ml_prev",
        },
        breakpoints: {
            375: {
                slidesPerView: 1.2,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            },
        },
    });

    var swiperBannerC = new Swiper('.banner_collection', {
        spaceBetween: 10,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: '.mbc_next',
            prevEl: '.mbc_prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2
            },
            576: {
                slidesPerView: 1.5
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 2
            },
            1200: {
                slidesPerView: 2
            }
        }
    });
});