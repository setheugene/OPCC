<?php
/**
* Scrolling Cards
* -----------------------------------------------------------------------------
*
* Scrolling Cards component
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
<section class="scrolling-cards relative bg-brand-white py-12 lg:py-16 activate <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="scrolling-cards">
  <div class="container">
    <div id="scrolling-cards__pin">
      <div class="absolute inset-0 w-full h-full">
        <svg width="100%" height="100%" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect class="scrolling-cards__gold-border" x="0.5" y="0.5" width="99%" height="99%" stroke="#8C6F3C"/>
        </svg>
      </div>
      <div class="js-slide-group">
        <?php if( $component_data['keyword_heading'] && $component_data['keyword_heading']['text']) : ?>
          <<?php echo $component_data['keyword_heading']['tag']; ?> class='mb-4 break-words lg:mb-10 text-brand-gray hdg-6'><?php echo $component_data['keyword_heading']['text']; ?></<?php echo $component_data['keyword_heading']['tag']; ?>>
        <?php endif; ?>
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='break-words text-brand-eggplant hdg-1'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
      </div>
    </div>
    <div id="scrolling-cards__scroll-over" class="justify-center mt-24 row lg:mt-36">
      <div class="w-full col lg:w-10/12">
        <?php if( !empty($component_data['cards']) ) : ?>
          <?php foreach( $component_data['cards'] as $key => $card ) : ?>
            <div class="scrolling-cards__card col w-11/12 lg:w-2/5 mb-14 last:mb-0 <?php echo $key % 2 ? 'ml-auto' : ''; ?>">
              <?php if( $card['image_image_id'] != '' ) : ?>
                <div class="relative overflow-hidden aspect-square">
                  <?php if ( !empty($card['link']) ) : ?>
                    <a href="<?php echo $card['link']['url']; ?>" <?php echo $card['link']['target'] ? 'target="' . $card['link']['target'] . '"' : '' ?>>
                    <?php if($card['link']['target'] === '_blank') : ?>
                      <span class="sr-only"> (opens in new tab)</span>
                    <?php endif; ?>
                  <?php endif; ?>
                  <?php
                    ll_include_component(
                      'fit-image',
                      array(
                        'image_id' => $card['image_image_id'],
                        'thumbnail_size' => 'full',
                        'position' => $card['image_image_focus_point'],
                        'fit' =>  $card['image_image_fit'],
                        'loading' => $card['image_image_loading']
                      )
                    );
                  ?>
                  <div class="absolute inset-0 flex flex-col justify-end w-full h-full p-4 lg:p-8 text-brand-white">
                    <?php if( $card['heading'] && $card['heading']['text']) : ?>
                      <<?php echo $card['heading']['tag']; ?> class='mb-5 uppercase hdg-4'><?php echo $card['heading']['text']; ?></<?php echo $card['heading']['tag']; ?>>
                    <?php endif; ?>
                    <p class="paragraph-default">
                      <?php echo $card['description'] ?? ''; ?>
                    </p>
                    <?php if( !empty($card['link']) ) : ?>
                      <div class="secondary-btn white w-fit mt-5">
                        <?php echo $card['link']['title']; ?>
                        <?php if( !empty($card['screen_reader_text']) ) : ?>
                          <span class="sr-only"> <?php echo $card['screen_reader_text']; ?></span>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <?php if ( !empty($card['link']) ) : ?>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
