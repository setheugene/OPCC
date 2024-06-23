<?php
$hide_sidebar = get_field( 'blog_hide_sidebar', get_option('page_for_posts') );
$blog_headings = get_field( 'blog_headings', get_option('page_for_posts') );
$featured_post = get_field( 'blog_featured_post', get_option('page_for_posts') );
$categories = get_terms( array(
  'taxonomy' => 'category',
  'hide_empty' => true,
) );
?>
<div class="blog-page bg-brand-white">
  <div class="pt-12 blog-page__hero bg-brand-eggplant lg:pt-20">
    <?php if ( isset($blog_headings['small_heading']['text']) || isset($blog_headings['large_heading']['text']) ) : ?>
      <div class="blog__headings text-brand-white js-slide-group">
        <?php if ( isset($blog_headings['small_heading']['text']) ) : ?>
          <<?php echo $blog_headings['small_heading']['tag']; ?> class="mb-4 text-center hdg-6"><?php echo $blog_headings['small_heading']['text']; ?></<?php echo $blog_headings['small_heading']['tag']; ?>>
        <?php endif; ?>

        <?php if ( isset($blog_headings['large_heading']['text']) ) : ?>
          <<?php echo $blog_headings['large_heading']['tag']; ?> class="text-center hdg-2"><?php echo $blog_headings['large_heading']['text']; ?></<?php echo $blog_headings['large_heading']['tag']; ?>>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="relative flex items-center justify-center py-8 mb-10 lg:mb-14 blog-page__category-filter-wrapper">
      <button class="flex items-center text-brand-white lg:hidden" data-toggle-target="#blog__categories" data-toggle-class="is-open">
        Select a Category
        <svg class='ml-2 icon icon-chevron-down'><use xlink:href='#icon-chevron-down'></use></svg>
      </button>
      <ul id="blog__categories" class="absolute bottom-0 flex flex-col justify-center lg:items-center categories lg:flex-row lg:relative bg-brand-white lg:bg-transparent">
        <li class="w-full mr-5 border-b last:mr-0 border-brand-gray lg:pb-0 lg:border-b-0 lg:w-fit">
          <a href="<?php echo get_the_permalink(get_option('page_for_posts')); ?>" class="blog-page__category-filter lg:border lg:border-brand-white font-semibold lg:py-2 lg:px-5 <?php if(!is_category()): echo 'is-active'; endif; ?>">All Posts</a>
        </li>
        <?php foreach ( $categories as $key => $cat ) : ?>
          <li class="w-full pt-2 mr-5 border-b lg:pt-0 last:mr-0 border-brand-gray lg:pb-0 lg:border-b-0 lg:w-fit">
            <a href="<?php echo get_term_link( $cat->term_id, 'category' ); ?>" class="blog-page__category-filter lg:border lg:border-brand-white lg:font-semibold lg:py-2 lg:px-5 <?php echo get_queried_object_id() == $cat->term_id ? 'is-active' : ''; ?>"><?php echo $cat->name; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="container pb-16">
    <div class="blog__columns">
      <?php if ( ! $hide_sidebar ) : ?>
        <div class="blog__sidebar">
          <?php get_template_part('templates/partials/blog-sidebar'); ?>
        </div>
      <?php endif; ?>

      <div class="blog__posts <?php echo $hide_sidebar ? 'lg:col-span-3' : 'lg:col-span-2'; ?>">
        <?php if (!have_posts()) : ?>
          <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>
        <?php endif; ?>

        <?php if ( $featured_post && (!is_category() && !is_tag()) ) : ?>
          <div class="mb-10 blog__featured-post">
            <?php
              ll_include_component(
                'content',
                array(
                  'post' => $featured_post
                ),
                array(
                  'classes' => ['featured-post']
                )
              );
            ?>
          </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 gap-y-12 lg:grid-cols-3 gap-x-gutter-full blog__posts-grid">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/contents/content'); ?>
          <?php endwhile; ?>
        </div>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <nav class="blog__pagination">
            <?php
              echo paginate_links( array(
                'format'  => 'page/%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $wp_query->max_num_pages,
                'mid_size'        => 5,
                'prev_text'       => __('<svg class="icon icon-chevron-left"><use xlink:href="#icon-chevron-left"></use></svg>'),
                'next_text'       => __('<svg class="icon icon-chevron-right"><use xlink:href="#icon-chevron-right"></use></svg>')
              ) );
            ?>
          </nav>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
