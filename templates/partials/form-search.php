<form role="search" method="get" class="w-full search-form form-inline" action="<?php echo get_post_type_archive_link( 'lc_event' ); ?>">
  <label class="sr-only"><?php _e('Search for:', 'roots'); ?></label>
  <div class="relative w-full input-group">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="w-full pl-6 text-white bg-transparent border-b search-field form-control border-brand-white" placeholder="">
    <svg class='absolute left-0 w-4 h-4 icon text-brand-white icon-magnifier'><use xlink:href='#icon-magnifier'></use></svg>
    <span class="absolute -ml-2 border-b input-group-btn border-brand-white">
      <button type="submit" class="pointer-events-none btn btn-default"><?php _e('Search', 'roots'); ?></button>
    </span>
  </div>
</form>
