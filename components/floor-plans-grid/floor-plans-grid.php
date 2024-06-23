<?php
/**
* Floor Plans Grid
* -----------------------------------------------------------------------------
*
* Floor Plans Grid component
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
<section class="floor-plans-grid bg-brand-white relative py-10 lg:py-16 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="floor-plans-grid">
  <div class="container">
    <div class="row">
      <div class="w-full mb-8 col lg:w-1/2 lg:mb-12">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-2 hdg-3 text-brand-black'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
        <div class="mb-5 paragraph-default text-brand-gray">
          <?php echo $component_data['description'] ?? ''; ?>
        </div>
        <?php if( !empty($component_data['downloadable_file']) ) : ?>
          <a class="secondary-btn gold" target="_blank" href="<?php echo $component_data['downloadable_file']; ?>">
            <?php echo $component_data['download_link_text'] ?? 'Download Floorplans'; ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="w-full col">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4 grid-auto-rows">
          <?php if( !empty($component_data['floor_plans']) ) : ?>
            <?php foreach( $component_data['floor_plans'] as $floor_plan ) : ?>
              <?php $cats = get_the_terms( $floor_plan, 'll_floor_plans_category' ); ?>
              <div class="h-full floor-plan-grid__card">
                <a class="block h-full p-8 duration-200 ease-in-out border bg-brand-white hover:bg-brand-beige border-brand-light-gray hover:border-transparent" target="_blank" href="<?php echo get_field('floor_plan_pdf', $floor_plan) ?? ''; ?>">
                  <?php if( !empty(get_post_thumbnail_id($floor_plan)) ) : ?>
                    <div class="relative mb-6 aspect-square floor-plans-grid__card-image">
                      <?php
                        ll_include_component(
                          'fit-image',
                          array(
                            'image_id' => get_post_thumbnail_id($floor_plan),
                            'position' => 'object-center',
                            'size' => 'medium'
                          ),
                          [
                            'classes' => ['no-zoom'],
                          ]
                        );
                      ?>
                    </div>
                  <?php endif; ?>
                  <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                      <div class="mb-1 font-semibold text-brand-black paragraph-large">
                        <?php echo get_field('floor_plan_name', $floor_plan) ?? ''; ?>
                      </div>
                      <div class="paragraph-default text-brand-gray">
                        <?php if ( !empty($cats[0]) ) : ?>
                          <?php echo $cats[0]->name; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="flex-shrink-0">
                      <div class="flex items-center justify-center w-6 h-6 duration-200 ease-in-out border border-brand-gold floor-plans-grid__card-plus">
                        <svg class='w-3 h-3 duration-200 ease-in-out icon icon-plus text-brand-gold'><use xlink:href='#icon-plus'></use></svg>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php if( !empty($component_data['cta_card']['link']) ) : ?>
            <div class="floor-plans-grid__cta-card">
              <a class="flex flex-col items-center justify-between h-full p-8 duration-200 ease-in-out border bg-brand-white hover:bg-brand-beige border-brand-light-gray" href="<?php echo $component_data['cta_card']['link']['url'] ?? ''; ?>" <?php echo $component_data['cta_card']['link']['target'] ? 'target="' . $component_data['cta_card']['link']['target'] . '"' : '' ?>>
                <svg class='icon h-8 w-8 mb-8 text-brand-gray icon-<?php echo $component_data['cta_card']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['cta_card']['svg_icon'] ?>'></use></svg>
                <div class="mb-4 font-semibold text-center text-brand-black paragraph-large">
                  <?php echo $component_data['cta_card']['title'] ?? ''; ?>
                </div>
                <div class="mb-5 text-center paragraph-default text-brand-gray">
                  <?php echo $component_data['cta_card']['description'] ?? ''; ?>
                </div>
                <div class="primary-btn black">
                  <span class="relative">
                    <?php echo $component_data['cta_card']['link']['title'] ?? ''; ?>
                  </span>
                </div>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
