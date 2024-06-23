<?php
/**
* Event Results
* -----------------------------------------------------------------------------
*
* Event Results component
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
  'taxonomies'   => [],
  'page'      => 1,
  'max_pages' => 1,
  'ppp'       => 12,
];
$component_data = ll_parse_args( $component_data, $defaults );

$args = [
  'archive_shortcode' => 'grid',
  'tax_query'         => [
    'relation'    => 'AND',
  ]
];

if ( !empty( $component_data['events'] ) ) {
  $args['post__in'] = $component_data['events'];
}

$args['s'] = $component_data['search_term'] ?? '';

foreach ( $component_data['taxonomies'] as $taxonomy => $terms ) {
  $args['tax_query'][] = [
    'taxonomy' => $taxonomy,
    'field'    => 'term_id',
    'terms'    => $terms,
    'operator' => 'IN'
  ];
}

$Lifted_Calendar = new Lifted_Calendar();
$events = $Lifted_Calendar->get_events( $args );
$component_data['max_pages'] = ceil(count($events) / $component_data['ppp']);

// manual paged/offset
$events = array_slice($events, ( ( $component_data['page'] - 1 ) * $component_data['ppp'] ));

// manual posts per page
$events = array_slice($events, 0, $component_data['ppp']);
?>

<section class="event-results overflow-visible <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="event-results" aria-live="polite">
  <div class="grid grid-cols-1 event-results-grid md:grid-cols-2 gap-gutter-full lg:grid-cols-3">
    <?php if ( !empty( $events ) ) : ?>
      <?php foreach ( $events as $key => $event ) : ?>
        <?php include( lifted_calendar_locate_template( 'partials/grid-item.php') ); ?>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="w-full mb-8 col">
        <p>There were no events found with these filters.</p>
      </div>
    <?php endif; ?>
  </div>

  <?php
    $the_page = $component_data['page']; // the current page, please make sure this is an integer
    $mid_size = 3; // mid_size similar to paginate_links() mid_size
    $max_pages = $component_data['max_pages']; // max number of pages
  ?>

  <?php if ( $max_pages > 1 ) : ?>
    <nav class="flex items-center justify-center mt-16 text-xl pagination">
      <?php	if ($the_page > 1) : ?>
        <button class="mx-3.5 prev page-numbers text-2xl" data-value="<?php echo $the_page - 1;?>">
          <!-- Prev -->
          ←
        </button>
      <?php else : ?>
        <span class="mx-3.5 prev page-numbers text-2xl opacity-50">
          <!-- Prev -->
          ←
        </span>
      <?php endif; ?>

      <?php for ($i=1; $i <= $mid_size; $i++) :?>
        <?php if ( $i < $the_page ) : ?>
          <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $i;?>">
            <?php echo $i;?>
          </button>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ( $the_page > $mid_size ) : ?>
        <?php if ( ($the_page - $mid_size) > ($mid_size + 1 )) : ?>
          <span class="mx-3.5 page-numbers dots">…</span>
        <?php endif; ?>

        <?php for ($i=$mid_size; $i >= 1; $i--) :?>
          <?php if($the_page > $mid_size && ($the_page - $i > $mid_size)) : ?>
            <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $the_page - $i;?>">
              <?php echo $the_page - $i;?>
            </button>
          <?php	endif; ?>
        <?php endfor; ?>
      <?php endif; ?>

      <?php if ($max_pages > 1 ) : ?>
          <span class="mx-3.5 page-numbers current underline" aria-current="page">
            <?php echo $the_page;?>
          </span>
      <?php endif; ?>

      <?php if ( $the_page < $max_pages ) : ?>
        <?php for ($i=1; $i <= $mid_size; $i++) :?>
          <?php if( ($the_page + $mid_size ) <= $max_pages && ($the_page + $i <= ($max_pages - $mid_size) )) : ?>
            <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $the_page + $i;?>">
              <?php echo $the_page + $i;?>
            </button>
          <?php	endif; ?>
        <?php endfor; ?>

        <?php if ( ($the_page + $mid_size) < ($max_pages - $mid_size )) : ?>
          <span class="mx-3.5 page-numbers dots">…</span>
        <?php endif; ?>
      <?php endif; ?>

      <?php for ($i=($mid_size-1); $i >= 0; $i--) :?>
        <?php if ( ($max_pages - $i) > $the_page ) : ?>
          <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $max_pages - $i;?>">
            <?php echo $max_pages - $i;?>
          </button>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($the_page < $max_pages) : ?>
        <button class="mx-3.5 next page-numbers text-2xl" data-value="<?php echo $the_page + 1;?>">
          <!-- Next -->
          →
        </button>
      <?php else : ?>
        <span class="mx-3.5 next page-numbers text-2xl opacity-50">
          <!-- Next -->
          →
        </span>
      <?php	endif; ?>
    </nav>
  <?php endif; ?>
</section>
