/**
* Gallery Slider JS
* -----------------------------------------------------------------------------
*
* All the JS for the Gallery Slider component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'gallery-slider',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( '.gallery-slider__slider' ).slick( {
        accessability: true,
        adaptiveHeight: true,
        arrows: true,
        speed: 300,
        slidesToShow: 4,
        variableWidth: true,
        infinite: false,
        appendArrows: $( '#gallery-slider__arrows-container' ),
        prevArrow: $( '#gallery-slider__prev-arrow' ),
        nextArrow: $( '#gallery-slider__next-arrow' ),
      } );
      $( '.gallery-slider__slider' ).magnificPopup( {
        delegate: '.gallery-item',
        type: 'image',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery: {
          enabled: true,
        },
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'gallery-slider', COMPONENT );
} )( app );
