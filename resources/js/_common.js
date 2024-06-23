/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
import {DrawSVGPlugin} from 'gsap/DrawSVGPlugin';
gsap.registerPlugin( DrawSVGPlugin, ScrollTrigger );
( function( app ) {
  const COMPONENT = {
    init: function() {
      $( '.nav-link.logo-link' ).on( 'mouseover', function() {
        gsap.from( '.logo-border', {duration: 1, drawSVG: 0} );
      } );

      $( 'footer form input[type=radio]' ).on( 'change', function() {
        $( this ).closest( 'form' ).trigger( 'submit' );
      } );

      if ( $( '.page-template-template-event-archive' ).length ) {
        $( '.mec-dropdown-search > label' ).text( 'Filter By' );
      }

      const url = new URL( location );

      // if ( !url.searchParams.get( 'event' ) ) {
      //   $( '.gform_page:first-of-type' ).css( 'opacity', '1' );
      // }

      $( '.gform_page:first-of-type input' ).on( 'change', function() {
        const param = $( this ).val();

        url.searchParams.set( 'event', param );
        history.pushState( {}, '', url );
      } );

      $( document ).on( 'gform_page_loaded', function() {
        const url = new URL( location );
        const shortcodeSection = $( '.gform_page:nth-of-type(2) h3.gsection_title' );
        let param = url.searchParams.get( 'event' );
        if ( param === 'Other' || param === 'other' || param == 'i\'m not sure' || param == 'I\'m Not Sure' ) {
          param = 'event';
        }
        if ( param && shortcodeSection.length > 0 ) {
          const eventShortcode = shortcodeSection.text();
          const eventName = eventShortcode.replace( '[event-type]', param );
          shortcodeSection.html( eventName );
        }
        const currentPageClasses = $( '.llgq-current-page' ).attr( 'class' );
        const currentPageClassesArray = currentPageClasses.split( ' ' );
        let currentProgress = '';

        $( '.llgq-progress' ).each( function() {
          $( this ).removeClass( 'active' );
        } );
        if ( currentPageClassesArray.length > 0 ) {
          $.each( currentPageClassesArray, function( index, value ) {
            if ( value.indexOf( 'llgq-progress-' ) >= 0 ) {
              currentProgress = value;
            }
          } );
          $( `#${currentProgress}` ).addClass( 'active' );
        }

        if ( $( '.gform_page:nth-of-type(2).llgq-current-page' ).length > 0 ) {
          setTimeout( () => {
            $( '.gform_page:nth-of-type(2).llgq-current-page .gform_next_button, .llgq-current-page .gform_button[type="submit"]' ).trigger( 'click' );
          }, '5000' );
        }
      } );

      $( document ).on( 'gform_confirmation_loaded', function() {
        $( '.llgq-progress' ).each( function() {
          $( this ).removeClass( 'active' );
        } );
      } );

      const searchParams = new URLSearchParams( window.location.search );
      // IF USER GETS TO EVENT PLANNING TOOL FORM BY WAY OF FOOTER, SELECT ANSWER AND SKIP FIRST QUESTION
      if ( searchParams.has( 'event' ) ) {
        const eventParam = searchParams.get( 'event' );
        $( `input[value="${eventParam}"]` ).trigger( 'click' );
        setTimeout( () => {
          $( '.llgq-current-page .gform_next_button, .llgq-current-page .gform_button[type="submit"]' ).trigger( 'click' );
        }, '500' );
      }

      $( 'button.primary-nav-trigger' ).on( 'toggleBefore', function( event ) {
        const target = $( this ).data( 'toggle-target' );
        $( target ).fadeToggle();
      } );

      $( 'button#event-filter-dropdown-toggle, button.mobile-jumplink-menu-trigger' ).on( 'toggleBefore', function( event ) {
        const target = $( this ).data( 'toggle-target' );
        $( target ).slideToggle();
      } );

      $( '.js-init-video' ).magnificPopup( {
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        callbacks: {
          open: function() {
            $( 'video' ).trigger( 'pause' );
          },
          close: function() {
            $( 'video' ).trigger( 'play' );
          },
        },
      } );


      function handleMobileChange( event ) {
        /*
         * Remove any inline display values when the screen changes
         * between mobile and desktop state. This allows the default
         * stylings to kick in and prevent any weird "half mobile half desktop"
         * nav display states that sometimes occur while resizing the browser
         * Also remove any active is-open classes from the toggle and nav to reset
         * its state when switching between screen sizes
         */
        if ( event.matches ) {
          if ( $( '.primary-nav' ).length > 0 ) {
            $( '.primary-nav' ).get( 0 ).style.removeProperty( 'display' );

            $( '.navbar-toggle, .primary-nav' ).removeClass( 'is-open' );
          }
        }
      }
      if ( $( '.mec-skin-grid-events-container' ).length > 0 ) {
        $( '.mec-skin-grid-events-container .mec-booking-button' ).each( function() {
          $( this ).text( 'VIEW DETAILS' );
        } );
      }

      /* Run the handleMobileChange function when the screen sizes changes based on the mobileSize const */
      const mobileSize = window.matchMedia( '(min-width: 768px)' );
      const tabletSize = window.matchMedia( '(min-width: 1024px)' );
      handleMobileChange( mobileSize );
      mobileSize.addEventListener( 'change', handleMobileChange );
      tabletSize.addEventListener( 'change', handleMobileChange );

      if ( tabletSize.matches ) {
        $( '.primary__child-menu-first' ).trigger( 'click' );
        $( '.secondary__child-menu-first' ).trigger( 'click' );
        $( '.resources__child-menu-first' ).trigger( 'click' );
      }

      /* Allow selects to have placeholder styles */
      checkSelectPlaceholder();
      $( '.gfield_select' ).on( 'change', function() {
        checkSelectPlaceholder();
      } );
      function checkSelectPlaceholder() {
        if ( $( '.gfield_select' ).find( 'option:selected' ).hasClass( 'gf_placeholder' ) ) {
          $( '.gfield_select' ).addClass( 'placeholder-selected' );
        } else {
          $( '.gfield_select' ).removeClass( 'placeholder-selected' );
        }
      }

      /* Lazyload all embeds */
      if ( 'IntersectionObserver' in window ) {
        const options = {
          root: null, // avoiding 'root' or setting it to 'null' sets it to default value: viewport
          rootMargin: '0px 0px 100px', // determines how far form the root the intersection callback will trigger
        };
        const embedObserver = new IntersectionObserver( function( entries, observer ) {
          entries.forEach( function( embed ) {
            if ( embed.isIntersecting ) {
              $( embed.target ).attr( 'src', $( embed.target ).attr( 'data-src-defer' ) );
              // remove observer
              embedObserver.unobserve( embed.target );
            }
          } );
        }, options );

        // add the observer to the elements
        $( '[data-src-defer]' ).each( function( index, element ) {
          embedObserver.observe( element );
        } );
      }

      /* Set up arias for blog sidebar toggles */
      toggleBlogSidebarAriaVisibility();

      $( window ).on( 'resize', function() {
        toggleBlogSidebarAriaVisibility();
      } );

      function toggleBlogSidebarAriaVisibility() {
        if ( window.innerWidth > 1024 ) {
          $( '.blog__sidebar-inner' ).attr( 'aria-hidden', false );
        } else if ( window.innerWidth <= 1024 && !$( '.blog__sidebar-inner' ).hasClass( 'is-open' ) ) {
          $( '.blog__sidebar-inner' ).attr( 'aria-hidden', true );
        }
      }
    },
    finalize: function() {
    },
  };

  app.registerComponent( 'common', COMPONENT );
} )( app );
