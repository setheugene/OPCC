<?php
/**
* Event Space Archive
* -----------------------------------------------------------------------------
*
* Event Space Archive component
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

$args = [
  'post_type' => 'll_event_spaces',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'tax_query'         => [
    'relation'    => 'AND',
  ]
];

if ( !empty( $component_data['event_spaces'] ) ) {
  $args['post__in'] = $component_data['event_spaces'];
  $args['orderby'] = 'post_in';
}

$event_spaces = get_posts( $args );

$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="event-space-archive bg-brand-white py-12 md:pb-24 md:pt-16 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="event-space-archive">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full text-center col md:w-1/2 js-slide-group">
        <?php if( $component_data['keyphrase_heading'] && $component_data['keyphrase_heading']['text']) : ?>
          <<?php echo $component_data['keyphrase_heading']['tag']; ?> class='mb-2 md:mb-5 hdg-6 text-brand-gray'><?php echo $component_data['keyphrase_heading']['text']; ?></<?php echo $component_data['keyphrase_heading']['tag']; ?>>
        <?php endif; ?>
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-6 md:mb-12 text-brand-black hdg-2'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
      </div>
      <div class="w-full col xl:w-10/12">
        <?php if( !empty($event_spaces) ) : ?>
          <?php foreach( $event_spaces as $event_space ) : ?>
            <?php $event_footage = get_the_terms($event_space, 'll_event_spaces_square_footage'); ?>
            <?php $event_capacity = get_the_terms($event_space, 'll_event_spaces_capacity'); ?>
            <?php $event_level = get_the_terms($event_space, 'll_event_spaces_level'); ?>

            <a href="<?php echo get_the_permalink($event_space->ID); ?>" class="flex flex-col w-full py-5 border-b md:items-center js-fade md:flex-row event-space-archive__event-space first:border-t border-brand-light-gray">
              <div class="relative md:mr-10 lg:mr-16 aspect-3/2 w-full md:w-[200px] mx-auto md:mx-[unset] mb-6 md:mb-0">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => get_post_thumbnail_id($event_space->ID),
                      'thumbnail_size' => 'medium',
                      'position' => '',
                      'fit' =>  '',
                      'loading' => ''
                    )
                  );
                ?>
              </div>
              <div class="mb-5 mr-0 md:mr-10 md:mb-0">
                <h3 class="mb-2 md:mb-4 text-brand-black hdg-5">
                  <?php echo $event_space->post_title; ?>
                </h3>
                <div class="secondary-btn gold">
                  Learn More
                  <span class="sr-only"> about <?php echo $event_space->post_title; ?> event space.</span>
                </div>
              </div>
              <ul class="justify-start md:justify-end md:ml-auto flex flex-wrap gap-[10px]">
                <?php if( !empty($event_footage) ) : ?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_footage[0]->name; ?>
                  </li>
                <?php endif; ?>
                <?php if( !empty($event_capacity) ) : ?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_capacity[0]->name; ?>
                  </li>
                <?php endif; ?>
                <?php if( !empty($event_level) ) : ?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_level[0]->name; ?>
                  </li>
                <?php endif; ?>
              </ul>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
