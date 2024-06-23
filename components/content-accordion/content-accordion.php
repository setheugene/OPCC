<?php
/**
* Content Accordion
* -----------------------------------------------------------------------------
*
* Content Accordion component
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
$component_id   = ( isset( $component_args['id'] ) && $component_args['id'] != '' ? $component_args['id'] : 'content-accordion' );
?>

<?php
$defaults = [
  'intro'       => null,
  'show'        => null,
  'items'       => [],
  'faqs'        => [],
  'faq_categories'  => [],
  'icon_type'     => 'chevron',
  'second_image_id' => null,
];

$component_data = ll_parse_args( $component_data, $defaults );

$args = array(
  'post_type'       => 'll_faq',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC',
  'posts_per_page'  => -1,
);

$items = [];
$faqs = [];

if ( $component_data['show'] == 'faqs' ) {
    if ( isset($component_data['faqs']) && !empty($component_data['faqs']) ) {
    $args['post__in'] = $component_data['faqs'];
    $args['orderby'] = 'post__in';
  }
  $faqs = get_posts( $args );

} elseif ( $component_data['show'] == 'faq_categories' ) {
  $args['tax_query'] = [
    [
      'taxonomy'    => 'll_faq_category',
      'field'       => 'term_id',
      'terms'       => $component_data['faq_categories'],
      'operator'    => 'IN'
    ]
  ];
  $faqs = get_posts( $args );
} else {
  $items = $component_data['items'];
}

if ( count($faqs) > 0 ) {
  foreach ( $faqs as $key => $faq ) {
    $items[$key]['title'] = get_the_title( $faq->ID );
    $items[$key]['content'] = get_the_content( '', '', $faq->ID );
  }
}

$add_microdata = isset( $component_data['add_microdata'] ) ? $component_data['add_microdata'] : false;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="content-accordion py-16 lg:py-20 bg-brand-white text-brand-black <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="content-accordion" <?php echo $add_microdata ? 'itemscope itemtype="https://schema.org/FAQPage"' : ''; ?>>
  <div class="container">
    <div class="w-full mx-auto lg:w-10/12 xl:w-8/12">
      <?php if( !isset($component_data['accordion_only']) ) : ?>
        <div class="justify-center row">
          <div class="w-full col lg:w-3/4">
            <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
              <<?php echo $component_data['heading']['tag']; ?> class='mb-12 text-center hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="w-full mx-auto content-accordion__items">
        <?php if ( !empty( $items ) ) : ?>
          <?php foreach ( $items as $key => $item ) : ?>
            <article class="mb-[22px] content-accordion__item last:mb-0" <?php echo $add_microdata ? 'itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"' : ''; ?>>
              <div class="content-accordion__item-content">
                <button
                  type="button"
                  id="<?php echo $component_id . '-' . $key;?>-button"
                  class="mb-0 text-base sm:text-lg w-full flex flex-wrap font-semibold justify-between items-center content-accordion__item-title is-icon-<?php echo $component_data['icon_type']; ?>"
                  data-toggle-class="is-open"
                  data-toggle-group="<?php echo 'accordion-' . $component_id; ?>"
                  data-toggle-target="#<?php echo $component_id . '-' . $key;?>-content"
                  aria-controls="<?php echo $component_id . '-' . $key;?>-content"
                  data-toggle-escape
                  data-toggle-arrows
                  aria-expanded="false">

                  <h3 class="mb-0 text-left item-title" <?php echo $add_microdata ? 'itemprop="name"' : ''; ?>><?php echo $item['title']; ?></h3>

                  <span class="block ml-4">
                    <?php if ( $component_data['icon_type'] == 'chevron' ) : ?>
                      <svg class="-mt-5 -mb-5 text-lg icon icon-chevron-down sm:text-2xl"><use xlink:href="#icon-chevron-down"></use></svg>
                    <?php elseif ( $component_data['icon_type'] == 'plus-minus' ) : ?>
                      <svg class="icon icon-plus"><use xlink:href="#icon-plus"></use></svg>
                      <svg class="icon icon-minus"><use xlink:href="#icon-minus"></use></svg>
                    <?php elseif ( $component_data['icon_type'] == 'plus-cross' ) : ?>
                      <svg class="icon icon-plus"><use xlink:href="#icon-plus"></use></svg>
                    <?php endif; ?>
                  </span>
                </button>

                <div
                  id="<?php echo $component_id . '-' . $key; ?>-content"
                  class="hidden py-4 content-accordion__item-answer"
                  aria-labelledby="<?php echo $component_id . '-' . $key;?>-button"
                  <?php echo $add_microdata ? 'itemprop="suggestedAnswer acceptedAnswer" itemscope itemtype="https://schema.org/Answer"' : ''; ?>>
                  <div class="flex-fill sm:pr-24 wysiwyg" <?php echo $add_microdata ? 'itemprop="text"' : ''; ?>>
                    <?php echo format_text($item['content']); ?>
                  </div>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <?php if( !isset($component_data['accordion_only']) ) : ?>
        <?php if( $component_data['image_id'] != null || $component_data['cta_title'] != '' || $component_data['cta_text'] != '' || $component_data['cta_link'] != '' ) : ?>
          <div class="flex items-center justify-center w-full px-8 py-6 mx-auto lg:px-[132px] mt-12 content-accordion__cta js-slide bg-brand-beige">
            <?php if( $component_data['second_image_id'] != null ) : ?>
              <div class="relative z-0 flex-shrink-0 -mr-1 aspect-square content-accordion__cta-image second">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => $component_data['second_image_id'],
                      'thumbnail_size' => 'full',
                      'position' => $component_data['second_image_focus_point'],
                      'fit' =>  $component_data['second_image_fit'],
                      'loading' => $component_data['second_image_loading']
                    )
                  );
                ?>
              </div>
            <?php endif; ?>
            <?php if( $component_data['image_id'] != null ) : ?>
              <div class="relative z-10 flex-shrink-0 mr-8 aspect-square content-accordion__cta-image">
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
            <div class="flex flex-col">
              <?php if( $component_data['cta_title'] != '' ) : ?>
                <div class="mb-2 hdg-5 text-brand-black">
                  <?php echo $component_data['cta_title']; ?>
                </div>
              <?php endif; ?>
              <?php if( $component_data['cta_text'] != '' ) : ?>
                <div class="mb-4 paragraph-default text-brand-gray">
                  <?php echo $component_data['cta_text']; ?>
                </div>
              <?php endif; ?>
              <?php if ( $component_data['cta_link'] != '' ) : ?>
                <a class="secondary-btn gold w-fit" href="<?php echo $component_data['cta_link']['url']; ?>" <?php echo $component_data['cta_link']['target'] ? 'target="' . $component_data['cta_link']['target'] . '"' : '' ?>>
                  <?php echo $component_data['cta_link']['title']; ?>
                  <?php if($component_data['cta_link']['target'] === '_blank') : ?>
                    <span class="sr-only"> (opens in new tab)</span>
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
