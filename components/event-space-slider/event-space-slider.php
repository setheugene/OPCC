<?php
/**
* Event Space Slider
* -----------------------------------------------------------------------------
*
* Event Space Slider component
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
];

$component_data = ll_parse_args( $component_data, $defaults );

$event_slides = [];
foreach( $component_data['slides'] as $key => $slide ) :
  $event_slides[$key]['title'] = $slide['heading'] ?? '';
  $event_slides[$key]['permalink'] = get_the_permalink($slide['linked_event_space']) ?? '';
  $event_slides[$key]['description'] = $slide['description'] ?? '';
  $event_slides[$key]['image_id'] = $slide['image_id'] ?? '';
  $event_slides[$key]['footage'] = get_the_terms($slide['linked_event_space'], 'll_event_spaces_square_footage') ?? '';
  $event_slides[$key]['capacity'] = get_the_terms($slide['linked_event_space'], 'll_event_spaces_capacity') ?? '';
  $event_slides[$key]['level'] = get_the_terms($slide['linked_event_space'], 'll_event_spaces_level') ?? '';
endforeach;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="event-space-slider bg-brand-white py-12 lg:py-20 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="event-space-slider">
  <?php if( !empty($event_slides) ) : ?>
    <div class="event-space-slider__slider">
      <?php $slide_count = count($event_slides); ?>
      <?php foreach( $event_slides as $key => $event_slide ) : ?>
        <?php $next_key = $key + 1; ?>
        <?php if( $key+1 === $slide_count ) : $next_key = 0; endif; ?>
        <div class="event-space-slider__slide">
          <div class="relative flex flex-col items-start lg:flex-row">
            <div class="relative aspect-3/4 w-full lg:w-[420px] flex-shrink-0">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $event_slide['image_id'],
                    'thumbnail_size' => 'large',
                  )
                );
              ?>
            </div>
            <div class="flex flex-col flex-shrink-0 w-full lg:w-[569px] lg:ml-[132px] lg:mt-16 mt-8">
              <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
                <<?php echo $component_data['heading']['tag']; ?> class='mb-5 text-brand-gray hdg-6'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
              <?php endif; ?>

              <h3 class="hdg-2 text-brand-black">
                <?php echo $event_slide['title']; ?>
              </h3>

              <ul class="flex flex-wrap gap-[10px]">
                <?php if( !empty($event_slide['footage']) ) :?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_slide['footage'][0]->name; ?>
                  </li>
                <?php endif; ?>
                <?php if( !empty($event_slide['capacity']) ) :?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_slide['capacity'][0]->name; ?>
                  </li>
                <?php endif; ?>
                <?php if( !empty($event_slide['level']) ) :?>
                  <li class="event-space__highlight-pill w-fit">
                    <?php echo $event_slide['level'][0]->name; ?>
                  </li>
                <?php endif; ?>
              </ul>

              <?php if( !empty($event_slide['description']) ) : ?>
                <p class="mt-8 text-brand-gray paragraph-default w-full lg:w-[469px]">
                  <?php echo $event_slide['description']; ?>
                </p>
              <?php endif; ?>
              <div class="flex gap-8 mt-8 lg:absolute lg:gap-10 lg:bottom-16 lg:mt-0">
                <a href="<?php echo $event_slide['permalink']; ?>" class="flex-grow-0 flex-shrink-0 h-fit primary-btn black">
                  <span class="relative">View details</span>
                  <span class="sr-only"> about <?php echo $event_slide['title']; ?></span>
                </a>

                <div class="relative flex w-full mb-10 event-space-slider__arrows-container lg:justify-end lg:mb-0 opcc__slider-arrows">
                  <button aria-label="button to go to previous slide" role="button" class="opcc__prev-arrow event-space-slider__prev-arrow">
                    <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                  </button>
                  <button aria-label="button to go to next slide" role="button" class="opcc__next-arrow event-space-slider__next-arrow">
                    <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                  </button>
                </div>

              </div>
            </div>
            <div class="absolute sm:-right-[320px] xxl:-right-[170px] w-full lg:w-[420px] flex-shrink-0 hidden lg:block">
              <div class="relative aspect-3/4 grayscale">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => $event_slides[$next_key]['image_id'],
                      'thumbnail_size' => 'large',
                    )
                  );
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>
