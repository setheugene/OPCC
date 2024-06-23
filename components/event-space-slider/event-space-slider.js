/**
* Event Space Slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the Event Space Slider component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'event-space-slider',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      slickEventSpaces();

      $( window ).on( 'resize', function() {
        slickEventSpaces();
      } );

      function slickEventSpaces() {
        $( '.event-space-slider' ).each( function() {
          if ( $( this ).find( '.event-space-slider__slide' ).length > 1 ) {
            $( this ).find( '.event-space-slider__slider' ).slick( {
              accessability: true,
              dots: false,
              infinite: true,
              fade: true,
              arrows: true,
              appendArrows: $( '.event-space-slider__arrows-container' ),
              prevArrow: $( '.event-space-slider__prev-arrow' ),
              nextArrow: $( '.event-space-slider__next-arrow' ),
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
  app.registerComponent( 'event-space-slider', COMPONENT );
} )( app );
