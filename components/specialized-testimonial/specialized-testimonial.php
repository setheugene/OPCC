<?php
/**
* Specialized Testimonial
* -----------------------------------------------------------------------------
*
* Specialized Testimonial component
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
<section class="specialized-testimonial relative py-12 lg:py-16 bg-brand-eggplant text-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="specialized-testimonial">
  <!-- HEADING AND DESCRIPTION -->
  <div class="container z-10 lg:absolute lg:inset-0 lg:w-full lg:h-full">
    <div class="justify-center row">
      <div class="w-full col lg:w-10/12">
        <div class="py-0 lg:py-16 row">
          <div class="w-full col lg:w-1/2">
            <div class="relative mb-10 aspect-3/4 lg:mb-0">
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
            </div>
          </div>
          <div class="w-full col lg:w-1/2 js-slide-group lg:pt-[40px] flex flex-col justify-between mb-8 lg:mb-0">
            <div>
              <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
                <<?php echo $component_data['heading']['tag']; ?> class='pb-3 mb-10 border-b hdg-3 border-brand-medium-gray'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
              <?php endif; ?>
              <p class="paragraph-default">
                <?php echo $component_data['description'] ?? ''; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SLIDER -->
  <div class="container relative z-20">
    <div class="justify-center row">
      <div class="relative w-full col lg:w-10/12">
        <?php if ( !empty( $testimonials ) ) : ?>
          <div class="specialized-testimonial__slider">
            <?php foreach ( $testimonials as $key => $testimonial ) : ?>
              <?php $testimonial_author = get_field('testimonial_author', $testimonial) != '' ? get_field('testimonial_author', $testimonial) : get_the_title($testimonial); ?>
              <div class="relative <?php echo count( $testimonials ) > 1 ? 'testimonial' : ''; ?>">
                <div class="w-full lg:pr-4 lg:w-1/2">
                  <div class="relative hidden aspect-3/4 lg:block">

                    <div class="hidden p-6 lg:p-8 bg-brand-plum lg:block specialized-testimonial__quote lg:absolute">
                      <div class="wysiwyg hdg-5">
                        <?php echo get_field('testimonial_excerpt', $testimonial) ?? ''; ?>
                      </div>
                      <p class="mt-5 font-semibold hdg-6 specialized-testimonial__author-name">
                        <?php echo get_field('testimonial_author', $testimonial) != '' ? get_field('testimonial_author', $testimonial) : get_the_title( $testimonial ); ?>
                      </p>
                      <?php if( !empty(get_field('testimonial_full_length', $testimonial)) ) : ?>
                        <button class="mt-4 mb-2 secondary-btn gold js-init-popup" data-modal="#specialized-testimonial-popup-<?php echo $key; ?>" data-component="modal">
                          Continue Reading
                        </button>
                        <div id="specialized-testimonial-popup-<?php echo $key; ?>" class="relative mfp-hide opcc__popup bg-brand-white">
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
                            <?php echo get_field('testimonial_full_length', $testimonial) ?? ''; ?>
                          </div>

                          <p class="pt-5 mt-5 font-semibold border-t text-brand-eggplant paragraph-default border-brand-light-gray">
                            <?php echo $testimonial_author; ?>
                          </p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="block p-6 lg:p-8 bg-brand-plum lg:hidden specialized-testimonial__quote lg:absolute">
                    <div class="wysiwyg hdg-5">
                      <?php echo get_field('testimonial_excerpt', $testimonial) ?? ''; ?>
                    </div>
                    <p class="mt-5 font-semibold hdg-6 specialized-testimonial__author-name">
                      <?php echo get_field('testimonial_author', $testimonial) != '' ? get_field('testimonial_author', $testimonial) : get_the_title( $testimonial ); ?>
                    </p>
                    <?php if( !empty(get_field('testimonial_full_length', $testimonial)) ) : ?>
                      <button class="mt-4 mb-2 secondary-btn gold js-init-popup" data-modal="#specialized-testimonial-popup-<?php echo $key; ?>" data-component="modal">
                        Continue Reading
                      </button>
                      <div id="specialized-testimonial-popup-<?php echo $key; ?>" class="relative mfp-hide opcc__popup bg-brand-white">
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
                          <?php echo get_field('testimonial_full_length', $testimonial) ?? ''; ?>
                        </div>
                        <p class="pt-5 mt-5 font-semibold border-t text-brand-eggplant paragraph-default border-brand-light-gray">
                        <?php echo $testimonial_author; ?>
                        </p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- SLIDER ARROWS -->
          <div id="specialized-testimonial__arrows-container" class="flex lg:w-1/2 lg:ml-auto mt-8 lg:absolute justify-center lg:justify-start lg:mt-0 lg:mb-0 opcc__slider-arrows white <?php echo !empty( $testimonials ) && count( $testimonials ) > 1 ? 'flex' : 'hidden'; ?>">
            <button aria-label="button to go to previous slide" role="button" id="specialized-testimonial__prev-arrow" class="opcc__prev-arrow">
              <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
            </button>
            <button aria-label="button to go to next slide" role="button" id="specialized-testimonial__next-arrow" class="opcc__next-arrow">
              <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
            </button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
