<?php
/**
* Two Image Left Right
* -----------------------------------------------------------------------------
*
* Two Image Left Right component
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
<section class="two-image-left-right py-20 lg:py-28 bg-brand-white relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="two-image-left-right">
  <div class="absolute inset-0 pointer-events-none two-image-left-right__border-wrapper">
    <div class="container w-full h-full">
      <div class="h-full row <?php echo $component_data['layout'] === 'content-image' ? '' : 'justify-end'; ?>">
        <div class="h-full py-12 two-image-left-right__border-width col lg:py-16">
          <div class="w-full h-full border border-brand-gold"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="items-center px-0 row lg:px-0 sm:px-gutter-full">
      <!-- CONTENT -->
      <div class="col w-full lg:w-1/2 order-1 mb-10 lg:mb-0 <?php echo $component_data['layout'] === 'content-image' ? 'lg:order-1' : 'lg:order-2'; ?>">
        <div class="row <?php echo $component_data['layout'] === 'content-image' ? 'lg:justify-end' : ''; ?>">
          <div class="w-full col lg:w-5/6">
            <div class="wysiwyg js-slide-group">
              <?php echo $component_data['content'] ?? ''; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- IMAGES -->
      <div class="order-2 w-full col lg:w-1/2 <?php echo $component_data['layout'] === 'content-image' ? 'lg:order-2' : 'lg:order-1'; ?>">
        <div class="row justify-end <?php echo $component_data['layout'] === 'content-image' ? 'lg:justify-end' : 'lg:justify-start'; ?>">
          <div class="w-3/4 lg:w-2/3 col">
            <div class="relative aspect-2/3 two-image-left-right__large-image">
              <?php if( $component_data['large_image_id'] != '' ) : ?>
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => $component_data['large_image_id'],
                      'thumbnail_size' => 'full',
                      'position' => $component_data['large_image_focus_point'],
                      'fit' =>  $component_data['large_image_fit'],
                      'loading' => $component_data['large_image_loading']
                    )
                  );
                ?>
              <?php endif; ?>
              <div class="two-image-left-right__small-image <?php echo $component_data['layout'] ?? ''; ?>">
                <div class="relative aspect-square">
                  <?php if( $component_data['small_image_id'] != '' ) : ?>
                    <?php
                      ll_include_component(
                        'fit-image',
                        array(
                          'image_id' => $component_data['small_image_id'],
                          'thumbnail_size' => 'full',
                          'position' => $component_data['small_image_focus_point'],
                          'fit' =>  $component_data['small_image_fit'],
                          'loading' => $component_data['small_image_loading']
                        )
                      );
                    ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
