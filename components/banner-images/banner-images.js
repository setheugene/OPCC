/**
* Banner Images JS
* -----------------------------------------------------------------------------
*
* All the JS for the Banner Images component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'banner-images',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      function revealTopDown( elements ) {
        gsap.to( elements,
            {
              clipPath: 'inset(0% 0% 0% 0%)',
              duration: 1.5,
              ease: '0, 0, 0.58, 1.0',
              stagger: 0.2,
            },
        );
      }

      const query = window.matchMedia( '(prefers-reduced-motion: reduce)' );
      let headerHeight = $( 'header' ).height();
      if ( $( 'body' ).hasClass( 'logged-in' ) ) {
        headerHeight += 32;
      }
      if ( query.matches || window.innerWidth < 769 ) {
        // DO NOT FIRE ANIMATIONS
      } else {
        // const sectionHeight = $( '.banner-images' ).height();
        // const imageCount = $( '.banner-images__image' ).length;
        // const totalHeight = sectionHeight * imageCount;
        // $( '.banner-images' ).height( totalHeight );
        // $( '.banner-images' ).each( function( i ) {
        //   const st = ScrollTrigger.create( {
        //     trigger: '.banner-images',
        //     pin: true,
        //     start: `top top+=${headerHeight}`,
        //     end: `top top-=${totalHeight}`,
        //     // scrub: true,
        //     // markers: true,
        //     id: 'pin',
        //     pinSpacing: false,
        //     anticipatePin: true,
        //   } );
        // } );
        $( '.banner-images__image' ).each( function( i ) {
          const st = ScrollTrigger.create( {
            trigger: $( this ),
            pin: true,
            start: `top top+=${headerHeight}`,
            end: `bottom top+=${headerHeight}`,
            pinSpacing: false,
            scrub: 1,
            anticipatePin: true,
          } );
          // if ( i != 0 ) {
          //   const tl = gsap.timeline( {
          //     scrollTrigger: {
          //       trigger: $( this ),
          //       pin: false,
          //       // pinSpacing: false,
          //       // anticipatePin: true,
          //       start: `top top+=${headerHeight - ( sectionHeight * i )}`,
          //       end: `top top+=${headerHeight - ( sectionHeight * i )}`,
          //       scrub: true,
          //       markers: true,
          //       id: `slide-${i}`,
          //     },
          //   } );
          //   tl.from( $( this ), {clipPath: 'inset(100% 0 0 0)'}, revealTopDown );
          // }
        } );
      }
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'banner-images', COMPONENT );
} )( app );
