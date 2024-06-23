<?php
$faq_archive_id = get_field('page_for_faq', 'option') ?? '';

$faq_categories = get_terms( array(
  'taxonomy' => 'll_faq_category',
  'hide_empty' => true,
) );
?>
<section class="archive-faq__hero bg-brand-eggplant">
  <div class="py-10 lg:pt-20 lg:pb-10 archive-faq__hero-heading-section">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full col lg:w-10/12">
          <div class="wysiwyg">
            <?php echo get_field('archive_faqs_intro', $faq_archive_id) ?? ''; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="flex items-center py-4 mx-auto text-brand-white lg:hidden" data-toggle-target="#faq__categories" data-toggle-class="is-open">
    Select a Category
    <svg class='ml-2 icon icon-chevron-down'><use xlink:href='#icon-chevron-down'></use></svg>
  </button>
  <ul id="faq__categories" class="flex flex-col justify-center lg:py-8 lg:items-center categories lg:flex-row lg:relative bg-brand-white lg:bg-transparent" aria-label="Filters for faqs" role="listbox">
    <li class="w-full border-b lg:mr-5 last:mr-0 border-brand-gray lg:pb-0 lg:border-b-0 lg:w-fit faq__filter" roll="presentation">
      <input class="sr-only" type="radio" name="ll_faq_cat" id="faq_all" value="0" role="option">
      <label for="faq_all" class="font-semibold lg:border archive-faq__cat-pill lg:border-brand-white lg:py-2 lg:px-5">
        All Posts
      </label>
    </li>
    <?php foreach( $faq_categories as $faq_category ) : ?>
      <li class="w-full border-b lg:mr-5 last:mr-0 faq__filter border-brand-gray lg:pb-0 lg:border-b-0 lg:w-fit" roll="presentation">
        <input class="sr-only" type="radio" name="ll_faq_cat" id="<?php echo $faq_category->slug; ?>" value="<?php echo $faq_category->term_id; ?>" role="option">
        <label for="<?php echo $faq_category->slug; ?>" class="font-semibold archive-faq__cat-pill lg:border lg:border-brand-white lg:py-2 lg:px-5">
          <?php echo $faq_category->name; ?>
        </label>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
<div class="archive-faq__content-accordion-wrapper">
  <?php
    ll_include_component(
      'content-accordion',
      [
        'accordion_only'  => true,
        'intro'       => null,
        'show'        => 'faqs',
        'items'       => [],
        'faqs'        => [],
        'faq_categories'  => [],
        'icon_type'     => 'plus-cross',
      ]
    );
  ?>
</div>

<?php $post_id = get_field( 'page_for_faq', 'option' ); ?>
<?php get_template_part('templates/partials/components', null, ['post_id' => $post_id]); ?>
