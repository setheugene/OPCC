<?php
/**
* Two Column Icon List
* -----------------------------------------------------------------------------
*
* Two Column Icon List component
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
<section class="two-column-icon-list bg-brand-beige lg:py-16 py-12 relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="two-column-icon-list">
  <div class="container">
    <div class="row">
      <div class="w-full mb-10 xl:offset-1 col lg:w-1/2 xl:w-5/12 lg:mb-0">
        <div class="wysiwyg js-slide-group">
          <?php echo $component_data['content'] ?? ''; ?>
        </div>
      </div>
      <div class="w-full lg:offset-1 col lg:w-5/12 xl:w-1/3">
        <?php if( !empty($component_data['list']) ) : ?>
          <ul>
            <?php foreach( $component_data['list'] as $list ) : ?>
              <li class="flex items-center py-5 border-b first:pt-0 border-brand-light-gray js-fade">
                <svg class='icon text-brand-gold h-6 w-6 mr-4 icon-<?php echo $list['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $list['svg_icon'] ?>'></use></svg>
                <div class="font-semibold paragraph-default text-brand-black">
                  <?php echo $list['text'] ?? ''; ?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
