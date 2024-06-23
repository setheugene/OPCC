<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_floor_plans_custom_post_type') ) {

  // Register Custom Post Type
  function register_floor_plans_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_floor_plans', 'option' );
    }
    $slug = 'floor_plans';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'Floor Plans',
      'singular_name'       => 'Floor Plans',
      'menu_name'           => 'Floor Plans',
      'parent_item_colon'   => 'Parent Floor Plans',
      'all_items'           => 'All Floor Plans',
      'view_item'           => 'View Floor Plans',
      'add_new_item'        => 'Add New Floor Plans',
      'add_new'             => 'New Floor Plans',
      'edit_item'           => 'Edit Floor Plans',
      'update_item'         => 'Update Floor Plans',
      'search_items'        => 'Search Floor Plans',
      'not_found'           => 'No Floor Plans found',
      'not_found_in_trash'  => 'No Floor Plans found in Trash',
    );
    $args = array(
      'label'               => 'Floor Plans',
      'description'         => 'Floor Plans description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'thumbnail' ), // 'editor', 'thumbnail'
      // 'taxonomies'          => array( 'category', 'post_tag' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-grid-view',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true, // false if using taxonomy pages
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_floor_plans', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_floor_plans_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_floor_plans_taxonomies') ) {

  function register_floor_plans_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Category', 'taxonomy general name' ),
      'singular_name'       => _x( 'Category', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Categories' ),
      'all_items'           => __( 'All Categories' ),
      'parent_item'         => __( 'Parent Category' ),
      'parent_item_colon'   => __( 'Parent Category:' ),
      'edit_item'           => __( 'Edit Category' ),
      'update_item'         => __( 'Update Category' ),
      'add_new_item'        => __( 'Add New Category' ),
      'new_item_name'       => __( 'New Category Name' ),
      'menu_name'           => __( 'Categories' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'floor_plans_category_slug', 'option' ) ?:  'floor_plans-category' )
    );

    register_taxonomy( 'll_floor_plans_category', array( 'll_floor_plans' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_floor_plans_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

// if ( function_exists( 'acf_add_options_sub_page' ) ){
//   acf_add_options_sub_page(array(
//     'page_title' => 'Floor Plans Settings',
//     'menu_title' => 'Settings',
//     'menu_slug'  => 'floor_plans-settings',
//     'parent'     => 'edit.php?post_type=ll_floor_plans',
//     'capability' => 'edit_posts'
//   ));
// }



