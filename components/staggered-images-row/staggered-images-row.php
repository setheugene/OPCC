<?php
/**
* Staggered Images Row
* -----------------------------------------------------------------------------
*
* Staggered Images Row component
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
<section class="staggered-images-row relative bg-brand-white md:pt-24 pt-10 md:pb-12 pb-10 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="staggered-images-row">
  <div class="container">
    <div class="row">
      <?php if( !empty($component_data['images']) ) : ?>
        <?php foreach( $component_data['images'] as $key => $image ) : ?>
          <div class="w-1/2 col md:w-1/4 mb-8 js-fade md:mb-0 last:mb-0 <?php echo $key === 0 || $key === 3 ? 'md:-mt-12' : ''; ?>">
            <div class="relative aspect-2/3">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $image['image_id'],
                    'thumbnail_size' => 'large',
                    'position' => $image['image_focus_point'],
                    'fit' =>  $image['image_fit'],
                    'loading' => $image['image_loading']
                  )
                );
              ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
