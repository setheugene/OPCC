<?php
/**
* Three Link CTA
* -----------------------------------------------------------------------------
*
* Three Link CTA component
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
<section class="three-link-cta relative lg:py-20 py-12 <?php echo $component_data['background_color'] ?? ''; ?> <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="three-link-cta">
  <div class="container relative z-10">
    <div class="justify-center row">
      <div class="w-full col xl:w-10/12">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-12 text-center js-slide hdg-2 lg:mb-16 text-brand-white'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
        <div class="justify-center row js-fade-group">
          <div class="w-full col lg:w-[30%] order-2 lg:order-1 mb-8 lg:mb-0">

            <?php if ( $component_data['left_link'] ) : ?>
              <a href="<?php echo $component_data['left_link']['url']; ?>" <?php echo $component_data['left_link']['target'] ? 'target="' . $component_data['left_link']['target'] . '"' : '' ?>>
              <?php if($component_data['left_link']['target'] === '_blank') : ?>
                <span class="sr-only"> (opens in new tab)</span>
              <?php endif; ?>
            <?php endif; ?>

            <div class="three-link-cta__side-cards">
              <?php if( $component_data['left_image_id'] != '' ) : ?>
                <div class="relative aspect-square side-card__image">
                  <?php
                    ll_include_component(
                      'fit-image',
                      array(
                        'image_id' => $component_data['left_image_id'],
                        'thumbnail_size' => 'full',
                        'position' => $component_data['left_image_focus_point'],
                        'fit' =>  $component_data['left_image_fit'],
                        'loading' => $component_data['left_image_loading']
                      )
                    );
                  ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['left_title'] != '' ) : ?>
                <div class="mb-3 text-center hdg-5 text-brand-black">
                  <?php echo $component_data['left_title']; ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['left_description'] != '' ) : ?>
                <div class="mb-5 text-center paragraph-default text-brand-gray">
                  <?php echo $component_data['left_description']; ?>
                </div>
              <?php endif; ?>
              <?php if ( $component_data['left_link'] ) : ?>
                <div class="secondary-btn gold">
                  <?php echo $component_data['left_link']['title']; ?>
                </div>
              <?php endif; ?>
            </div>
            <?php if ( $component_data['left_link'] ) : ?>
              </a>
            <?php endif; ?>
          </div>

          <div class="col w-full lg:w-[40%] order-1 lg:order-2 mb-8 lg:mb-0">
            <?php if ( $component_data['center_link'] ) : ?>
              <a href="<?php echo $component_data['center_link']['url']; ?>" <?php echo $component_data['center_link']['target'] ? 'target="' . $component_data['center_link']['target'] . '"' : '' ?>>
              <?php if($component_data['center_link']['target'] === '_blank') : ?>
                <span class="sr-only"> (opens in new tab)</span>
              <?php endif; ?>
            <?php endif; ?>
            <div class="three-link-cta__center-card">
              <?php if( $component_data['center_title'] != '' ) : ?>
                <div class="mb-5 text-center hdg-5 text-brand-black">
                  <?php echo $component_data['center_title']; ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['center_description'] != '' ) : ?>
                <div class="mb-8 text-center paragraph-default text-brand-gray">
                  <?php echo $component_data['center_description']; ?>
                </div>
              <?php endif; ?>
              <?php if ( $component_data['center_link'] ) : ?>
                <div class="primary-btn black">
                  <span class="relative z-10"><?php echo $component_data['center_link']['title']; ?></span>
                </div>
              <?php endif; ?>
            </div>
            <?php if ( $component_data['center_link'] ) : ?>
              </a>
            <?php endif; ?>
          </div>

          <div class="w-full col lg:w-[30%] order-3">
            <?php if ( $component_data['right_link'] ) : ?>
              <a href="<?php echo $component_data['right_link']['url']; ?>" <?php echo $component_data['right_link']['target'] ? 'target="' . $component_data['right_link']['target'] . '"' : '' ?>>
              <?php if($component_data['right_link']['target'] === '_blank') : ?>
                <span class="sr-only"> (opens in new tab)</span>
              <?php endif; ?>
            <?php endif; ?>
            <div class="three-link-cta__side-cards">
              <?php if( $component_data['right_image_id'] != '' ) : ?>
                <div class="relative aspect-square side-card__image">
                  <?php
                    ll_include_component(
                      'fit-image',
                      array(
                        'image_id' => $component_data['right_image_id'],
                        'thumbnail_size' => 'full',
                        'position' => $component_data['right_image_focus_point'],
                        'fit' =>  $component_data['right_image_fit'],
                        'loading' => $component_data['right_image_loading']
                      )
                    );
                  ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['right_title'] != '' ) : ?>
                <div class="mb-3 text-center hdg-5 text-brand-black">
                  <?php echo $component_data['right_title']; ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['right_description'] != '' ) : ?>
                <div class="mb-5 text-center paragraph-default text-brand-gray">
                  <?php echo $component_data['right_description']; ?>
                </div>
              <?php endif; ?>
              <?php if ( $component_data['right_link'] ) : ?>
                <div class="secondary-btn gold">
                  <?php echo $component_data['right_link']['title']; ?>
                </div>
              <?php endif; ?>
            </div>
            <?php if ( $component_data['right_link'] ) : ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
