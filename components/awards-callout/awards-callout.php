<?php
/**
* Awards Callout
* -----------------------------------------------------------------------------
*
* Awards Callout component
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
<section class="awards-callout lg:pt-41 relative lg:pb-20 pb-12 pt-20 bg-brand-eggplant text-brand-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="awards-callout">
  <div class="awards-callout__watermark">
  <?php $image = $component_data['background_watermark']; ?>
    <?php if( !empty( $image ) ): ?>
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="justify-center row lg:mb-24 mb-18">
      <div class="flex flex-col items-center w-full col lg:w-8/12">
        <?php if( $component_data['keyword_heading'] && $component_data['keyword_heading']['text']) : ?>
          <<?php echo $component_data['keyword_heading']['tag']; ?> class='mb-5 font-semibold text-center js-slide paragraph-default'><?php echo $component_data['keyword_heading']['text']; ?></<?php echo $component_data['keyword_heading']['tag']; ?>>
        <?php endif; ?>
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-8 text-center js-slide hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
        <?php if ( $component_data['button'] ) : ?>
          <a class="primary-btn white" href="<?php echo $component_data['button']['url']; ?>" <?php echo $component_data['button']['target'] ? 'target="' . $component_data['button']['target'] . '"' : '' ?>>
            <span><?php echo $component_data['button']['title']; ?></span>
            <?php if($component_data['button']['target'] === '_blank') : ?>
              <span class="sr-only"> (opens in new tab)</span>
            <?php endif; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <?php if( !empty($component_data['callouts']) ) : ?>
      <?php $callout_count = count($component_data['callouts']); ?>
      <div class="js-fade-group justify-center row flex-wrap lg:flex-row flex-col items-center lg:items-start <?php echo 'count-'.$callout_count; ?>">
        <?php foreach( $component_data['callouts'] as $key => $callout ) : ?>
          <div class="w-full text-center awards-callout_callout-column">
            <div>
              <div class="mb-4 hdg-6">
                <?php echo $callout['title'] ?? ''; ?>
              </div>
              <div class="paragraph-default">
                <?php echo $callout['description'] ?? ''; ?>
              </div>
            </div>
          </div>
          <?php if( $key + 1 !== $callout_count ) : ?>
            <div class="awards-callout__divider"></div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
