<?php $post_id = get_field( 'page_for_event_spaces', 'option' ); ?>
<?php get_template_part('templates/partials/components', null, ['post_id' => $post_id]); ?>
