<?php $post_id = get_queried_object_id(); ?>
<?php get_template_part('templates/partials/components', null, ['post_id' => $post_id]); ?>
