<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_testimonial_custom_post_type') ) {

  // Register Custom Post Type
  function register_testimonial_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_testimonial', 'option' );
    }
    $slug = 'testimonial';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'Testimonials',
      'singular_name'       => 'Testimonial',
      'menu_name'           => 'Testimonials',
      'parent_item_colon'   => 'Parent Testimonial',
      'all_items'           => 'All Testimonials',
      'view_item'           => 'View Testimonial',
      'add_new_item'        => 'Add New Testimonial',
      'add_new'             => 'New Testimonial',
      'edit_item'           => 'Edit Testimonial',
      'update_item'         => 'Update Testimonial',
      'search_items'        => 'Search Testimonial',
      'not_found'           => 'No Testimonials found',
      'not_found_in_trash'  => 'No Testimonials found in Trash',
    );
    $args = array(
      'label'               => 'Testimonial',
      'description'         => 'Testimonial description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'thumbnail' ), // 'editor', 'thumbnail'
      // 'taxonomies'          => array( 'category' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-format-quote',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true, // false if using taxonomy pages
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_testimonial', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_testimonial_custom_post_type', 0 );
}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_testimonial_taxonomies') ) {

  function register_testimonial_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Event Space', 'taxonomy general name' ),
      'singular_name'       => _x( 'Event Space', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Event Spaces' ),
      'all_items'           => __( 'All Event Spaces' ),
      'parent_item'         => __( 'Parent Event Space' ),
      'parent_item_colon'   => __( 'Parent Event Space:' ),
      'edit_item'           => __( 'Edit Event Space' ),
      'update_item'         => __( 'Update Event Space' ),
      'add_new_item'        => __( 'Add New Event Space' ),
      'new_item_name'       => __( 'New Event Space Name' ),
      'menu_name'           => __( 'Event Spaces' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'testimonial_event_space_slug', 'option' ) ?:  'testimonial-event-space' )
    );

    register_taxonomy( 'll_testimonial_event_space', array( 'll_testimonial' ), $args ); // Must include custom post type name


    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Event Type', 'taxonomy general name' ),
      'singular_name'       => _x( 'Event Type', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Event Types' ),
      'all_items'           => __( 'All Event Types' ),
      'parent_item'         => __( 'Parent Event Type' ),
      'parent_item_colon'   => __( 'Parent Event Type:' ),
      'edit_item'           => __( 'Edit Event Type' ),
      'update_item'         => __( 'Update Event Type' ),
      'add_new_item'        => __( 'Add New Event Type' ),
      'new_item_name'       => __( 'New Event Type Name' ),
      'menu_name'           => __( 'Event Types' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'testimonial_event_type_slug', 'option' ) ?:  'testimonial-event-type' )
    );

    register_taxonomy( 'll_testimonial_event_type', array( 'll_testimonial' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_testimonial_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

// if ( function_exists( 'acf_add_options_sub_page' ) ){
//   acf_add_options_sub_page(array(
//     'page_title' => 'Testimonial Settings',
//     'menu_title' => 'Settings',
//     'menu_slug'  => 'testimonial-settings',
//     'parent'     => 'edit.php?post_type=ll_testimonial',
//     'capability' => 'edit_posts'
//   ));
// }



