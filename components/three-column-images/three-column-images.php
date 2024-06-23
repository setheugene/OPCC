<?php
/**
* Three Column Images
* -----------------------------------------------------------------------------
*
* Three Column Images component
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
<section class="three-column-images py-12 lg:py-20 bg-brand-beige relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="three-column-images">
  <div class="container">
    <div class="items-center justify-center row">
      <div class="w-full mb-10 col lg:w-1/3 lg:mb-0">
        <div class="wysiwyg js-slide-group">
          <?php echo $component_data['content'] ?? ''; ?>
        </div>
      </div>
      <div class="flex flex-wrap w-full col lg:w-2/3">
        <?php if( !empty($component_data['columns']) ) : ?>
          <?php foreach( $component_data['columns'] as $column ) : ?>
            <?php if ( $column['link'] ) : ?>
              <a class="block pl-6 border-l md:pr-10 js-fade last:pr-0 border-brand-light-gray three-column-images__link" href="<?php echo $column['link']['url']; ?>" <?php echo $column['link']['target'] ? 'target="' . $column['link']['target'] . '"' : '' ?>>
            <?php endif; ?>
            <div class="relative mb-5 overflow-hidden aspect-3/4 three-column-images__image">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $column['image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $column['image_focus_point'],
                    'fit' =>  $column['image_fit'],
                    'loading' => $column['image_loading']
                  )
                );
              ?>
            </div>
            <?php if ( $column['link'] ) : ?>
              <div class="flex items-center font-semibold paragraph-large text-brand-black">
                <span class="three-column-images__link-text"><?php echo $column['link']['title']; ?></span>
                <svg class='w-6 h-6 ml-6 text-brand-black icon icon-arrow'><use xlink:href='#icon-arrow'></use></svg>
                <?php if($column['link']['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php if ( $column['link'] ) : ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
