/*
* LMS - (whc)
* @version: 1.0.0 (20 March, 2023)
* @author: Mahdi Saeidi
* @license: https://github.com/saeidi-dev
* Copyright 2023
*/

(function ($) {
    "use strict";

    /**---------------------
     preloader
     --------------------- */

    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    /**---------------------
     sticky
     --------------------- */
    $(window).on('scroll', function () {
        if ($(window).scrollTop() >= 400) {
            $('header').addClass('fixed-top animate__animated animate__slideInDown');
        } else {
            $('header').removeClass('fixed-top animate__animated animate__slideInDown');
        }
    });

    $(document).ready(function () {

        const swiper = new Swiper(".feature-slider-js", {
            slidesPerView: 4,
            spaceBetween: 15,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: false
        });

        const course = new Swiper(".courses-slider-js", {
            slidesPerView: 1.5,
            spaceBetween: 15,
            loop: true,
            navigation: {
                nextEl: ".swiper-btn-next",
                prevEl: ".swiper-btn-prev",
            },
            pagination: false,
            breakpoints: {
                640: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });


        /*const waypoint = new Waypoint({
            element: el,
            handler: function () {
                // $(this.element).counterUp();
            },
            offset: '100%'
        });*/

        /*$('.counter').counterUp({
            delay: 10,
            time: 1000
        });*/
        $('.counter').addClass('animate__animated animate__fadeIn');

        /**
         * AOS - Animate on scroll library
         */
        AOS.init();
    });


}(jQuery));
