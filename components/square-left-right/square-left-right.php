<?php
/**
* Square Left Right
* -----------------------------------------------------------------------------
*
* Square Left Right component
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


// $Lifted_Calendar = new Lifted_Calendar();
?>

<?php
$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );


$event_date_label = '';
$event_title = '';
$event_permalink = '';

if($component_data['options'] === 'manual') {
  $event_id = $component_data['featured_event'][0];
  $get_events = new \MEC\SingleBuilder\Widgets\WidgetBase;
  $event_detail = $get_events->get_event_detail($event_id);

  $event_date_label = get_date_label($event_detail, 'F d') ?? '';
  $event_title = $event_detail->data->post->post_title ?? '';
  $event_permalink = $event_detail->data->post->guid ?? '';
}elseif($component_data['options'] === 'auto') {
  $args = [
    'posts_per_page' => 1,
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

  $events = get_posts($args);

  $event_id = $events[0]->ID;
  $get_events = new \MEC\SingleBuilder\Widgets\WidgetBase;
  $event_detail = $get_events->get_event_detail($event_id);

  $event_date_label = get_date_label($event_detail, 'F d') ?? '';
  $event_title = $event_detail->data->post->post_title ?? '';
  $event_permalink = $event_detail->data->post->guid ?? '';
}
?>


<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="square-left-right bg-brand-white relative lg:py-12 py-10 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="square-left-right">
  <div class="container">
    <div class="items-center justify-center row">
      <!-- IMAGE -->
      <div class="w-full col lg:w-1/2 order-1 mb-8 lg:mb-0 <?php echo $component_data['layout'] === 'content-image' ? 'lg:order-2' : 'lg:order-1'; ?>">
        <div class="row <?php echo $component_data['layout'] === 'content-image' ? 'justify-end' : ''; ?>">
          <div class="w-5/6 col">
            <div class="relative aspect-square">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $component_data['image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $component_data['image_focus_point'],
                    'fit' =>  $component_data['image_fit'],
                    'loading' => $component_data['image_loading']
                  )
                );
              ?>

              <?php if( $component_data['layout'] === 'content-image' && $component_data['options'] != 'none' ) : ?>
                <div class="absolute inset-0 w-full h-full opacity-25 bg-brand-black"></div>
                <div class="slr_featured-event-card js-fade">

                  <div class="mb-4 uppercase paragraph-default text-brand-gray featured-event-card__date">
                    <?php echo $event_date_label; ?>
                  </div>
                  <div class="mb-4 featured-event-card__title text-brand-black">
                    <?php echo $event_title; ?>
                  </div>
                  <a href="<?php echo $event_permalink; ?>" class="secondary-btn gold featured-event-card__more text-brand-gold">
                    Details
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- CONTENT -->
      <div class="w-full col lg:w-1/2 order-1 <?php echo $component_data['layout'] === 'content-image' ? 'lg:order-1' : 'lg:order-2'; ?>">
        <div class="row">
          <div class="w-full col lg:w-5/6">
            <div class="wysiwyg js-slide-group">
              <?php echo $component_data['content'] ?? ''; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
// $eventsQuery = \MEC\Events\EventsQuery::getInstance()->get_events([]);
// var_dump($eventsQuery);
// $main = MEC::getInstance('app.libraries.main');
?>
</section>
