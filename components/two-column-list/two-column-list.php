<?php
/**
* Two Column List
* -----------------------------------------------------------------------------
*
* Two Column List component
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
<section class="two-column-list bg-brand-white text-brand-black relative pb-[14px] pt-12 lg:pt-16 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="two-column-list">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-10/12">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-8 text-center lg:mb-12 js-slide hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
        <?php if( !empty($component_data['lists']) ) : ?>
          <div class="row">
            <?php foreach( $component_data['lists'] as $list ) : ?>
              <div class="w-full col lg:w-1/2 mb-[34px]">
                <?php if( $list['heading'] && $list['heading']['text']) : ?>
                  <<?php echo $list['heading']['tag']; ?> class='px-6 py-4 font-semibold paragraph-large text-brand-black bg-brand-beige'><?php echo $list['heading']['text']; ?></<?php echo $list['heading']['tag']; ?>>
                <?php endif; ?>
                <?php if( !empty($list['list_items']) ) : ?>
                  <ul>
                    <?php foreach( $list['list_items'] as $list_item ) : ?>
                      <li class="js-fade px-6 py-[14px] border-b last:border-b-0 border-brand-light-gray">
                        <div class="wysiwyg paragraph-default text-brand-gray">
                          <?php echo $list_item['list_item'] ?? ''; ?>
                        </div>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
