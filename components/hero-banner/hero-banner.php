<?php
/**
* Hero Banner
* -----------------------------------------------------------------------------
*
* Hero Banner component
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
$component_id = ( isset( $component_args['id'] ) ? $component_args['id'] : false );
?>

<?php
$defaults = [
  'heading' => array(
    'tag'  => 'h2',
    'text' => null
  ),
  'image_id' => null,
  'image_focus_point' => null,
];

$component_data      = ll_parse_args( $component_data, $defaults );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="hero-banner relative flex justify-center items-end <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="hero-banner">
  <?php if( !empty($component_data['loop_video_url'])) : ?>
      <?php
        ll_include_component(
          'loop-video',
          array(
            'video' => $component_data['loop_video_url'],
            'display' => 'desktop',
            'image_id' => $component_data['image_id'],
            'thumbnail_size' => 'full',
            'position' => $component_data['image_focus_point'],
            'loading' => $component_data['image_loading']
          )
        );
    ?>
  <?php else : ?>
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
  <?php endif; ?>
  <div class="container relative z-10 pb-12 text-brand-white lg:pb-20">
    <div class="row">
      <div class="w-full col lg:w-9/12">
        <div class="js-slide-group">
          <?php if( $component_data['keyword_heading'] && $component_data['keyword_heading']['text']) : ?>
            <<?php echo $component_data['keyword_heading']['tag']; ?> class='mb-5 lg:mb-8 hdg-6'><?php echo $component_data['keyword_heading']['text']; ?></<?php echo $component_data['keyword_heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['main_heading'] && $component_data['main_heading']['text']) : ?>
            <<?php echo $component_data['main_heading']['tag']; ?> class='hdg-1'><?php echo $component_data['main_heading']['text']; ?></<?php echo $component_data['main_heading']['tag']; ?>>
          <?php endif; ?>
        </div>
        <?php if( !empty($component_data['loop_video_url']) || !empty($component_data['button']) ) : ?>
          <div class="flex flex-col items-start mt-5 lg:items-center lg:flex-row">
            <?php if ( !empty($component_data['button']) ) : ?>
              <a class="mb-6 mr-0 lg:mr-10 lg:mb-0 primary-btn white" href="<?php echo $component_data['button']['url']; ?>" <?php echo $component_data['button']['target'] ? 'target="' . $component_data['button']['target'] . '"' : '' ?>>
                <span class="relative"><?php echo $component_data['button']['title']; ?></span>
                <?php if($component_data['button']['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
            <?php if( !empty($component_data['loop_video_url']) ) : ?>
              <button type="button" class="relative ll-focus-white js-fade is-paused loop-video-btn loop-video-toggle-state" title="Play looping video">
                <div class="pause-loop">
                  <div class="flex items-center">
                    <svg class="mr-5 icon icon-pause-loop"><use xlink:href="#icon-pause-loop"></use></svg>
                    <div>PAUSE VIDEO</div>
                  </div>
                </div>
                <div class="play-loop">
                  <div class="flex items-center">
                    <svg class="mr-5 icon icon-play-loop"><use xlink:href="#icon-play-loop"></use></svg>
                    <div>PLAY VIDEO</div>
                  </div>
                </div>
              </button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
