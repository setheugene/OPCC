/**
* Content Accordion JS
* -----------------------------------------------------------------------------
*
* All the JS for the Content Accordion component.
*/

/*
 * Example of importing modules if needed. Like for scroll magic / gsap
 */

// import ScrollMagic from 'ScrollMagic';
// import animationGSAP from 'animation.gsap';
// import addIndicators from 'debug.addIndicators';
// import TweenMax from 'TweenMax';
// import TimelineMax from 'TimelineMax';

( function( app ) {
  const COMPONENT = {

    className: 'content-accordion',
    selector: function() {
      return '.' + this.className;
    },
    // Fires after common.init, before .finalize and common.finalize
    init: function() {
      function filterFaqs() {
        const data = {
          'show': 'faqs',
          'faq_categories': [],
        };

        const checkedFilter = $( '#faq__categories .faq__filter' ).find( 'input:checked' );

        if ( checkedFilter ) {
          data['faq_categories'].push( checkedFilter.val() );
        }

        if ( data['faq_categories'] != 0 ) {
          data['show'] = 'faq_categories';
        }

        $.ajax( {
          type: 'GET',
          url: siteInfo.wpApiSettings.ll + 'LL_Ajax/LL_Faqs',
          data: data,
          beforeSend: function( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', siteInfo.wpApiSettings.nonce );
            xhr.setRequestHeader( 'X-Requested-With', 'XMLHttpRequest' );
            doingAjax = true;
          },
          success: function( data ) {
            $( '.archive-faq__content-accordion-wrapper' ).html( data.faqs );
            easyToggleState();
          },
          complete: function( jqXHR, status ) {
            doingAjax = false;
          },
        } );
      }
      $( document ).on( 'change', '.faq__filter input', function() {
        filterFaqs();
      } );
    },
    finalize: function() {
    },
  };

  // Hooks the component into the app
  app.registerComponent( 'content-accordion', COMPONENT );
} )( app );
