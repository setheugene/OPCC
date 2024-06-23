<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_event_spaces_custom_post_type') ) {

  // Register Custom Post Type
  function register_event_spaces_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_event_spaces', 'option' );
    }
    $slug = 'event_spaces';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'Event Spaces',
      'singular_name'       => 'Event Spaces',
      'menu_name'           => 'Event Spaces',
      'parent_item_colon'   => 'Parent Event Spaces',
      'all_items'           => 'All Event Spaces',
      'view_item'           => 'View Event Spaces',
      'add_new_item'        => 'Add New Event Spaces',
      'add_new'             => 'New Event Spaces',
      'edit_item'           => 'Edit Event Spaces',
      'update_item'         => 'Update Event Spaces',
      'search_items'        => 'Search Event Spaces',
      'not_found'           => 'No Event Spaces found',
      'not_found_in_trash'  => 'No Event Spaces found in Trash',
    );
    $args = array(
      'label'               => 'Event Spaces',
      'description'         => 'Event Spaces description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'thumbnail' ), // 'editor', 'thumbnail'
      // 'taxonomies'          => array( 'highlight', 'post_tag' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-layout',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true, // false if using taxonomy pages
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_event_spaces', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_event_spaces_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_event_spaces_taxonomies') ) {

  function register_event_spaces_taxonomies() {

    $labels = array(
      'name'                => _x( 'Size', 'taxonomy general name' ),
      'singular_name'       => _x( 'Size', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Size' ),
      'all_items'           => __( 'All Size' ),
      'parent_item'         => __( 'Parent Size' ),
      'parent_item_colon'   => __( 'Parent Size:' ),
      'edit_item'           => __( 'Edit Size' ),
      'update_item'         => __( 'Update Size' ),
      'add_new_item'        => __( 'Add New Size' ),
      'new_item_name'       => __( 'New Size Name' ),
      'menu_name'           => __( 'Size' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'event_spaces_square_footage_slug', 'option' ) ?:  'event_spaces-square-footage' )
    );

    register_taxonomy( 'll_event_spaces_square_footage', array( 'll_event_spaces' ), $args );

    $labels = array(
      'name'                => _x( 'Capacity', 'taxonomy general name' ),
      'singular_name'       => _x( 'Capacity', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Capacities' ),
      'all_items'           => __( 'All Capacities' ),
      'parent_item'         => __( 'Parent Capacity' ),
      'parent_item_colon'   => __( 'Parent Capacity:' ),
      'edit_item'           => __( 'Edit Capacity' ),
      'update_item'         => __( 'Update Capacity' ),
      'add_new_item'        => __( 'Add New Capacity' ),
      'new_item_name'       => __( 'New Capacity Name' ),
      'menu_name'           => __( 'Capacity' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'event_spaces_capacity_slug', 'option' ) ?:  'event_spaces-capacity' )
    );

    register_taxonomy( 'll_event_spaces_capacity', array( 'll_event_spaces' ), $args );

    $labels = array(
      'name'                => _x( 'Location', 'taxonomy general name' ),
      'singular_name'       => _x( 'Location', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Locations' ),
      'all_items'           => __( 'All Locations' ),
      'parent_item'         => __( 'Parent Location' ),
      'parent_item_colon'   => __( 'Parent Location:' ),
      'edit_item'           => __( 'Edit Location' ),
      'update_item'         => __( 'Update Location' ),
      'add_new_item'        => __( 'Add New Location' ),
      'new_item_name'       => __( 'New Location Name' ),
      'menu_name'           => __( 'Location' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'event_spaces_level_slug', 'option' ) ?:  'event_spaces-level' )
    );

    register_taxonomy( 'll_event_spaces_level', array( 'll_event_spaces' ), $args );
  }

  add_action( 'init', 'register_event_spaces_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'page_title' => 'Event Spaces Settings',
    'menu_title' => 'Settings',
    'menu_slug'  => 'event_spaces-settings',
    'parent'     => 'edit.php?post_type=ll_event_spaces',
    'capability' => 'edit_posts'
  ));
}



