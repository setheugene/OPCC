<?php
  class LL_FaqsFilter { // this is the class the route calls
  public static function ll_filter_faqs( $request ) { // this is the function inside the class that our route calls
    $params = $request->get_params();

    $params['show']    = $params['show'] ?? null;
    $params['faq_categories']    = $params['faq_categories'] ?? null;
    $debug = null;

    $filtered_faqs =   ll_include_component(
      'content-accordion',
      [
        'accordion_only'  => true,
        'intro'       => null,
        'show'        => $params['show'],
        'items'       => [],
        'faqs'        => [],
        'faq_categories'  => $params['faq_categories'],
        'icon_type'     => 'plus-cross',
      ],
      [],
      true
    );

    $response = [
      'faqs'      => $filtered_faqs,
      'debug'       => $debug,
    ];

    return new WP_REST_Response( $response, 200 );
  }
}
