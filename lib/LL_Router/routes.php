<?php
add_action('init', function() {
  $router = new LL_Router('lifted_logic');
  $routes = array(
    'component_preview' => LL_Route::default( 'component-preview', '', get_stylesheet_directory() . '/templates/component-preview.php' ),
    'filter_events' => LL_Route::get( 'LL_Ajax/LL_Events', '', [ 'LL_EventFilter', 'll_filter_events' ] ),
    'filter_faqs' => LL_Route::get( 'LL_Ajax/LL_Faqs', '', [ 'LL_FaqsFilter', 'll_filter_faqs' ] ),
  );

  LL_RouteProcessor::init( $router, $routes );
}, 0 );
