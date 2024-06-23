import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {SplitText} from 'gsap/SplitText';
gsap.registerPlugin( SplitText, ScrollTrigger );
( function( app ) {
  const COMPONENT = {
    init: function() {
      const _this = this;
    },
    finalize: function() {
    },
    animate: function() {
      if ( !window.matchMedia( '(prefers-reduced-motion)' ).matches ) {
        // global animations in animate will load in after running common.js init function, all component javascript, and before common.js finalize function.
        // This should improve animations loading in and fix odd start times due to load order
        /*
        * Fade on scroll
        */
        $( '.js-fade:not(.js-ignore), .js-fade-group > *:not(.js-ignore)' ).each( function() {
          ScrollTrigger.create( {
            trigger: this,
            start: 'top 90%',
            scrub: 0.15,
            onRefresh: ( self ) => {
              if ( self.progress > 0 ) {
                $( this ).addClass( 'js-animated' );
              }
            },
            onEnter: ( {progress, direction, isActive} ) => $( this ).addClass( 'js-animated' ),
          } );
        } );

        /*
        * Reveal on scroll
        */
        $( '.js-reveal:not(.js-ignore)' ).each( function() {
          gsap.to( this, {
            scrollTrigger: {
              trigger: this,
              start: 'top 90%',
              scrub: false,
            },
            clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', duration: 1.5, ease: 'power4.inOut',
          } );
        } );

        new SplitText( '.js-slide-group > [class*="hdg-"], [class*="hdg-"].js-slide', {type: 'lines', linesClass: 'line-wrap', tag: 'span'} );
        new SplitText( '.line-wrap', {type: 'lines', linesClass: 'line', tag: 'span'} );

        /*
        * Reveal Up on scroll
        */

        document.querySelectorAll( 'section' ).forEach( ( el ) => {
          const section = gsap.utils.selector( el );
          const sectArray = section( '.js-slide:not(.js-ignore, [class*=hdg-]), .js-slide-group > *:not(.js-ignore, [class*=hdg-]), .line, .js-fade, .js-slide-group-slow > *:not(.js-ignore, [class*=hdg-])' );

          const items = sectArray;
          if ( items.length > 0 ) {
            el.style.setProperty( '--item-total', items.length );
            sectArray.map( ( line, index ) => line.style.setProperty( '--item-index', index ) );
          }
        } );

        /*
        * Fade on scroll
        */
        $( '.js-slide:not(.js-ignore), .js-slide-group > *:not(.js-ignore), .js-fade:not(.js-ignore), .js-fade-group > *:not(.js-ignore), .js-fade-group-slow > *:not(.js-ignore)' ).each( function() {
          ScrollTrigger.create( {
            trigger: this,
            start: 'top 90%',
            scrub: 0.15,
            onRefresh: ( self ) => {
              if ( self.progress > 0 ) {
                $( this ).addClass( 'js-animated' );
              }
            },
            onEnter: ( {progress, direction, isActive} ) => $( this ).addClass( 'js-animated' ),
          } );
        } );

        let headerHeight = $( 'header' ).height();
        if ( $( 'body' ).hasClass( 'logged-in' ) ) {
          headerHeight += 32;
        }

        $( '.fit-image:not(.no-zoom) img' ).each( function() {
          const tl = gsap.timeline( {
            scrollTrigger: {
              trigger: this,
              start: `top bottom`,
              end: `bottom top+=${headerHeight}`,
              pin: false,
              scrub: 1,
              // markers: true,
            },
          } );
          tl.fromTo( $( this ), {scale: 1}, {scale: 1.05} );
        } );
      }
    },
  };
  app.registerComponent( 'animations', COMPONENT );
} )( app );
