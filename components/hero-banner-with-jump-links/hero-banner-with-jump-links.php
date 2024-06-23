<?php
/**
* Hero Banner with Jump Links
* -----------------------------------------------------------------------------
*
* Hero Banner with Jump Links component
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
<section class="hero-banner-with-jump-links pt-20 lg:pt-0 relative z-20 flex justify-center overflow-hidden items-start lg:items-center <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="hero-banner-with-jump-links">
  <?php if( !empty($component_data['looping_video_url'])) : ?>
  <?php
    ll_include_component(
      'loop-video',
      array(
        'video' => $component_data['looping_video_url'],
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
  <div class="container relative z-10 text-center text-brand-white">
    <div class="justify-center row">
      <div class="w-full col lg:w-10/12 xl:w-8/12">
        <div class="js-slide-group">
          <?php if( $component_data['keyword_heading'] && $component_data['keyword_heading']['text']) : ?>
            <<?php echo $component_data['keyword_heading']['tag']; ?> class='mb-5 lg:mb-8 hdg-6'><?php echo $component_data['keyword_heading']['text']; ?></<?php echo $component_data['keyword_heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
            <<?php echo $component_data['heading']['tag']; ?> class='hdg-2'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['content'] != '' ) : ?>
            <div class="mb-2 text-center paragraph-default text-brand-white">
              <?php echo $component_data['content']; ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if( !empty($component_data['looping_video_url']) || !empty($component_data['button']) ) : ?>
          <div class="flex flex-col items-center justify-center mt-5 lg:flex-row js-fade-group">
            <?php if ( !empty($component_data['button']) ) : ?>
              <a class="primary-btn white w-fit" href="<?php echo $component_data['button']['url']; ?>" <?php echo $component_data['button']['target'] ? 'target="' . $component_data['button']['target'] . '"' : '' ?>>
                <span class="relative"><?php echo $component_data['button']['title']; ?></span>
                <?php if($component_data['button']['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
            <?php if( !empty($component_data['looping_video_url']) ) : ?>
              <button type="button" class="relative mt-6 ml-0 lg:mt-0 lg:ml-10 ll-focus-white is-paused loop-video-btn loop-video-toggle-state" title="Play looping video">
                <div class="pause-loop">
                  <div class="flex items-center">
                    <svg class="icon icon-pause-loop"><use xlink:href="#icon-pause-loop"></use></svg>
                  </div>
                </div>
                <div class="play-loop">
                  <div class="flex items-center">
                    <svg class="icon icon-play-loop"><use xlink:href="#icon-play-loop"></use></svg>
                  </div>
                </div>
              </button>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="absolute bottom-0 left-0 z-10 w-full">
    <div class="container">
      <?php if( !empty($component_data['jump_links']) ) : ?>
        <div class="relative flex flex-col items-center py-5 border-t lg:py-8 lg:justify-center lg:flex-row border-brand-white">

          <button class="flex items-center justify-center lg:hidden mobile-jumplink-menu-trigger text-brand-white" data-toggle-target="#jump-link__mobile-container" data-toggle-class="is-open">
            <span class="mr-6 text-sm">
              On this page
            </span>
            <svg class='icon text-brand-white icon-chevron-down'><use xlink:href='#icon-chevron-down'></use></svg>
          </button>

          <div id="jump-link__mobile-container" class="jump-link__container">
            <div class="flex flex-col px-6 py-4 lg:justify-center bg-brand-white lg:bg-transparent lg:flex-row lg:p-0">
              <?php foreach( $component_data['jump_links'] as $jump ) : ?>
                <a class="mb-4 border-b last:mb-0 hero-banner__jump-link ll-focus-white lg:mb-0 border-brand-light-gray lg:border-b-0 text-brand-black lg:text-brand-white lg:mr-16 last:mr-0" href="<?php echo $jump['link'] ?? ''; ?>">
                  <?php echo $jump['text'] ?? ''; ?>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
