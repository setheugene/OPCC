<?php
/**
* Upcoming Events
* -----------------------------------------------------------------------------
*
* Upcoming Events component
*/

/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes = ( isset( $component_args['classes'] ) ? $component_args['classes'] : array() );

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$component_id   = ( isset( $component_args['id'] ) ? $component_args['id'] : false );
?>

<?php
$defaults = [
  'link' => null,
  'skip' => false,
];

$component_data = ll_parse_args( $component_data, $defaults );


if( !empty($component_data['events']) ) {
  $args = [
    'post__in' => $component_data['events'],
    'post_type' => 'mec-events',
    'orderby' => 'mec_start_date',
    'order' => 'ASC',
    'meta_query' => array(
      'relation' => 'OR',
      array(
          'key'     => 'mec_start_date',
          'value'   => date('Ymd'),
          'compare' => '>=',
          'type' => 'DATE'
      ),
  ),];
} else {
  $args = [
    'posts_per_page' => 3,
    'post_type' => 'mec-events',
    'orderby' => 'mec_start_date',
    'order' => 'ASC',
    'meta_query' => array(
      'relation' => 'OR',
      array(
          'key'     => 'mec_start_date',
          'value'   => date('Ymd'),
          'compare' => '>=',
          'type' => 'DATE'
      ),
  ),];
  $skip_first_event = $component_data['skip'];
  if($skip_first_event) {
    $args['offset'] = 1;
  }
}




// $events = \MEC\Events\EventsQuery::getInstance()->get_events($args);
$events = get_posts($args);

$get_events = new \MEC\SingleBuilder\Widgets\WidgetBase;
$link = $component_data['link'] ?? null;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="upcoming-events bg-brand-white relative py-12 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="upcoming-events">
  <div class="container">
    <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
      <<?php echo $component_data['heading']['tag']; ?> class='mb-8 hdg-6 text-brand-gray js-slide'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
    <?php endif; ?>
    <?php if( !empty($events) ) : ?>
      <div class="grid grid-cols-1 event-results-grid md:grid-cols-2 gap-gutter-full lg:grid-cols-3">
        <?php foreach ( $events as $key => $event ) : ?>
          <?php
            $event_id = $event->ID ?? '';
            $event_permalink = $event->guid ?? '';
            $post_title = $event->post_title ?? '';

            $event_detail = $get_events->get_event_detail($event->ID);
            $event_date_label = get_date_label($event_detail, 'F d') ?? '';
            $is_all_day = $event_detail->data->meta['mec_allday'];
            $event_start_date = $event_detail->date['start']['date'];
            $date_object = date_create($event_start_date);
            $start_month = date_format($date_object, 'M');
            $start_day = date_format($date_object, 'd');
          ?>
          <div class="relative duration-200 lc-grid__event-item-wrapper">
            <div class="duration-200 lc-grid__event-item">
              <div class="lc-grid__event-item__main">
                <div class="relative aspect-16/9">
                  <div class="lc-grid__event-item__image">
                    <?php
                      ll_include_component(
                        'fit-image',
                        array(
                          'image_id' => get_post_thumbnail_id($event->ID),
                          'thumbnail_size' => 'full',
                          'position' => '',
                          'fit' =>  '',
                          'loading' => ''
                        )
                      );
                    ?>
                    <div class="absolute inset-0 flex items-center w-full h-full px-8">
                      <div class="flex flex-col items-center lc-grid__event-item__date text-brand-white">
                        <div class="mb-2 hdg-6">
                          <?php echo $start_month; ?>
                        </div>
                        <div class="lc-grid__event-day">
                          <?php echo $start_day; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="lc-grid__event-item__content">
                  <h2 class="mb-3 font-semibold hdg-5 text-brand-black"><?php echo $post_title; ?></h2>
                  <ul class="lc-grid__event-item__info lc-dark-text">
                    <li class="lc-grid__event-item__time">
                      <?php if ( $is_all_day ) : ?>
                        <svg class="icon icon-lc-clock"><use xlink:href="#icon-lc-clock"></use></svg>All Day
                      <?php else : ?>
                        <svg class="icon icon-lc-clock"><use xlink:href="#icon-lc-clock"></use></svg><?php echo $event_date_label; ?>
                      <?php endif; ?>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="lc-grid__event-item__link-wrapper">
                <div class="lc-grid__event-item__link secondary-btn gold">View Details</div>
              </div>
            </div>
            <a href="<?php echo $event_permalink; ?>" class="absolute inset-0 w-full h-full"><span class="sr-only">Learn more about <?php echo $post_title; ?></span></a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <div class="flex justify-center mt-8">
      <?php if ( $link != null ) : ?>
        <a class="inline-block primary-btn black" href="<?php echo $link['url']; ?>" <?php echo $link['target'] ? 'target="' . $link['target'] . '"' : '' ?> title="link to event calendar">
          <span><?php echo $link['title']; ?></span>
          <?php if($link['target'] === '_blank') : ?>
            <span class="sr-only"> (opens in new tab)</span>
          <?php endif; ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>
