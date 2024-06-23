<?php
$hide_sidebar = get_field( 'blog_hide_sidebar', get_option('page_for_posts') );
$add_breadcrumbs = get_field( 'blog_breadcrumbs', get_option('page_for_posts') );
$back_link = '<a href="'.get_permalink(get_option('page_for_posts')).'"><svg class="mr-3 transform rotate-180 icon icon-arrow"><use xlink:href="#icon-arrow"></use></svg>Back to Blog</a>';

$post_categories = get_the_terms( get_the_ID(), 'category' );
$post_tags = get_the_terms( get_the_ID(), 'post_tag' );

$args = array(
  'post_type'       => 'post',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC',
  'posts_per_page'  => 3,
  'post__not_in' => [ get_the_ID() ],
  'tax_query'       => [
    [
      'taxonomy'      => 'category',
      'field'         => 'term_id',
      'terms'         => get_queried_object_id(),
      'operator'       => '='
    ]
  ]
);

$related_posts = new WP_Query( $args );
?>

<div class="blog-page blog-page--single" data-component="blog">
  <div class="pt-12 blog-single__hero bg-brand-eggplant text-brand-white lg:pt-16">
    <div class="container relative z-10">
      <div class="justify-center row">
        <div class="w-full col xl:w-8/12 lg:w-10/12 -mb-[111px]">
          <?php if ( $add_breadcrumbs && function_exists('yoast_breadcrumb') ) : ?>
            <div class="flex justify-center text-center">
              <?php yoast_breadcrumb(); ?>
            </div>
          <?php endif; ?>
          <div class="flex justify-center mb-8">
            <?php echo $back_link; ?>
          </div>
          <div class="single-post__headings">
            <?php
              $small_heading = get_field( 'post_small_heading' );
              $heading_tag = (empty($small_heading['tag']) || $small_heading['tag'] !== 'h1') ? 'h1' : 'h2';
            ?>

            <?php if ( ! empty($small_heading['text']) ) : ?>
              <<?php echo $small_heading['tag']; ?> class="mb-6 text-center hdg-6 js-fade"><?php echo $small_heading['text']; ?></<?php echo $small_heading['tag']; ?>>
            <?php endif; ?>

            <<?php echo $heading_tag; ?> class="text-center hdg-3 js-fade">
            <?php echo get_the_title(); ?>
            </<?php echo $heading_tag; ?>>
          </div>

          <div class="single-post__meta text-brand-medium-gray">
            <?php if ( !empty( $post_categories ) ) : ?>
              <ul class="flex categories">
                <?php foreach ( $post_categories as $key => $cat ) : ?>
                  <li class="mr-2 last:mr-0"><div class="cat"><?php echo $cat->name; ?><span class="comma">, </span></div></li>
                <?php endforeach; ?>
              </ul>

              <span class="single-post__meta__divider is-after-categories">|</span>
            <?php endif; ?>

            <p><?php echo get_the_date(); ?></p>
          </div>

          <div class="post">
            <?php if ( get_post_thumbnail_id() ) : ?>
              <div class="relative aspect-3/2">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => get_post_thumbnail_id(),
                      'position' => 'object-center'
                    )
                  );
                ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-brand-white">
    <div class="container">

      <div class="justify-center row">
        <div class="w-full blog__post col xl:w-8/12 lg:w-10/12 mt-[111px]">
          <article <?php post_class(); ?>>
            <div class="mt-8 wysiwyg bg-brand-white">
              <?php the_content(); ?>
            </div>
          </article>

          <div class="grid mt-12 gap-y-8 lg:grid-cols-2 single-post__footer gap-x-gutter-full">
            <?php if ( !empty( $post_tags ) ) : ?>
              <div class="blog__footer-block blog__block blog__block--tags">
                <h2 class="blog__footer-title blog__block-title">Tags</h2>

                <ul class="blog__block-list tags">
                  <?php foreach ( $post_tags as $key => $tag ) : ?>
                    <li><a href="<?php echo get_term_link( $tag->term_id, 'post_tag' ); ?>" class="<?php echo get_queried_object_id() == $tag->term_id ? 'is-active' : ''; ?>"><?php echo $tag->name; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <div class="blog__footer-block blog__block blog__block--share">
              <h2 class="blog__footer-title blog__block-title hdg-5 text-brand-black">Share</h2>

              <ul class="social-share">
                <li class="social-share__item"><a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" class="social-share__link share-facebook" target="_blank" title="Share on Facebook (Opens in new window)"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a></li>
                <li class="social-share__item"><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo urlencode(get_the_post_thumbnail_url()); ?>&description=<?php echo urlencode(get_the_excerpt()); ?>" class="social-share__link share-pinterest" target="_blank" title="Share on Pinterest (Opens in new window)"><svg class="icon icon-pinterest"><use xlink:href="#icon-pinterest"></use></svg></a></li>
                <li class="social-share__item"><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_permalink(); ?>" class="social-share__link share-linkedin" target="_blank" title="Share on LinkedIn (Opens in new window)"><svg class="icon icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a></li>
                <li class="social-share__item"><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo urlencode(get_permalink()); ?>" class="social-share__link share-twitter" target="_blank" title="Share on Twitter (Opens in new window)"><svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a></li>
                <li class="social-share__item"><button class="social-share__link share-link" data-url="<?php echo get_permalink(); ?>"><svg class="icon icon-link"><use xlink:href="#icon-link"></use></svg></button><span class="copied-text">Copied</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    <?php if ( $related_posts->have_posts() ) : ?>
      <div class="py-12 mt-10 lg:col-span-3 blog__footer-block blog__block blog__block--related">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-gutter-full">
          <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <?php get_template_part('templates/contents/content'); ?>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    </div>
  </div>
</div>

