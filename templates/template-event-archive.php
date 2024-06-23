<?php
/*
Template Name: Event Archive
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <section class="">

    <div class="container">
      <div class="">
        <div class="wysiwyg">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
