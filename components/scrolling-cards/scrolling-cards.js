/**
* Scrolling Cards JS
* -----------------------------------------------------------------------------
*
* All the JS for the Scrolling Cards component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {DrawSVGPlugin} from 'gsap/DrawSVGPlugin';
gsap.registerPlugin( DrawSVGPlugin, ScrollTrigger );

( function( app ) {
  const COMPONENT = {

    className: 'scrolling-cards',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      gsap.fromTo( '.scrolling-cards__gold-border', {duration: 2, drawSVG: 0}, {
        drawSVG: '100%',
        ease: 'ease-in-out',
        duration: 2,
        scrollTrigger: {
          trigger: '.scrolling-cards__gold-border',
          pin: false,
          start: 'top center',
          end: 'max',
          // markers: true,
        },
      } );

      let topOffset = $( 'header' ).height() + 64;
      if ( $( 'body.logged-in' ).length > 0 ) {
        topOffset += 32;
      }
      const cardsHeight = $( ' #scrolling-cards__scroll-over ' ).height();
      if ( $( '#scrolling-cards__pin' ).length > 0 ) {
        $( 'section.scrolling-cards' ).each( function() {
          const pin = gsap.timeline( {
            scrollTrigger: {
              trigger: $( this ).find( '#scrolling-cards__pin' ),
              pin: $( this ).find( '#scrolling-cards__pin' ),
              start: 'top top+='+ topOffset +'px',
              end: `top top-=${cardsHeight}px`,
              scrub: true,
              // markers: true,
              id: 'content-pin',
              pinSpacing: false,
              anticipatePin: true,
            },
          } );
          pin.to( $( this ).find( '#scrolling-cards__pin' ), {opacity: 0.25} );
        } );
        $( '.scrolling-cards__card' ).each( function() {
          const cards = gsap.timeline( {
            scrollTrigger: {
              trigger: $( this ),
              pin: false,
              start: 'top bottom',
              end: 'top center+=80px',
              scrub: true,
              // markers: true,
            },
          } );
          cards.from( $( this ), {opacity: 0.5} );
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'scrolling-cards', COMPONENT );
} )( app );
