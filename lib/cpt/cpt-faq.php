<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_faq_custom_post_type') ) {

  // Register Custom Post Type
  function register_faq_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_faq', 'option' );
    }
    $slug = 'faq';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'FAQs',
      'singular_name'       => 'FAQ',
      'menu_name'           => 'FAQs',
      'parent_item_colon'   => 'Parent FAQ',
      'all_items'           => 'All FAQs',
      'view_item'           => 'View FAQ',
      'add_new_item'        => 'Add New FAQ',
      'add_new'             => 'New FAQ',
      'edit_item'           => 'Edit FAQ',
      'update_item'         => 'Update FAQ',
      'search_items'        => 'Search FAQ',
      'not_found'           => 'No FAQs found',
      'not_found_in_trash'  => 'No FAQs found in Trash',
    );
    $args = array(
      'label'               => 'FAQ',
      'description'         => 'FAQ description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'editor' ), // 'editor', 'thumbnail'
      // 'taxonomies'          => array( 'category' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-format-chat',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true, // false if using taxonomy pages
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_faq', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_faq_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_faq_taxonomies') ) {

  function register_faq_taxonomies() {

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
      'rewrite'             => array( 'slug' => get_field( 'faq_category_slug', 'option' ) ?:  'faq-category' )
    );

    register_taxonomy( 'll_faq_category', array( 'll_faq' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_faq_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'page_title' => 'FAQ Settings',
    'menu_title' => 'Settings',
    'menu_slug'  => 'faq-settings',
    'parent'     => 'edit.php?post_type=ll_faq',
    'capability' => 'edit_posts'
  ));
}

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group( array(
    'key' => 'group_653907304579e',
    'title' => 'Archive : FAQs',
    'fields' => array(
      array(
        'key' => 'field_6539076c12e0c',
        'label' => 'Filtered FAQ Instructions',
        'name' => '',
        'aria-label' => '',
        'type' => 'message',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'documentation_notes' => '',
        'message' => 'This component will automatically pull in all published FAQ posts and filter them according to their Categories. To remove an FAQ from this page either set the post to \'Draft\' or delete it entirely.',
        'new_lines' => 'wpautop',
        'esc_html' => 0,
      ),
      array(
        'key' => 'field_6539073012e0b',
        'label' => 'Heading / Banner Text',
        'name' => 'archive_faqs_intro',
        'aria-label' => '',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => 'bg-brand-eggplant',
          'id' => '',
        ),
        'documentation_notes' => '',
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page',
          'operator' => '==',
          'value' => get_field( 'page_for_faq', 'option' ),
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ) );

endif;

function remove_editor_support(){
  if(get_the_ID() === get_field( 'page_for_faq', 'option' )) {
      remove_post_type_support( 'page', 'editor' );
  }
}
add_action( 'add_meta_boxes', 'remove_editor_support' );
