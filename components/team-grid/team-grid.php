<?php
/**
* Team Grid
* -----------------------------------------------------------------------------
*
* Team Grid component
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
<section class="team-grid bg-brand-white relative lg:py-16 py-12 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="team-grid">
  <div class="container">
    <div class="row">
      <div class="w-full col lg:w-1/2">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-8 js-slide lg:mb-12 hdg-3 text-brand-black'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
      </div>
    </div>
    <?php if( !empty($component_data['members'])) : ?>
      <div class="grid grid-cols-1 gap-12 team-grid__grid lg:grid-cols-3 grid-rows-auto">
        <?php foreach( $component_data['members'] as $member ) : ?>
          <?php $department = get_the_terms($member, 'll_team_department')[0]->name; ?>
          <a class="team-grid__member-card" href="<?php echo get_the_permalink( $member ) ?? ''; ?>">
            <?php if( !empty(get_post_thumbnail_id($member)) ) : ?>
              <div class="relative mb-6 overflow-hidden aspect-3/4">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => get_post_thumbnail_id($member),
                      'thumbnail_size' => 'large',
                      'position' => '',
                      'fit' =>  '',
                      'loading' => ''
                    )
                  );
                ?>
                <?php if( $department != '' ) : ?>
                  <div class="team-grid__grid-item-tag">
                    <?php echo $department; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="team-grid__member-name">
              <?php echo get_the_title($member); ?>
            </div>

            <?php if( !empty(get_field('team_position', $member)) ) : ?>
              <div class="mb-4 paragraph-default text-brand-gray">
                <?php the_field('team_position', $member); ?>
              </div>
            <?php endif; ?>

            <div class="secondary-btn gold">
              learn more
              <span class="sr-only"> about <?php echo get_the_title($member); ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
