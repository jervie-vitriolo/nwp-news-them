jQuery( document ).ready(function( $ ) {
	'use strict';

    /* Post Format Gallery
    -------------------------------------------------- */
    var NEWSXGalleryPostFormat =  {
        init: function() {
            if ( !$('body').hasClass('single-format-gallery') ) {
                return;
            }

            let $swiperWrapper = $('.newsx-single-post-media .format-gallery-wrapper');
            let $thumbsWrapper = $('.newsx-single-post-media .thumbs-gallery-wrapper');

            if ( $swiperWrapper.length > 0 && $swiperWrapper.find('.swiper').length > 0  )  {
                let settings = $swiperWrapper.data('newsx-settings');

                const thumbsSwiper = new Swiper($thumbsWrapper.find('.thumbs-gallery')[0], {
                    slidesPerView: 10,
                    spaceBetween: 10,
                    loop: true,
                    breakpoints: {
                        0: {
                            slidesPerView: 5,
                        },
                        [NewsxMain.tablet_bp]: {
                            slidesPerView: 10,
                        }
                    },
                });

                const swiper = new Swiper($swiperWrapper.find('.format-gallery')[0], {
                    slidesPerView: 1,
                    loop: true,
                    thumbs: {
                        swiper: thumbsSwiper
                    },
                    speed: 1000,
                });
            }
        }
    }

    NEWSXGalleryPostFormat.init();

});

// Resize Function - Debounce
(function($,sr){

    var debounce = function (func, threshold, execAsap) {
        var timeout;
    
        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };
    
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);
    
            timeout = setTimeout(delayed, threshold || 100);
        };
    }
    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
    
    })(jQuery,'smartresize');