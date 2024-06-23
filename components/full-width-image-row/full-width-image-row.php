<?php
/**
* Full Width Image Row
* -----------------------------------------------------------------------------
*
* Full Width Image Row component
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
<section class="full-width-image-row relative py-10 lg:py-12 bg-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="full-width-image-row">
  <?php if( !empty($component_data['images']) ) : ?>
    <div class="row">
      <?php foreach( $component_data['images'] as $key => $image ) : ?>
        <div class="w-1/3 mb-8 col js-fade md:mb-0 last:mb-0">
          <div class="relative aspect-4/3">
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
    </div>
  <?php endif; ?>
</section>
