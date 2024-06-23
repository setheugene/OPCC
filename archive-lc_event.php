<?php
$Featured_Lifted_Calendar = new Lifted_Calendar();
$args = [
  'archive_shortcode' => 'grid',
];

$organizers = get_terms( array(
  'taxonomy' => 'll_event_organizer',
  'hide_empty' => true,
) );
?>

<?php include( lifted_calendar_locate_template('partials/lc-header.php' ) ); ?>

<section class="calendar-archive" data-component="filtered-events">
  <div class="py-12 lg:py-16 bg-brand-eggplant">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full col lg:w-8/12">
          <div class="wysiwyg">
            <?php echo get_field( 'events_archive_heading', 'option' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="relative text-white border-t border-brand-filter-border event-filters bg-brand-eggplant text-brand-white" data-taxonomy="ll_event_organizer">
    <div class="container">
      <div class="flex flex-col items-center md:flex-row" role="menubar" aria-label="Event Filters">
        <div class="relative">
          <div class="lg:w-[393px] pr-[64px] py-6 md:py-0" role="presentation">
            <form role="search" method="get" class="w-full search-form form-inline events" action="<?php echo get_post_type_archive_link( 'lc_event' ); ?>">
              <label class="sr-only"><?php _e('Search for:', 'roots'); ?></label>
              <div class="relative w-full input-group">
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="w-full pl-6 text-white bg-transparent border-b search-field form-control border-brand-white" placeholder="">
                <svg class='absolute left-0 w-4 h-4 icon text-brand-white icon-magnifier'><use xlink:href='#icon-magnifier'></use></svg>
                <span class="absolute ml-2 border-b input-group-btn border-brand-white">
                  <button type="submit" class="btn btn-default"><?php _e('Search', 'roots'); ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="flex mb-3 md:mb-0">
          <div class="flex flex-row items-center mr-4 border-l-0 md:border-r md:px-5 md:py-8 md:mx-5 md:border-l lg:px-12 lg:mx-12 border-brand-filter-border" role="presentation">
            <div class="mr-6 paragraph-default md:mb-0">
              Filter by
            </div>
            <button id="event-filter-dropdown-toggle" class="font-semibold paragraph-default" data-toggle-target="#events-organizer-filters-panel" data-toggle-class="is-open" data-toggle-group="event-filter" data-toggle-escape aria-haspopup="listbox" aria-expanded="false" role="menuitem">Organizer <svg class="ml-3 icon icon-chevron-down"><use xlink:href="#icon-chevron-down"></use></svg></button>
          </div>

          <div class="flex items-center py-3 pl-4 border-l md:border-l-0 border-brand-filter-border" role="presentation">
            <button class="duration-200 ease-in-out opacity-50 clear-filters secondary-btn reset hover:opacity-100 white" role="menuitem">reset</button>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-brand-plum">
      <div id="events-organizer-filters-panel" class="container hidden filter-dropdown">
        <ul class="grid grid-cols-1 p-4 bg-white gap-gutter text-brand-white top-full text-brand-dark-gray md:grid-cols-2 lg:grid-cols-4" role="listbox" aria-label="Filters for organizer">
          <?php foreach ( $organizers as $key => $organizer ) : ?>
            <li class="mt-1 last:mb-0 event-filter__checkbox-wrapper" role="presentation">
              <input class="sr-only" type="checkbox" name="lc_event_organizer" id="<?php echo $organizer->term_id; ?>" value="<?php echo $organizer->term_id; ?>" role="option" <?php echo !empty( $_GET['organizer'] ) && $_GET['organizer'] == $organizer->slug ? 'checked' : ''; ?>>
              <label for="<?php echo $organizer->term_id; ?>" class="paragraph-default"><?php echo $organizer->name; ?></label>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="container py-12 overflow-visible bg-brand-white">
    <div class="overflow-visible events-area">
      <?php
        $get_organizer = !empty( $_GET['organizer'] ) && !empty( get_term_by( 'slug', $_GET['organizer'], 'lc_event_organizer' )->term_id ) ? get_term_by( 'slug', $_GET['organizer'], 'lc_event_organizer' )->term_id : [];

        ll_include_component(
          'event-results',
          [
            'initial_load'  => true,
            'organizers'     => !empty( $_GET['organizer'] ) ? [$get_organizer] : [],
          ]
        );
      ?>
    </div>
  </div>
</section>
