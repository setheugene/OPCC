/**
* Three Column Images JS
* -----------------------------------------------------------------------------
*
* All the JS for the Three Column Images component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'three-column-images',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'three-column-images', COMPONENT );
} )( app );
