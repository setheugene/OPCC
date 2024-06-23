<?php


add_action( 'mec_grid_classic_image', 'll_custom_mec_event_card_image_date' );
function ll_custom_mec_event_card_image_date( $event ) {
  $date_object = date_create($event->date['start']['date']);
  $start_month = date_format($date_object, 'M');
  $start_day = date_format($date_object, 'd');
  $href = $event->data->post->guid;
  echo '<a class="absolute inset-0 w-full h-full mec_event_card_hover" href="'.$href.'"></a><span class="flex flex-col items-center event-grid__card-date">' . '<span class="mb-2 hdg-6">' . $start_month . '</span><span class="event-grid__event-day">' . $start_day . '</span></span>';
}

add_action( 'mec_before_main_content', 'll_custom_mec_add_banner_to_archive' );
function ll_custom_mec_add_banner_to_archive() {
  if(is_archive()){
    $content = '<p class="hdg-2" style="text-align: center;">Event Calendar</p><p style="text-align: center;">Only public events are listed on this calendar.</p>';
    echo '<div class="py-12 lg:py-16 bg-brand-eggplant events-archive__hero-banner">
    <div class="container relative z-10">
      <div class="justify-center row">
        <div class="w-full col lg:w-8/12">
          <div class="wysiwyg">';
          echo $content;
          echo '</div>
          </div>
        </div>
      </div>
    </div>';
  }
}

function get_date_label( $event, string $format = 'F d' ): string
{
  $start_datetime = $event->date['start'];
  $end_datetime = $event->date['end'];
  return \MEC\Base::get_main()->date_label( $start_datetime, $end_datetime, $format );
}

add_action( 'mec_top_single_event', 'll_custom_mec_add_single_event_image_banner' );
function ll_custom_mec_add_single_event_image_banner( $event_id ) {
  echo get_the_post_thumbnail( $event_id, 'full' );
}

add_action( 'mec_single_after_content', 'll_custom_mec_add_custom_wysiwyg_to_single_event' );
function ll_custom_mec_add_custom_wysiwyg_to_single_event( $event ) {
  echo '<div class="wysiwyg elementor-widget-container">' . format_text(get_the_content( null, null, $event->ID )) . '</div>';
}

/**
 * Simulates Lifted Logic fit-image component
 */

 function lc_fit_image($image_id, $alt = null, $thumbnail_size = 'large', $fit = 'object-cover', $position = 'object-center') {
  $classes[] = $fit;
  $classes[] = $position;
  $image_args = [];
  $image_args['class'] = $fit . ' ' .$position;
  if ($alt) {
    $image_args['alt'] = $alt;
  }
  return '
  <div class="lc-fit-image ' . implode( " ", $classes ) .'">' .
    wp_get_attachment_image(
      $image_id,
      $thumbnail_size,
      false,
      $image_args
    ) . '
  </div>
  ';
}
add_action( 'init', 'remove_custom_post_comment' );

function remove_custom_post_comment() {
  remove_post_type_support( 'mec-events', 'comments' );
}
