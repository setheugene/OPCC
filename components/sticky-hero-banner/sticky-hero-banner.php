<?php
/**
* Sticky Hero Banner
* -----------------------------------------------------------------------------
*
* Sticky Hero Banner component
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

$sticky_content_items = [];
if( !empty($component_data['sticky_content_items']) ) :
  foreach($component_data['sticky_content_items'] as $key => $items) :
    $sticky_content_items[$key]['icon'] = $items['svg_icon'];
    $sticky_content_items[$key]['title'] = $items['title'];
    $sticky_content_items[$key]['content'] = $items['content'];
  endforeach;
endif;

$sticky_content_slider_images = [];
if( !empty($component_data['image_slider_images']) ) :
  foreach($component_data['image_slider_images'] as $key => $images) :
    $sticky_content_slider_images[$key]['image_id'] = $images['image_id'];
    $sticky_content_slider_images[$key]['image_focus_point'] = $images['image_focus_point'];
    $sticky_content_slider_images[$key]['image_fit'] = $images['image_fit'];
    $sticky_content_slider_images[$key]['image_loading'] = $images['image_loading'];
  endforeach;
endif;

$is_slider = false;
if(count($sticky_content_slider_images) > 1) :
  $is_slider = true;
endif;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>

<section class="sticky-hero-banner bg-brand-white relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="sticky-hero-banner">

  <div class="w-full lg:w-[60.2%] h-full lg:absolute top-0 left-0 ">
    <?php if( !empty($sticky_content_slider_images) ) : ?>
      <div class="relative">
        <div class="sticky-hero-banner__image-slider">
          <?php foreach( $sticky_content_slider_images as $sticky_content_slider_image ) : ?>
            <div class="relative w-full h-full sticky-hero-banner__image-slide">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $sticky_content_slider_image['image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $sticky_content_slider_image['image_focus_point'],
                    'fit' =>  $sticky_content_slider_image['image_fit'],
                    'loading' => $sticky_content_slider_image['image_loading']
                  )
                );
              ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="absolute inset-0 z-20 flex flex-col justify-end w-full h-full px-12 py-8">
          <?php if( $component_data['image_slider_keyword_heading'] && $component_data['image_slider_keyword_heading']['text']) : ?>
            <<?php echo $component_data['image_slider_keyword_heading']['tag']; ?> class='mb-4 lg:mb-8 hdg-6 js-slide text-brand-white'><?php echo $component_data['image_slider_keyword_heading']['text']; ?></<?php echo $component_data['image_slider_keyword_heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['image_slider_heading_heading'] && $component_data['image_slider_heading_heading']['text']) : ?>
            <<?php echo $component_data['image_slider_heading_heading']['tag']; ?> class='mb-4 text-brand-white js-slide hdg-1'><?php echo $component_data['image_slider_heading_heading']['text']; ?></<?php echo $component_data['image_slider_heading_heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $is_slider ) : ?>
            <div class="relative flex w-full mb-10 sticky-hero-slider__arrows-container lg:mb-0 white opcc__slider-arrows">
              <button aria-label="button to go to previous slide" role="button" class="opcc__prev-arrow sticky-hero-slider__prev-arrow">
                <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
              </button>
              <button aria-label="button to go to next slide" role="button" class="opcc__next-arrow sticky-hero-slider__next-arrow">
                <svg class='w-6 h-6 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="relative flex flex-wrap sticky-hero-banner__top-row">
      <div id="sticky-hero-banner__components" class="w-full order-2 lg:order-1 lg:w-[60.2%] h-full lg:py-12 py-8 lg:pr-12">
        <div class="sticky-hero-banner__space-for-slider"></div>
        <?php foreach ( $component_data['content'] as $key => $row ) : ?>
          <?php if ( $row['acf_fc_layout'] == 'one_column_wysiwyg' ) : ?>
            <div class="mb-8">
              <?php if( $row['heading'] && $row['heading']['text']) : ?>
                <<?php echo $row['heading']['tag']; ?> class='mb-5 uppercase hdg-4 js-slide text-brand-black'><?php echo $row['heading']['text']; ?></<?php echo $row['heading']['tag']; ?>>
              <?php endif; ?>
              <div class="wysiwyg js-fade">
                <?php echo $row['content']; ?>
              </div>
            </div>
          <?php elseif ( $row['acf_fc_layout'] == 'two_column_list' ) : ?>
            <div class="mb-8">
              <?php if( $row['heading'] && $row['heading']['text']) : ?>
                <<?php echo $row['heading']['tag']; ?> class='mb-8 hdg-6 js-slide text-brand-gray'><?php echo $row['heading']['text']; ?></<?php echo $row['heading']['tag']; ?>>
              <?php endif; ?>
              <?php if( !empty($row['list_items']) ) : ?>
                <ul class="check-list">
                  <?php foreach( $row['list_items'] as $list_item ) : ?>
                    <li>
                      <?php echo $list_item['list_item'] ?? ''; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php elseif ( $row['acf_fc_layout'] == 'single_image' ) : ?>
            <div class="relative mb-12 aspect-16/9 lg:mb-16">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $row['image_id'],
                    'thumbnail_size' => 'large',
                    'position' => $row['image_focus_point'],
                    'fit' =>  $row['image_fit'],
                    'loading' => $row['image_loading']
                  )
                );
              ?>
            </div>
            <?php elseif ( $row['acf_fc_layout'] == 'two_images' ) : ?>
              <div class="grid grid-cols-2 lg:py-16 gap-gutter-full">
                <div class="relative aspect-3/4">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => $row['left_image_id'],
                      'thumbnail_size' => 'full',
                      'position' => $row['left_image_focus_point'],
                      'fit' =>  $row['left_image_fit'],
                      'loading' => $row['left_image_loading']
                    )
                  );
                ?>
              </div>
              <div class="relative aspect-3/4 lg:mt-8 lg:-mb-8">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => $row['right_image_id'],
                      'thumbnail_size' => 'full',
                      'position' => $row['right_image_focus_point'],
                      'fit' =>  $row['right_image_fit'],
                      'loading' => $row['right_image_loading']
                    )
                  );
                ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div  class="w-full lg:w-[39.8%] order-1 lg:order-2 relative z-20">
        <div id="sticky-hero-banner__bg-color" class="z-30 h-full p-8 bg-brand-beige lg:p-16">
          <div id="sticky-hero-banner__sticky-content-wrapper" class="pb-8">
            <div id="sticky-content__inner">
              <ul class="mb-8">
                <?php foreach( $sticky_content_items as $sticky_content_item ) : ?>
                  <li class="flex py-5 border-b border-brand-light-gray last:border-b-0 first:pt-0 last:pb-0">
                    <div class="mr-3">
                      <svg class='icon h-5 w-5 text-brand-gray icon-<?php echo $sticky_content_item['icon'] ?>'><use xlink:href='#icon-<?php echo $sticky_content_item['icon'] ?>'></use></svg>
                    </div>
                    <div class="flex flex-col mt-1">
                      <div class="mb-2 text-brand-gray paragraph-default">
                        <?php echo $sticky_content_item['title'] ?? ''; ?>
                      </div>
                      <div class="wysiwyg">
                        <?php echo $sticky_content_item['content'] ?? ''; ?>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
              <?php if ( $component_data['sticky_content_button'] ) : ?>
                <a class="primary-btn black" href="<?php echo $component_data['sticky_content_button']['url']; ?>" <?php echo $component_data['sticky_content_button']['target'] ? 'target="' . $component_data['sticky_content_button']['target'] . '"' : '' ?>>
                  <span class="relative"><?php echo $component_data['sticky_content_button']['title']; ?></span>
                  <?php if($component_data['sticky_content_button']['target'] === '_blank') : ?>
                    <span class="sr-only"> (opens in new tab)</span>
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
