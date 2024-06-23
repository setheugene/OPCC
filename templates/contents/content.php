<?php
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

$post = !empty($component_data['post']) ? $component_data['post'] : get_the_ID();
?>
<article <?php post_class(implode( " ", $classes ), $post ); ?> <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?>>
  <?php
    $cats = get_the_terms( $post, 'category' );
    $corner_tag = false;
    $content_tag = true;
  ?>
  <a class="duration-200 border post__card border-brand-light-gray hover:border-transparent" href="<?php echo get_permalink($post) ?>" title="Read more about <?php echo get_the_title($post); ?>">
    <div class="relative overflow-hidden post__image-wrapper aspect-3/2">
      <?php
        ll_include_component(
          'fit-image',
          array(
            'image_id' => get_post_thumbnail_id($post),
            'position' => 'object-center'
          ),
          array(
            'classes' => ['post__image']
          )
        );
      ?>

      <?php if ( !empty($cats[0]) && $corner_tag ) : ?>
        <span class="post__category-corner-tag"><?php echo $cats[0]->name; ?></span>
      <?php endif; ?>
    </div>

    <div class="post__content">
      <div class="flex items-center mb-3 text-brand-gray">
        <p class="post__meta">
          <?php if ( !empty($cats[0]) && $content_tag ) : ?>
            <span class="post__category-tag"><?php echo $cats[0]->name; ?></span>
          <?php endif; ?>
          <div class="mx-3">|</div>
          <span class="post__date">
            <?php echo get_the_date( '', $post ); ?>
          </span>
        </p>
      </div>

      <h2 class="post__title hdg-5 text-brand-black">
        <?php echo get_the_title( $post ); ?>
      </h2>
    </div>

    <div class="px-6 pb-6 post__read-more-wrapper">
      <span class="post__read-more secondary-btn gold">READ ARTICLE<span class="sr-only"> about <?php echo get_the_title( $post ); ?></span></span>
    </div>
  </a>
</article>
