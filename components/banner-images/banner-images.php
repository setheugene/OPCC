<?php
/**
* Banner Images
* -----------------------------------------------------------------------------
*
* Banner Images component
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
<section class="banner-images relative bg-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="banner-images">
  <?php if( !empty($component_data['images']) ) : ?>
    <div class="banner-images__images">
      <?php foreach( $component_data['images'] as $image ) : ?>
        <div class="relative inset-0 w-full h-full -mt-4 aspect-16/9 banner-images__image">
          <?php
            ll_include_component(
              'fit-image',
              array(
                'image_id' => $image['image_id'],
                'thumbnail_size' => 'full',
                'position' => $image['image_focus_point'],
                'fit' =>  $image['image_fit'],
                'loading' => $image['image_loading']
              )
            );
          ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</section>
