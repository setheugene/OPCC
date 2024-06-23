<?php
/**
* Capacity Chart
* -----------------------------------------------------------------------------
*
* Capacity Chart component
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
<section class="capacity-chart bg-brand-white py-10 lg:py-12 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="capacity-chart">
  <div class="container">
    <div class="row">
      <div class="w-full mb-8 col lg:w-1/2 js-slide-group lg:mb-12">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='text-brand-black hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
        <?php if( !empty($component_data['downloadable_chart']) ) : ?>
          <a target="_blank" href="<?php $component_data['downloadable_chart']; ?>" class="mt-4 secondary-btn gold">
            <?php echo $component_data['download_button_text'] != '' ? $component_data['download_button_text'] : 'Download Chart'; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( $component_data['table']['body'][0][0]['c'] == '' ) : ?>
      <table class="hidden table--two-headers lg:table">
        <tr>
          <?php foreach ( $component_data['table']['body'][0] as $col_key => $col ) : ?>
            <?php if ( $col_key == 0 ) : ?>
              <td></td>
            <?php else : ?>
              <th scope="col"><?php echo $col['c']; ?></th>
            <?php endif; ?>
          <?php endforeach; ?>
        </tr>

        <?php foreach ( $component_data['table']['body'] as $key => $row ) : ?>
          <?php if ( $key > 0 ) : ?>
            <tr>
              <?php foreach ( $row as $col_key => $col ) : ?>
                <?php if ( $col_key == 0 ) : ?>
                  <th scope="row"><?php echo $col['c']; ?></th>
                <?php else : ?>
                  <td><?php echo $col['c']; ?></td>
                <?php endif; ?>
              <?php endforeach; ?>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </table>

      <div class="block mobile-table lg:hidden">
        <?php foreach ( $component_data['table']['body'] as $key => $row ) : ?>
          <?php if ( $key > 0 ) : ?>
            <h2 class="mb-6 hdg-4 mobile-table__row-heading"><?php echo $row[0]['c']; ?></h2>

            <div class="mb-8 mobile-table__row">
              <?php foreach ( $row as $col_key => $col ) : ?>
                <?php if ( $col_key > 0 ) : ?>
                  <div class="flex mobile-table__column">
                    <div class="mobile-table__header"><?php echo $component_data['table']['body'][0][$col_key]['c']; ?></div>

                    <div class="mobile-table__cell"><?php echo $col['c']; ?></div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <table class="hidden lg:table capacity-chart__table">
        <?php if ( $component_data['table']['header'] ) : ?>
          <tr>
            <?php foreach ( $component_data['table']['header'] as $col_key => $col ) : ?>
              <?php
                $heading_content = $col['c'];
                if (str_contains( $heading_content, '{{' )):
                  $heading_content = str_replace( '{{', '<div class="capacity-chart__tooltip-hover" data-toggle-class="is-open" data-toggle-event="mouseover" data-toggle-outside data-toggle-target-next><svg class="relative z-20 w-3 h-3 mb-2 ml-1 icon icon-tooltip text-brand-gray"><use xlink:href="#icon-tooltip"></use></svg></div><span class="capacity-chart__tooltip-content">', $col['c'] );
                  $heading_content = str_replace( '}}', '</span>', $heading_content );
                endif;
              ?>
              <th class="relative">
                <?php echo $heading_content; ?>
              </th>
            <?php endforeach; ?>
          </tr>
        <?php endif; ?>

        <?php foreach ( $component_data['table']['body'] as $key => $row ) : ?>
          <tr>
            <?php foreach ( $row as $col_key => $col ) : ?>
              <td><?php echo $col['c']; ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </table>

      <div class="block mobile-table lg:hidden">
        <?php foreach ( $component_data['table']['body'] as $key => $row ) : ?>
          <div class="mb-8 last:mb-0 mobile-table__row">
            <?php foreach ( $row as $col_key => $col ) : ?>
              <div class="flex mobile-table__column">
                <?php if ( $component_data['table']['header'] ) : ?>
                  <?php
                    $heading_content = $component_data['table']['header'][$col_key]['c'];
                    if (str_contains( $heading_content, '{{' )):
                      $heading_content = str_replace( '{{', '<span class="sr-only">', $heading_content );
                      $heading_content = str_replace( '}}', '</span>', $heading_content );
                    endif;
                  ?>
                  <div class="mobile-table__header"><?php echo $heading_content; ?></div>
                <?php endif; ?>

                <div class="mobile-table__cell"><?php echo $col['c']; ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
