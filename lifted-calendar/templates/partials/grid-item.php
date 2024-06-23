<div class="lc-grid__event-item-wrapper ll-focus-black">
  <a href="<?php echo get_permalink( $event['ID'] ); ?>" class="lc-grid__event-item__image-link">
    <span class="sr-only">Learn more about <?php echo get_the_title( $event['ID'] ); ?></span>
    <div class="duration-200 ease-in lc-grid__event-item">
      <div class="lc-grid__event-item__main">
        <div class="lc-grid__event-item__image-wrapper">
          <div class="lc-grid__event-item__image">
            <?php echo lc_fit_image( get_post_thumbnail_id($event['ID']) ); ?>
            <div class="absolute inset-0 flex items-center w-full h-full px-8">
              <div class="flex flex-col items-center lc-grid__event-item__date text-brand-white">
                <div class="mb-2 hdg-6">
                  <?php echo $Lifted_Calendar->get_event_date( $event['ID'], ('M')); ?>
                </div>
                <div class="lc-grid__event-day">
                  <?php echo $Lifted_Calendar->get_event_date( $event['ID'], ('d')); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lc-grid__event-item__content">
          <h2 class="lc-grid__event-item__title lc-dark-text">
            <?php echo get_the_title( $event['ID'] ); ?>
          </h2>
          <ul class="lc-grid__event-item__info lc-dark-text">

            <?php if( $event['start_date'] != $event['end_date'] ) : ?>
              <li class="lc-grid__event-item__date">
                <?php echo $Lifted_Calendar->get_manual_date_range($event['start_date'], $event['end_date'], ( get_field('events_date_format', 'option') == 'custom' ? get_field('events_custom_date_format', 'option') : get_field('events_date_format', 'option') )) ?>
              </li>
            <?php else: ?>
              <?php $times = get_field('event_times', $event['ID']); ?>
              <?php if ( !empty( $times ) ) : ?>
                <?php foreach ( $times as $key => $time ) : ?>
                  <li class="lc-grid__event-item__date">
                    <?php echo $time['start_time']; ?><?php echo $time['end_time'] ? ' - ' . $time['end_time'] : ''; ?>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <li class="lc-grid__event-item__date">
                  <?php if ( get_field( 'event_all_day' ) ) : ?>
                    All Day
                  <?php else : ?>
                    <?php echo get_field('event_start_time'); ?><?php echo get_field('event_end_time') ? ' - ' . get_field('event_end_time') : ''; ?>
                  <?php endif; ?>
                </li>
              <?php endif; ?>
            <?php endif; ?>



          </ul>
        </div>
      </div>
      <div class="lc-grid__event-item__link-wrapper">
        <div class="lc-grid__event-item__link secondary-btn gold">
          <?php apply_filters( 'lifted_calendar_learn_more_button_text', '' ); ?>
        </div>
      </div>
    </div>
  </a>
</div>
