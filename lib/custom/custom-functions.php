<?php
/**
 *
 * Lifted Logic custom functions
 *
 */

/**
 * Formats text like the default WordPress wysiwyg
 * Example use case, get_the_content() to display p tags and format shortcodes
 */
function format_text( $content ) {
  $content = apply_filters('the_content', $content);
  return $content;
}

/**
* Converts phone numbers to the formatting standard
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns the formatted phone number
*/
function format_phone( $num,$area = false,$sep='-' ) {

  $num = preg_replace( '/[^0-9]/', '', $num );
  $len = strlen( $num );

  if( $len == 7 ) {

    $num = preg_replace( '/([0-9]{3})([0-9]{4})/', '$1'.$sep.'$2', $num );
  }
  elseif( $len == 10 ) {

    if ( $area )
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2'.$sep.'$3', $num );
    else
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','$1'.$sep.'$2'.$sep.'$3', $num );
  }
  elseif( $len > 10 ) {

    if ( $area )
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})([0-9])/','($1) $2'.$sep.'$3'.' ext. $4', $num );
    else
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})([0-9])/','$1'.$sep.'$2'.$sep.'$3'.' ext. $4', $num );
  }

  return $num;
}

/**
* Strips all non-numeric characters from a string
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns number without any special characters or spaces
*/
function strip_phone($num) {
  $num = preg_replace('/[^0-9]/','',$num);
  if ( strlen( $num ) > 10 ) {
    $num = substr_replace( $num, ',', 10, 0 );
  }
  return $num;
}

/**
 * Get all social media sites from site options and outputs them with their associated icons into a unordered list
 * @param array $args
 * @param string $args['icon_classes']
 * @param string $args['link_classes']
 * @param string $args['list_item_classes']
 * @param string $args['list_classes']
 * @return string html markup of social media sites and links
 */
function ll_get_social_list($args=array()) {
  $social_media_sites = array(
    'Instagram' => get_field( 'social_instagram', 'option' ),
    'Facebook' => get_field( 'social_facebook', 'option' ),
    'LinkedIn' => get_field( 'social_linkedin', 'option' ),
    'Twitter' => get_field( 'social_twitter', 'option' ),
    'YouTube' => get_field( 'social_youtube', 'option' ),
    'Pinterest' => get_field( 'social_pinterest', 'option' ),
    'TikTok' => get_field( 'social_tiktok', 'option' ),
  );

  $social_media_sites = ll_filter_array( $social_media_sites );

  if( !isset($args['icon_classes']) ) {
    $icon_classes = 'social-list__icon';
  } else {
    $icon_classes = $args['icon_classes'];
  }

  if ( !isset($args['link_classes']) ) {
    $link_classes = 'social-list__link duration-200 ease-in-out text-brand-medium-gray hover:text-brand-white hover:underline';
  } else {
    $link_classes = $args['link_classes'];
  }

  if( !isset($args['list_item_classes'] )) {
    $list_item_classes = 'social-list__item mb-3 last:mb-0';
  } else {
    $list_item_classes = $args['list_item_classes'];
  }

  if( !isset($args['list_classes']) ) {
    $list_classes = 'social-list';
  } else {
    $list_classes = $args['list_classes'];
  }

  if ( $social_media_sites ) {
    echo '<ul class="'.$list_classes.'">';
      foreach ( $social_media_sites as $social => $link ) {
        echo '<li class="'.$list_item_classes.'">';
        echo '<a class="'.$link_classes.' '.$social.'" href="'.$link.'" target="_blank">';
        echo '<span>'.implode( " ", explode( '_', $social ) ).'</span>';
        echo '</a></li>';
      }
    echo '</ul>';
  }
}

/* ll_get_address used with ll_address_shortcode, remove or update to make more functional for dev use as well */
function ll_get_address() {
  $address = array(
    'streetAddress'   => get_field('contact_street_address', 'option'),
    'addressLocality' => get_field('contact_city', 'option'),
    'addressRegion'   => get_field('contact_state', 'option'),
    'postalCode'      => get_field('contact_zip', 'option'),
  );
  return $address;
}

function blog_pre_get_posts( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_home() ) {
    $featured_post = get_field( 'blog_featured_post', get_option('page_for_posts') );
    if ( $featured_post ) {
      $query->set( 'post__not_in', [ $featured_post ] );
    }
  }
}
add_action( 'pre_get_posts', 'blog_pre_get_posts' );

/**
 * Add wrapper to oEmbed content and add in lazy
 */
add_filter( 'oembed_dataparse', 'll_wrap_oembed_dataparse', 99, 4 );
function ll_wrap_oembed_dataparse( $return, $data, $url ) {

  // Add custom data-src to lazy load the embeds
  if($data->type == 'video') {
    $return = preg_replace('/(src="([^\"\']+)")/', 'src="" data-src-defer="$2" loading="lazy"', $return);
  }

  return '<div class="embed-responsive">' . $return . '</div>';
}

add_filter( 'wpseo_metabox_prio', 'll_move_yoast_to_bottom');
function ll_move_yoast_to_bottom() {
  return 'low';
}

add_filter('use_block_editor_for_post_type', '__return_false', 10);

/* Utilizes Yoast breadcrumbs for blog pages & makes them ADA compliant */
function modify_yoast_breadcrumb_single_link( $link_output, $link ) {
  global $post;
  // Replace the <span> tag with an <li> tag
  $separator = apply_filters( 'wpseo_breadcrumb_separator', '' );
  $link_output = str_replace( '<span', '<li class="yoast-breadcrumb__link"' , $link_output );
  $link_output = str_replace( '</span>', '</li>', $link_output );


  // remove the current page aka last breadcrumb
  if(is_single () && ('post' == get_post_type() ) && strpos( $link_output, 'breadcrumb_last' ) !== false ) {
    $link_output = '';
  }

  // Return the modified link
  return $link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'modify_yoast_breadcrumb_single_link', 10, 2 );

function modify_yoast_breadcrumb_wrapper( $output, $context ) {
  // Replace the <span> wrapper with an <ol> wrapper
  $output = str_replace( '<span', '<nav aria-label="breadcrumb" class="mb-10 yoast-breadcrumb"><ol class="flex flex-wrap list-none"', $output );
  $output = str_replace( '</span>', '</ol></nav>', $output );

  return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'modify_yoast_breadcrumb_wrapper', 10, 2 );

function modify_breadcrumb_separator($separator) {
  // Update the separator to be more ada friendly
  $separator = '<li class="mx-2 yosat-breadcrumb__separator" aria-hidden="true">' . $separator . '</li>';
  return $separator;
}
add_filter('wpseo_breadcrumb_separator', 'modify_breadcrumb_separator');

/**
 * Custom taxonomies for event cpt
 */
if ( ! function_exists('register_additional_event_taxonomies') ) {

  function register_additional_event_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Organizer', 'taxonomy general name' ),
      'singular_name'       => _x( 'Organizer', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Organizers' ),
      'all_items'           => __( 'All Organizers' ),
      'parent_item'         => __( 'Parent Organizer' ),
      'parent_item_colon'   => __( 'Parent Organizer:' ),
      'edit_item'           => __( 'Edit Organizer' ),
      'update_item'         => __( 'Update Organizer' ),
      'add_new_item'        => __( 'Add New Organizer' ),
      'new_item_name'       => __( 'New Organizer Name' ),
      'menu_name'           => __( 'Organizers' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'event_organizer_slug', 'option' ) ?:  'event-organizer' )
    );

    register_taxonomy( 'll_event_organizer', array( 'lc_event' ), $args ); // Must include custom post type name
  }
  add_action( 'init', 'register_additional_event_taxonomies', 0 );
}

function main_content_add_svg_buttons($html) {
  if ( !is_admin() && is_main_query() ) {
    return add_svg_buttons($html);
  }
}

function add_span_to_button( $html ) {
  return preg_replace('/<a ([^><]*) (data-span="true")>([^><]*)<\/a>/', '<a $1 $2><span>$3</span></a>', $html);
}
add_filter( 'acf_the_content', 'add_span_to_button', 10, 1 );
add_filter( 'the_content', 'add_span_to_button', 10, 1 );



