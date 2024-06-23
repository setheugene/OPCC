/**
* Testimonials Slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the Testimonials Slider component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
( function( app ) {
  const COMPONENT = {

    className: 'testimonials-slider',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      slickTestimonials();

      $( window ).on( 'resize', function() {
        slickTestimonials();
      } );

      function slickTestimonials() {
        $( '.testimonials-slider' ).each( function() {
          if ( $( this ).find( '.testimonial' ).length > 3 ) {
            $( this ).find( '.slider' ).slick( {
              accessability: true,
              dots: false,
              infinite: true,
              arrows: true,
              appendArrows: $( '#testimonials-slider__arrows-container' ),
              prevArrow: $( '#testimonials-slider__prev-arrow' ),
              nextArrow: $( '#testimonials-slider__next-arrow' ),
              slidesToShow: 3,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 2,
                  },
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                  },
                },
              ],
            } );
          }
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'testimonials-slider', COMPONENT );
} )( app );
