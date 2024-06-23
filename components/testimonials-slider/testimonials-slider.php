<?php
/**
* Testimonials Slider
* -----------------------------------------------------------------------------
*
* Testimonials Slider component
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
  'intro'                 => null,
  'testimonials'          => [],
];

$component_data = ll_parse_args( $component_data, $defaults );

$args = array(
  'post_type'       => 'll_testimonial',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC',
  'posts_per_page'  => -1,
  'fields'          => 'ids',
);

if ( $component_data['testimonials'] ) {
  $args['post__in']       = $component_data['testimonials'];
  $args['orderby']        = 'post__in';
}

$testimonials = get_posts( $args );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="testimonials-slider bg-brand-beige lg:pt-20 lg:pb-16 py-12 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="testimonials-slider">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col">
        <div class="mb-8 row lg:mb-10 lg:items-center">
          <div class="w-full col lg:w-1/2 js-slide-group">
            <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
              <<?php echo $component_data['heading']['tag']; ?> class='mb-3 text-brand-black hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
            <?php endif; ?>
            <div class="text-brand-gray paragraph-default">
              <?php echo $component_data['description'] ?? ''; ?>
            </div>
          </div>
          <div class="w-full mt-6 col lg:w-1/2 lg:mt-0">
            <div id="testimonials-slider__arrows-container" class="relative flex w-full mb-10 lg:justify-end lg:mb-0 opcc__slider-arrows <?php echo !empty( $testimonials ) && count( $testimonials ) > 3 ? 'flex' : 'hidden'; ?>">
              <button aria-label="button to go to previous slide" role="button" id="testimonials-slider__prev-arrow" class="opcc__prev-arrow">
                <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
              </button>
              <button aria-label="button to go to next slide" role="button" id="testimonials-slider__next-arrow" class="opcc__next-arrow">
                <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
              </button>
            </div>
          </div>
        </div>
        <?php if ( !empty( $testimonials ) ) : ?>
          <div class="slider <?php echo count( $testimonials ) > 3 ? '-mx-gutter' : 'row -mb-gutter-full'; ?>">
            <?php foreach ( $testimonials as $key => $testimonial ) : ?>
              <?php $event_spaces = get_the_terms($testimonial, 'll_testimonial_event_space'); ?>
              <?php $event_types = get_the_terms($testimonial, 'll_testimonial_event_type'); ?>
              <?php $testimonial_author = get_field('testimonial_author', $testimonial) != '' ? get_field('testimonial_author', $testimonial) : get_the_title($testimonial); ?>
              <div class="<?php echo count( $testimonials ) > 3 ? 'testimonial mx-gutter' : 'col w-full lg:w-1/3 mb-gutter-full'; ?>">
                <?php if( !empty($event_spaces) || !empty($event_types) ) : ?>
                  <div class="flex flex-wrap mb-5">
                    <?php if( !empty($event_spaces) ) : ?>
                      <?php foreach( $event_spaces as $event_space ) : ?>
                        <div class="testimonial-cat-pill">
                          <?php echo $event_space->name; ?>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if( !empty($event_types) ) : ?>
                      <?php foreach( $event_types as $event_type ) : ?>
                        <div class="testimonial-cat-pill">
                          <?php echo $event_type->name; ?>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                <div class="wysiwyg paragraph-default text-brand-gray">
                  <?php echo get_field('testimonial_excerpt', $testimonial) ?? ''; ?>
                </div>
                <p class="pt-5 mt-5 font-semibold border-t text-brand-eggplant paragraph-default border-brand-light-gray">
                  <?php echo $testimonial_author; ?>
                </p>
                <?php if( !empty(get_field('testimonial_full_length', $testimonial)) ) : ?>
                  <button class="mt-4 mb-2 secondary-btn gold js-init-popup" data-modal="#testimonial-popup-<?php echo $key; ?>" data-component="modal">
                    Continue Reading
                  </button>
                  <div id="testimonial-popup-<?php echo $key; ?>" class="relative mfp-hide opcc__popup bg-brand-white">
                  <?php if( !empty($event_spaces) || !empty($event_types) ) : ?>

                    <div class="flex flex-col flex-wrap mb-5 lg:flex-row">
                      <?php if( !empty($event_spaces) ) : ?>
                        <?php foreach( $event_spaces as $event_space ) : ?>
                          <div class="mb-2 testimonial-cat-pill last:mb-0 lg:mb-0">
                            <?php echo $event_space->name; ?>
                          </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                      <?php if( !empty($event_types) ) : ?>
                        <?php foreach( $event_types as $event_type ) : ?>
                          <div class="testimonial-cat-pill">
                            <?php echo $event_type->name; ?>
                          </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <div class="wysiwyg paragraph-default text-brand-gray">
                      <?php echo get_field('testimonial_full_length', $testimonial) ?? ''; ?>
                    </div>

                    <p class="pt-5 mt-5 font-semibold border-t text-brand-eggplant paragraph-default border-brand-light-gray">
                      <?php echo $testimonial_author; ?>
                    </p>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
