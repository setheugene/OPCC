/**
* Filtered Events JS
* -----------------------------------------------------------------------------
*
* All the JS for the Filtered Events component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import {gsap} from 'gsap';
// import {ScrollTrigger} from 'gsap/ScrollTrigger.js';
// gsap.registerPlugin( ScrollTrigger );
( function( app ) {
  const COMPONENT = {

    className: 'filtered-events',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      function filterEvents( page ) {
        const searchTerm = $( '.event-filters form.search-form input.search-field' ).val();
        $( 'form.search-form' ).on( 'submit', function( event ) {
          event.preventDefault();
        } );
        const data = {
          'page': page ? page : 1,
          'taxonomies': {},
          'search_term': searchTerm,
        };

        $( '.event-filters' ).each( function() {
          const terms = [];

          $( this ).find( 'input:checked' ).each( function() {
            terms.push( $( this ).val() );
          } );

          data['taxonomies'][$( this ).attr( 'data-taxonomy' )] = terms;
        } );

        $.ajax( {
          type: 'GET',
          url: siteInfo.wpApiSettings.ll + 'LL_Ajax/LL_Events', // note that cpt/filter is the path set in our new route in routes.php
          data: data,
          beforeSend: function( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', siteInfo.wpApiSettings.nonce );
            xhr.setRequestHeader( 'X-Requested-With', 'XMLHttpRequest' );
            doingAjax = true;
          },
          success: function( data ) {
            $( '.events-area' ).html( data.events );
          },
          complete: function( jqXHR, status ) {
            doingAjax = false;
          },
        } );
      }

      // If the filters change, reset to page 1 and filter the events
      $( document ).on( 'change', '.event-filters input', function() {
        filterEvents( 1 );
      } );

      // If the pagination changes, filter the events with the new page
      $( document ).on( 'click', '.pagination button', function() {
        filterEvents( $( this ).attr( 'data-value' ) );
      } );

      // Unchecked all the filters and refilter it with no filters
      $( document ).on( 'click', '.clear-filters', function() {
        $( '.event-filters input' ).prop( 'checked', false );
        $( 'form.search-form.events' )[0].reset();
        filterEvents( 1 );
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'filtered-events', COMPONENT );
} )( app );
