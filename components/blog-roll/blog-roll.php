<?php
/**
* Blog Roll
* -----------------------------------------------------------------------------
*
* Blog Roll component
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

$defaults = [
  'intro'       => null,
  'show'        => null,
  'posts'       => [],
  'category'    => null,
];

$component_data = ll_parse_args( $component_data, $defaults );

$args = array(
  'post_type'       => 'post',
  'post_status'     => 'publish',
  'orderby'         => 'date',
  'order'           => 'DESC',
  'posts_per_page'  => 3,
  'field'           => 'ids'
);

if ( $component_data['show'] == 'category' ) {
  $args['category_name'] = $component_data['category']->slug;
} elseif ( $component_data['show'] == 'choice' ) {
  $args['post__in']         = $component_data['posts'];
  $args['orderby']          = 'post__in';
  $args['posts_per_page']   = -1;
}

$blog_posts = get_posts( $args );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="blog-roll relative bg-brand-white py-16 lg:py-24 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="blog-roll">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-1/2">
        <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
          <<?php echo $component_data['heading']['tag']; ?> class='mb-12 text-center text-brand-black js-slide hdg-3'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
        <?php endif; ?>
      </div>
      <div class="w-full col">
        <div class="row -mb-gutter-full">
          <?php if ( !empty( $blog_posts ) ) : ?>
            <?php foreach ( $blog_posts as $key => $blog_post ) : ?>
              <?php $cats = get_the_terms( $blog_post, 'category' ); ?>
              <div class="w-full col lg:w-1/3 mb-gutter-full">
                <a class="duration-200 border post__card border-brand-light-gray blog-post hover:border-transparent" href="<?php echo get_permalink($blog_post); ?>" title="Read more about <?php echo get_the_title($blog_post); ?>">
                  <div class="relative overflow-hidden post__image-wrapper aspect-3/2">
                    <?php
                      ll_include_component(
                        'fit-image',
                        array(
                          'image_id' => get_post_thumbnail_id($blog_post),
                          'position' => 'object-center'
                        ),
                        array(
                          'classes' => ['post__image']
                        )
                      );
                    ?>
                  </div>
                  <div class="post__content">
                    <div class="flex items-center mb-3 text-brand-gray">
                      <p class="post__meta">
                        <?php if ( !empty($cats[0]) ) : ?>
                          <span class="post__category-tag"><?php echo $cats[0]->name; ?></span>
                        <?php endif; ?>
                        <div class="mx-3">|</div>
                        <span class="post__date">
                          <?php echo get_the_date( '', $blog_post ); ?>
                        </span>
                      </p>
                    </div>
                    <h2 class="post__title hdg-5 text-brand-black">
                      <?php echo get_the_title( $blog_post ); ?>
                    </h2>
                  </div>
                  <div class="px-6 pb-6 post__read-more-wrapper">
                    <span class="post__read-more secondary-btn gold">READ ARTICLE<span class="sr-only"> about <?php echo get_the_title( $post ); ?></span></span>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      <a href="<?php echo get_permalink(get_option('page_for_posts')) ?? ''; ?>" class="mt-8 primary-btn black">
        <span class="relative">view all posts</span>
      </a>
    </div>
  </div>
</section>
