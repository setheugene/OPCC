<?php
/**
* Download Form
* -----------------------------------------------------------------------------
*
* Download Form component
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
<section class="download-form py-10 lg:py-12 bg-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="download-form">
  <div class="container">
    <div class="items-center row">
      <div class="w-full mb-8 col lg:w-1/2 lg:mb-0">
        <?php if( !empty($component_data['image_id']) ) : ?>
          <div class="relative aspect-square">
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
        <?php endif; ?>
      </div>
      <div class="z-10 w-full col lg:w-1/2">
        <div class="py-8 border px-gutter-full bg-brand-white border-brand-gold lg:py-12">
          <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
            <<?php echo $component_data['heading']['tag']; ?> class='mb-5 text-center js-slide hdg-3 text-brand-eggplant'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['description'] != '' ) : ?>
            <p class="mb-8 text-center text-brand-gray paragraph-default js-fade">
              <?php echo $component_data['description']; ?>
            </p>
          <?php endif; ?>
          <?php echo gravity_form( $component_data['form_id'], false, false, false, null, true ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
