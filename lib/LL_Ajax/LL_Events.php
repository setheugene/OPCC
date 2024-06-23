<?php
  class LL_EventFilter { // this is the class the route calls
  public static function ll_filter_events( $request ) { // this is the function inside the class that our route calls
    $params = $request->get_params();

    $params['taxonomies']    = $params['taxonomies'] ?? null;
    $params['page']       = $params['page'] ?? 1;
    $params['search_term'] = $params['search_term'] ?? '';
    $debug = null;

    $filtered_events = ll_include_component(
      'event-results',
      [
        'taxonomies'          => $params['taxonomies'],
        'page'                => max( 1, $params['page'] ),
        'search_term' => $params['search_term'],
      ],
      [],
      true
    );

    $response = [
      'events'      => $filtered_events,
      'debug'       => $debug,
    ];

    return new WP_REST_Response( $response, 200 );
  }
}
