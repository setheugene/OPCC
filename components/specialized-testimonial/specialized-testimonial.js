/**
* Specialized Testimonial JS
* -----------------------------------------------------------------------------
*
* All the JS for the Specialized Testimonial component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'specialized-testimonial',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      slickSpecializedTestimonials();

      $( window ).on( 'resize', function() {
        slickSpecializedTestimonials();
      } );

      function slickSpecializedTestimonials() {
        $( '.specialized-testimonial' ).each( function() {
          if ( $( this ).find( '.testimonial' ).length > 1 ) {
            $( this ).find( '.specialized-testimonial__slider' ).slick( {
              accessability: true,
              dots: false,
              infinite: true,
              fade: true,
              arrows: true,
              appendArrows: $( '#specialized-testimonial__arrows-container' ),
              prevArrow: $( '#specialized-testimonial__prev-arrow' ),
              nextArrow: $( '#specialized-testimonial__next-arrow' ),
              slidesToShow: 1,
            } );
          }
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'specialized-testimonial', COMPONENT );
} )( app );
