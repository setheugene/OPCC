/**
* Menu JS
* -----------------------------------------------------------------------------
*
* All the JS for the Menu component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'menu',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      $( '.menu__section' ).each( function() {
        const componentsHeight = $( this ).find( '.menu-section-container' ).height();
        let headerHeight = $( 'header' ).height();
        if ( $( 'body' ).hasClass( 'logged-in' ) ) {
          headerHeight += 32;
        }
        if ( window.innerWidth < 1024 ) {
          // DO NOT FIRE ANIMATIONS
        } else {
          const st = ScrollTrigger.create( {
            trigger: $( this ).find( '.menu-section__image' ),
            pin: true,
            start: `top top+=${headerHeight}`,
            end: `top bottom-=${componentsHeight + 64}`,
            pinSpacing: false,
            scrub: true,
            anticipatePin: true,
            // markers: true,
          } );
          const sta = ScrollTrigger.create( {
            trigger: $( this ).find( '.menu__sticky-jump-links' ),
            pin: true,
            start: `top top+=${headerHeight + 80}`,
            end: `top bottom-=${componentsHeight + 64}`,
            pinSpacing: false,
            scrub: true,
            anticipatePin: true,
            // markers: true,
          } );
        }
      } );
      $( '.menu__jump-link-dropdown-trigger > button' ).on( 'toggleBefore', function( event ) {
        const target = $( this ).data( 'toggle-target' );
        $( target ).fadeToggle();
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'menu', COMPONENT );
} )( app );
