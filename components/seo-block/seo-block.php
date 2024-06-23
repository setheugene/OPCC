<?php
/**
* SEO Block
* -----------------------------------------------------------------------------
*
* SEO Block component
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

$left_contents = $component_data['left_content'];
$right_contents = $component_data['right_content'];
$left_wysiwygs = [];
$right_wysiwygs = [];
foreach($left_contents as $key => $left_content) :
  $left_wysiwygs[$key]['content'] = $left_content['content'];
endforeach;
foreach($right_contents as $key => $right_content) :
  $right_wysiwygs[$key]['content'] = $right_content['content'];
endforeach;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="seo-block py-12 lg:py-16 bg-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="seo-block">
  <div class="container">
    <div class="row">
      <div class="w-full col lg:w-11/12">
        <div class="row">
          <div class="order-2 w-full col lg:w-[41%] lg:pr-[66px] lg:order-1 js-fade-group">
            <?php if( !empty($left_wysiwygs) ) : ?>
              <?php foreach( $left_wysiwygs as $left_wysiwyg ) : ?>
                <div class="mb-8 wysiwyg lg:mb-14 last:mb-0">
                  <?php echo $left_wysiwyg['content']; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="order-1 js-fade-group w-full mb-8 lg:w-[59%] col lg:order-2 lg:pl-[66px] lg:mb-0 lg:border-l lg:border-brand-light-gray">
            <?php if( !empty($right_wysiwygs) ) : ?>
              <?php foreach( $right_wysiwygs as $right_wysiwyg ) : ?>
                <div class="mb-8 wysiwyg lg:mb-14 last:mb-0">
                  <?php echo $right_wysiwyg['content']; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
