<?php
/**
* Menu
* -----------------------------------------------------------------------------
*
* Menu component
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

$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );

$jump_links = [];
foreach($component_data['sections'] as $key => $menu_section_jump_links) :
  $jump_links[$key]['jump_link'] = $menu_section_jump_links['category_name'];
endforeach;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="menu bg-brand-white py-10 lg:py-20 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="menu">
  <?php foreach($component_data['sections'] as $key => $menu_section) : ?>
    <div class="relative mb-32 last:mb-0 menu__section">
      <div class="absolute top-0 left-0 hidden h-full menu-section__image hdg-1 lg:block">
        <div class="relative w-full h-full">
          <div class="sticky top-0">
            <div class="relative w-full aspect-menu-item">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $menu_section['category_image_image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $menu_section['category_image_image_focus_point'],
                    'fit' =>  $menu_section['category_image_image_fit'],
                    'loading' => $menu_section['category_image_image_loading']
                  )
                );
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="container menu-section-container">
        <div class="row">
          <div class="w-full mb-8 lg:w-5/12 col lg:mb-0">
            <div class="relative aspect-menu-item">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $menu_section['category_image_image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $menu_section['category_image_image_focus_point'],
                    'fit' =>  $menu_section['category_image_image_fit'],
                    'loading' => $menu_section['category_image_image_loading']
                  ),
                  [
                    'classes' => ['lg:hidden block']
                  ]
                );
              ?>
            </div>
          </div>
          <div class="w-full col lg:w-1/2">
            <div id="<?php echo strtolower(str_replace(' ', '-', $menu_section['category_name'])); ?>" class="section-wrapper">
              <div class="flex flex-col pb-5 text-right border-b menu__sticky-jump-links hdg-4 text-brand-black bg-brand-white border-brand-light-gray">
                <?php foreach( $jump_links as $jump_key => $jump_link ) : ?>
                  <?php if( $jump_key === $key ) : ?>
                    <div class="relative z-20 menu__jump-link-dropdown-trigger">
                      <button class="" href="#<?php echo strtolower(str_replace(' ', '-', $jump_link['jump_link'])); ?>" data-toggle-target="#menu__jump-link-dropdown-<?php echo $key; ?>" data-toggle-class="is-open" data-toggle-outside>
                        <?php echo $jump_link['jump_link']; ?>
                        <svg class='w-5 h-5 ml-8 icon text-brand-black icon-chevron-down'><use xlink:href='#icon-chevron-down'></use></svg>
                      </button>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
                <ul id="menu__jump-link-dropdown-<?php echo $key; ?>" class="hidden px-3 py-5 mt-2 ml-auto border border-brand-light-gray bg-brand-white w-fit">
                  <?php foreach( $jump_links as $jump_key => $jump_link ) : ?>
                    <?php if( $jump_key != $key ) : ?>
                      <li class="order-9 mb-4 not-current last:mb-0">
                        <a class="flex items-center justify-between paragraph-default secondary-btn black" href="#<?php echo strtolower(str_replace(' ', '-', $jump_link['jump_link'])); ?>">
                          <?php echo $jump_link['jump_link']; ?>
                          <svg class='w-3 h-3 ml-8 icon text-brand-black icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                        </a>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php if( !empty( $menu_section['menu_items_section'] ) ) : ?>
                <?php foreach( $menu_section['menu_items_section'] as $menu_item_section ) : ?>
                  <?php if( $menu_item_section['sub_category'] === true ) : ?>
                    <div class="py-8 border-b border-brand-light-gray">
                      <div class="hdg-5 text-brand-black">
                        <?php echo $menu_item_section['sub_category_title'] ?? ''; ?>
                      </div>
                      <?php if( $menu_item_section['sub_category_description'] != '' ) : ?>
                        <div class="mt-4 paragraph-default text-brand-gray">
                          <?php echo $menu_item_section['sub_category_description'] ?? ''; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <?php if( !empty($menu_item_section['menu_items']) ) : ?>
                    <div class="mt-8 border-b border-brand-light-gray last:border-b-0">
                      <?php foreach( $menu_item_section['menu_items'] as $menu_item ) : ?>
                        <div class="w-full mb-8">
                          <div class="flex justify-between w-full mb-2">
                            <div class="font-semibold paragraph-default text-brand-black">
                              <?php echo $menu_item['menu_item_name'] ?? ''; ?>
                            </div>
                            <div class="font-semibold paragraph-default text-brand-gray">
                              <?php echo $menu_item['menu_item_price'] ? $menu_item['menu_item_price'] : ''; ?>
                            </div>
                          </div>
                          <div class="w-[88%] paragraph-small text-brand-gray">
                            <?php echo $menu_item['menu_item_description'] ?? ''; ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                      <?php if( !empty($menu_item_section['sub_category_disclaimer']) ) : ?>
                        <div class="w-[88%] paragraph-small text-brand-gray">
                          <?php echo $menu_item_section['sub_category_disclaimer'] ?? ''; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>
