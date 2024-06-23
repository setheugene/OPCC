/**
* Blog Roll JS
* -----------------------------------------------------------------------------
*
* All the JS for the Blog Roll component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
( function( app ) {
  const COMPONENT = {

    className: 'single-team',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      gsap.registerPlugin( ScrollTrigger );

      const query = window.matchMedia( '(prefers-reduced-motion: reduce)' );
      let headerHeight = $( 'header' ).height();
      const leftColHeight = $( '.single-team__left-column' ).outerHeight();
      const stickyCardHeight = $( '.single-team-page .sticky-card' ).outerHeight();
      const cardEnd = leftColHeight - stickyCardHeight;
      if ( $( 'body' ).hasClass( 'logged-in' ) ) {
        headerHeight += 32;
      }
      if ( query.matches || window.innerWidth < 769 ) {
        // DO NOT FIRE ANIMATIONS
      } else {
        const st = ScrollTrigger.create( {
          trigger: '.single-team-page .sticky-card',
          pin: '.single-team-page .sticky-card',
          start: `top top+=${headerHeight}`,
          end: `+=${cardEnd}`,
          pinSpacing: false,
          scrub: 1,
          anticipatePin: true,
          // markers: true,
        } );
      }
      const cardHeight = $( '.single-team-page .sticky-card' ).height();
      const headshotHeight = $( '.single-team-page .single-team__headshot' ).height();
      if ( cardHeight > headshotHeight ) {
        $( '.single-team__headshot' ).height( cardHeight );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'single-team', COMPONENT );
} )( app );
