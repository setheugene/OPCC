<?php
/**
* Filtered Events
* -----------------------------------------------------------------------------
*
* Filtered Events component
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
?>

<?php
$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );

$taxonomies = [
  'Organizer' => 'lc_event_organizer',
];

include( lifted_calendar_locate_template('partials/lc-header.php' ) );
?>

<section class="filtered-events mt-16 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="filtered-events">
  <?php if ( !empty( $component_data['heading']['text'] ) ) : ?>
    <div class="container mb-10">
      <<?php echo $component_data['heading']['tag']; ?> class="text-center text-brand-black hdg-1"><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
    </div>
  <?php endif; ?>

  <div class="relative z-50 border-gray-300 lg:border-y event-filters">
    <div class="container">
      <div class="flex flex-wrap items-stretch justify-start lg:flex-nowrap">
        <?php foreach ( $taxonomies as $label => $taxonomy ) : ?>
          <?php
            $terms = get_terms( array(
              'taxonomy' => $taxonomy,
              'hide_empty' => false,
            ) );
          ?>

          <div class="relative flex items-center flex-initial w-full border-b border-gray-300 event-filter lg:border-l lg:flex-1 lg:border-b-0 first:border-t lg:first:border-t-0 lg:border-t-0 lg:w-auto first:border-l-0" data-taxonomy="<?php echo $taxonomy; ?>">
            <button class="flex items-center justify-between w-full px-6 py-6 text-lg duration-150 xl:px-10 hover:bg-gray-300" data-toggle-target-next data-toggle-class="is-open" data-toggle-group="event-filter" data-toggle-escape data-toggle-outside><?php echo $label; ?> <svg class="ml-3 icon icon-chevron-down"><use xlink:href="#icon-chevron-down"></use></svg></button>

            <ul class="absolute left-0 z-50 hidden w-full p-4 bg-white event-filters filter-dropdown top-full text-brand-dark-gray">
              <?php foreach ( $terms as $key => $term ) : ?>
                <li class="mt-1 last:mb-0">
                  <input class="sr-only" type="checkbox" name="<?php echo $taxonomy; ?>" id="<?php echo $term->term_id; ?>" value="<?php echo $term->term_id; ?>">
                  <label for="<?php echo $term->term_id; ?>" class="flex items-start justify-start before:h-4 before:w-4 before:inline-flex before:border before:border-brand-primary before:mr-2 before:items-center before:justify-center before:text-white"><?php echo $term->name; ?></label>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>

        <div class="flex items-center justify-start flex-1 px-6 pt-6 pb-6 text-right lg:justify-end lg:px-0 lg:pb-0 lg:pt-0">
          <button class="hover:underline is-white clear-filters">Clear All Filters</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container py-12 overflow-visible bg-brand-white">
    <div class="overflow-visible events-area">
      <?php
        ll_include_component(
          'event-results'
        );
      ?>
    </div>
  </div>
</section>
