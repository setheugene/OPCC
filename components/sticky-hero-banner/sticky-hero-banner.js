/**
* Sticky Hero Banner JS
* -----------------------------------------------------------------------------
*
* All the JS for the Sticky Hero Banner component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'sticky-hero-banner',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      slickEventSpaces();
      resizeComponent();

      $( window ).on( 'resize', function() {
        // slickEventSpaces();
        resizeComponent();
      } );

      function slickEventSpaces() {
        $( '.sticky-hero-banner' ).each( function() {
          if ( $( this ).find( '.sticky-hero-banner__image-slide' ).length > 1 ) {
            $( this ).find( '.sticky-hero-banner__image-slider' ).slick( {
              accessability: true,
              dots: false,
              infinite: true,
              // fade: true,
              arrows: true,
              appendArrows: $( '.sticky-hero-slider__arrows-container' ),
              prevArrow: $( '.sticky-hero-slider__prev-arrow' ),
              nextArrow: $( '.sticky-hero-slider__next-arrow' ),
              slidesToShow: 1,
            } );
          }
        } );
      }

      function resizeComponent() {
        let headerHeight = $( 'header' ).height();
        if ( $( 'body' ).hasClass( 'logged-in' ) ) {
          headerHeight += 32;
        }

        const componentsHeight = $( '#sticky-hero-banner__components' ).height();
        const stickyContentHeight = $( '#sticky-content__inner' ).height() + 128;
        const windowHeight = $( window ).height() - headerHeight;

        if ( window.innerWidth < 1024 ) {
          // DO NOT FIRE ANIMATIONS
        } else {
          // IF CONTENT IS TALLER THAN SCREEN STICK TO BOTTOM
          if ( stickyContentHeight > windowHeight ) {
            const st = ScrollTrigger.create( {
              trigger: '#sticky-hero-banner__sticky-content-wrapper',
              pin: true,
              start: `bottom bottom`,
              end: 'bottom bottom',
              endTrigger: $( '#sticky-hero-banner__components' ),
              pinSpacing: false,
              scrub: true,
              anticipatePin: true,
            } );
          } else {
            const st = ScrollTrigger.create( {
              trigger: '#sticky-hero-banner__sticky-content-wrapper',
              pin: true,
              start: `top top+=${headerHeight + 64}`,
              end: `top bottom-=${componentsHeight + 96}`,
              pinSpacing: false,
              scrub: true,
              anticipatePin: true,
            } );
          }
        }
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'sticky-hero-banner', COMPONENT );
} )( app );
