/**
* Hero Banner JS
* -----------------------------------------------------------------------------
*
* All the JS for the Hero Banner component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );

( function( app ) {
  const COMPONENT = {

    className: 'hero-banner',
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
          trigger: '.hero-banner',
          pin: true,
          start: `top top+=${headerHeight}`,
          end: `bottom top+=${headerHeight}`,
          pinSpacing: false,
          scrub: 1,
          anticipatePin: true,
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'hero-banner', COMPONENT );
} )( app );
