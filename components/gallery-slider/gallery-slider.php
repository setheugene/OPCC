<?php
/**
* Gallery Slider
* -----------------------------------------------------------------------------
*
* Gallery Slider component
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
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="gallery-slider overflow-hidden bg-brand-white pt-12 pb-10 lg:pt-20 lg:pb-12 relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="gallery-slider">
  <div class="container">
    <div class="items-center justify-between mb-8 row">
      <div class="w-full col lg:w-5/12">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='js-slide hdg-2 text-brand-black'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
      </div>
      <div id="gallery-slider__arrows-container" class="relative flex w-full mb-10 lg:justify-end lg:mb-0 opcc__slider-arrows col lg:w-7/12">
        <button aria-label="button to go to previous slide" role="button" id="gallery-slider__prev-arrow" class="opcc__prev-arrow">
          <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
        </button>
        <button aria-label="button to go to next slide" role="button" id="gallery-slider__next-arrow" class="opcc__next-arrow">
          <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
        </button>
      </div>
    </div>
    <?php if( !empty($component_data['images']) ) : ?>
      <div class="gallery-slider__slider">
        <?php foreach( $component_data['images'] as $image ) : ?>
          <a class="gallery-item" href="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>">
            <?php echo wp_get_attachment_image( $image, 'large' ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
