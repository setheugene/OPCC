/**
* Hero Banner with Jump Links JS
* -----------------------------------------------------------------------------
*
* All the JS for the Hero Banner with Jump Links component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'hero-banner-with-jump-links',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      const query = window.matchMedia( '(prefers-reduced-motion: reduce)' );
      let headerHeight = $( 'header' ).height();
      if ( $( 'body' ).hasClass( 'logged-in' ) ) {
        headerHeight += 32;
      }
      if ( query.matches || window.innerWidth < 769 ) {
        // DO NOT FIRE ANIMATIONS
      } else {
        const st = ScrollTrigger.create( {
          trigger: '.hero-banner-with-jump-links + section',
          pin: true,
          start: `top 50%`,
          end: `top top`,
          pinSpacing: true,
          scrub: 1,
          anticipatePin: true,
          // markers: true,
        } );
      }
      $( '.hero-banner__jump-link:first-of-type' ).on( 'click', function() {
        const yPosition = $( window ).scrollTop();
        $( window ).scrollTop( yPosition+450 );
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'hero-banner-with-jump-links', COMPONENT );
} )( app );
