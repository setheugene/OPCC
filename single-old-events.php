<?php
  // Get user's timezone from IP address
  $ipInfo     = file_get_contents('http://ip-api.com/json/');
  $ipInfo     = json_decode($ipInfo);
  $timezone   = $ipInfo->timezone;
  $timezone   = new DateTimeZone( $ipInfo->timezone );

  // Get/Set the site's timezone
  $start_time = get_field('event_start_time');
  $end_time   = get_field('event_end_time');
  $times      = get_field('event_times');
  $Lifted_Calendar = new Lifted_Calendar();

  if(!!empty(get_option( 'timezone_string' ))) :
    date_default_timezone_set('UTC');
  else:
    date_default_timezone_set(get_option( 'timezone_string' ));
  endif;

  // echo wp_date("Ymd\THis", strtotime($Lifted_Calendar->get_event_date() . ' ' . get_field('event_start_time')), $timezone);
?>

<?php include( lifted_calendar_locate_template('partials/lc-header.php') ); ?>

<div class="lc-single">
  <div class="lc-single__hero-banner">
    <div class="lc-container">
      <ul class="relative lc-breadcrumbs">
        <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
        <li><a href="<?php echo get_post_type_archive_link( 'lc_event' ); ?>">Events</a></li>
        <li><?php echo get_the_title(); ?></li>
      </ul>
      <?php if ( get_post_thumbnail_id() ) : ?>
        <div class="lc-single__image">
          <?php echo lc_fit_image( get_post_thumbnail_id() ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="mt-10 lc-container">
    <div class="lc-single__main">
      <div class="lc-single__flex">
        <?php if ( !lc_empty(get_field( 'event_organizer' )) || !lc_empty(get_field( 'event_speakers' )) || !lc_empty(get_field('event_location')) || get_field( 'events_show_local_time', 'option' ) ) : ?>
          <div class="lc-single__sidebar-col">
            <?php if ( !lc_empty(get_field( 'event_organizer' )) ) : ?>
              <div class="lc-single__sidebar-box">
                <?php if ( get_field( 'event_organizer' )['image'] ) : ?>
                  <div class="mb-8 organizer-image">
                    <?php echo wp_get_attachment_image( get_field( 'event_organizer' )['image'], 'large', "", array( "class" => "h-full w-full object-contain" ) ); ?>
                  </div>
                <?php endif; ?>
                <ul class="lc-single__organizer-info lc-dark-text">
                  <?php if ( get_field( 'event_organizer' )['name'] ) : ?>
                    <li><svg class="icon icon-lc-home"><use xlink:href="#icon-lc-home"></use></svg> <?php echo get_field( 'event_organizer' )['name']; ?></li>
                  <?php endif; ?>
                  <?php if ( get_field( 'event_organizer' )['phone'] ) : ?>
                    <li><svg class="icon icon-lc-phone"><use xlink:href="#icon-lc-phone"></use></svg><span><a href="tel:+1<?php echo lc_strip_phone(get_field( 'event_organizer' )['phone']); ?>"><?php echo get_field( 'event_organizer' )['phone']; ?></a></span></li>
                  <?php endif; ?>
                  <?php if ( get_field( 'event_organizer' )['email'] ) : ?>
                    <li><svg class="icon icon-lc-paper-plane"><use xlink:href="#icon-lc-paper-plane"></use></svg> <span><a href="mailto:<?php echo get_field( 'event_organizer' )['email']; ?>"><?php echo get_field( 'event_organizer' )['email']; ?></a></span></li>
                  <?php endif; ?>
                  <?php if ( get_field( 'event_organizer' )['website'] ) : ?>
                    <li><svg class="icon icon-lc-globe"><use xlink:href="#icon-lc-globe"></use></svg> <span><a href="<?php echo get_field( 'event_organizer' )['website']; ?>" target="_blank"><?php echo get_field( 'event_organizer' )['website']; ?></a></span></li>
                  <?php endif; ?>
                  <?php if ( get_field( 'event_location' ) ) : ?>
                    <li><svg class="icon icon-lc-pin"><use xlink:href="#icon-lc-pin"></use></svg> <?php include(lifted_calendar_locate_template('partials/location.php') ); ?></li>
                  <?php endif; ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if ( get_field( 'event_speakers' ) ) : ?>
              <div class="lc-single__sidebar-box">
                <div class="lc-title--sm-uppercase lc-single__sidebar-label lc-dark-text">Speakers</div>
                <?php foreach ( get_field( 'event_speakers' ) as $key => $speaker ) : ?>
                  <div class="lc-single__speaker">
                    <?php if ( $speaker['image'] ) : ?>
                      <div class="lc-single__speaker-image">
                        <?php echo lc_fit_image($speaker['image']); ?>
                      </div>
                    <?php endif; ?>
                    <div class="lc-single__speaker-content">
                      <p class="lc-single__speaker-name lc-dark-text"><?php echo $speaker['name']; ?></p>
                      <?php if ( $speaker['position'] ) : ?>
                        <p class="lc-single__speaker-position"><?php echo $speaker['position']; ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <?php if ( get_field( 'events_show_local_time', 'option' ) ) : ?>
              <div class="lc-single__sidebar-box">
                <div class="lc-title--sm-uppercase lc-single__sidebar-label lc-dark-text">Local Time</div>
                <p class="lc-single__timezone-label"><?php echo $ipInfo->timezone; ?></p>
                <?php if ( get_field( 'event_all_day' ) ) : ?>
                  <p>All Day</p>
                <?php else : ?>
                  <p><?php echo $Lifted_Calendar->get_local_manual_date_range($Lifted_Calendar->get_event_date() . ' ' . get_field('event_start_time'), $Lifted_Calendar->get_event_date(null, 'Y-m-d', true) . ' ' . get_field('event_end_time'), ( get_field('events_date_format', 'option') == 'custom' ? get_field('events_custom_date_format', 'option') : get_field('events_date_format', 'option') ), $timezone); ?> - <?php echo $Lifted_Calendar->get_local_manual_date_range(get_field('event_start_time'), get_field('event_end_time'), 'g:ia', $timezone); ?></p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <div class="lc-single__content-col">
          <div class="lc-single__title-wrapper">
            <h1 class="lc-single__title lc-dark-text"><?php echo get_the_title(); ?></h1>
            <?php if ( get_field( 'event_subtitle' ) ) : ?>
              <p class="lc-single__subtitle"><?php echo get_field( 'event_subtitle' ); ?></p>
            <?php endif; ?>
          </div>
          <div class="lc-single__info lc-dark-text">
            <div class="lc-single__info-item">
              <?php if ( !empty( $times ) ) : ?>
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-calendar"><use xlink:href="#icon-lc-calendar"></use></svg> Dates</h2>
                <?php foreach ( $times as $key => $time ) : ?>
                  <p class="lc-single__info-value is-bordered has-multiple-times">
                    <?php echo date( (get_field('events_date_format', 'option') == 'custom' ? get_field('events_custom_date_format', 'option') : get_field('events_date_format', 'option')), strtotime($time['start_date']) ); ?>
                    <span class="mobile-time"><?php echo $time['start_time']; ?><?php echo $time['end_time'] ? ' - ' . $time['end_time'] : ''; ?></span>
                  </p>
                <?php endforeach; ?>
              <?php else : ?>
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-calendar"><use xlink:href="#icon-lc-calendar"></use></svg> Date</h2>
                <p class="lc-single__info-value"><?php echo $Lifted_Calendar->get_event_date_range(null, ( get_field('events_date_format', 'option') == 'custom' ? get_field('events_custom_date_format', 'option') : get_field('events_date_format', 'option') )); ?></p>
              <?php endif; ?>
            </div>
            <div class="lc-single__info-item <?php echo !empty( $times ) ? 'mobile-hidden' : ''; ?>">
              <?php if ( !empty( $times ) ) : ?>
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-clock"><use xlink:href="#icon-lc-clock"></use></svg> Times</h2>
                <?php foreach ( $times as $key => $time ) : ?>
                  <p class="lc-single__info-value has-multiple-times">
                    <?php echo $time['start_time']; ?><?php echo $time['end_time'] ? ' - ' . $time['end_time'] : ''; ?>
                  </p>
                <?php endforeach; ?>
              <?php else : ?>
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-clock"><use xlink:href="#icon-lc-clock"></use></svg> Time</h2>
                <p class="lc-single__info-value">
                  <?php if ( get_field( 'event_all_day' ) ) : ?>
                    All Day
                  <?php else : ?>
                    <?php echo get_field('event_start_time'); ?><?php echo get_field('event_end_time') ? ' - ' . get_field('event_end_time') : ''; ?>
                  <?php endif; ?>
                </p>
              <?php endif; ?>
            </div>
            <?php if ( get_field('event_cost') && empty(get_field('events_door_cost')) && empty(get_field('events_advanced_cost')) ) : ?>
              <div class="lc-single__info-item">
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-tag"><use xlink:href="#icon-lc-tag"></use></svg>Cost</h2>
                <p class="lc-single__info-value">$<?php echo get_field('event_cost');?></p>
              </div>
            <?php elseif (!empty(get_field('events_door_cost')) || !empty(get_field('events_advanced_cost'))) : ?>
              <div class="lc-single__info-item">
                <h2 class="lc-single__info-label"><svg class="icon icon-lc-tag"><use xlink:href="#icon-lc-tag"></use></svg>Cost</h2>
                <?php if( !empty(get_field('events_door_cost')) ) : ?>
                  <p class="lc-single__info-value">$<?php echo get_field('events_door_cost');?> at the door</p>
                <?php endif; ?>
                <?php if( !empty(get_field('events_advanced_cost')) ) : ?>
                  <p class="lc-single__info-value">$<?php echo get_field('events_advanced_cost');?> in advance</p>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="lc-single__content-wrapper">
            <div class="lc-single__content wysiwyg">
              <?php the_content(); ?>
            </div>
            <div class="mt-12 text-sm font-semibold text-brand-black">
              <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=<?php echo wp_date("Ymd\THis", strtotime($Lifted_Calendar->get_event_date() . ' ' . get_field('event_start_time')), $timezone); ?>%2F<?php echo wp_date("Ymd\THis", strtotime($Lifted_Calendar->get_event_date(null, 'Y-m-d', true) . ' ' . get_field('event_end_time')), $timezone); ?>&details=<?php echo urlencode(get_the_excerpt()); ?>&location=<?php echo lc_stringify_location(); ?>&text=<?php echo get_the_title(); ?>" rel="nofollow noindex" class="mr-8 uppercase hover:underline" target="_blank"><svg class='w-2 h-2 mr-2 icon icon-plus text-brand-black'><use xlink:href='#icon-plus'></use></svg>Add to Google Calendar</a>
              <a href="<?php echo get_feed_link('calendar'); ?>?id=<?php echo get_the_ID(); ?>" rel="nofollow noindex" class="uppercase hover:underline" ><svg class='w-2 h-2 mr-2 icon icon-plus text-brand-black'><use xlink:href='#icon-plus'></use></svg>iCal / Outlook Export</a>
            </div>
            <?php if ( get_field( 'event_allow_registrations' ) ) : ?>
              <div class="lc-single__form-area <?php echo !get_field( 'event_attendance_limit' ) || get_field( 'event_attendance_limit' ) > $Lifted_Calendar->get_event_attendees_count() ? '' : 'lc-single__form-area--attendance-full'; ?>">
                <div class="lc-single__form">
                  <?php if ( !get_field( 'event_attendance_limit' ) || get_field( 'event_attendance_limit' ) > $Lifted_Calendar->get_event_attendees_count() ) : ?>
                    <h2 class="lc-single__form-title lc-title lc-dark-text"><?php apply_filters( 'lifted_calendar_register_title', '' ); ?></h2>
                    <?php if ( get_field('event_cost') ) : ?>
                      <?php echo do_shortcode('[gravityform id="' . get_field('events_registration_form_paid', 'option')['form_id'] . '" title="false" description="false" ajax="true" field_values="cost=' . get_field('event_cost') . '&start_date=' . $Lifted_Calendar->get_event_date() . '"]'); ?>
                    <?php else : ?>
                      <?php echo do_shortcode('[gravityform id="' . get_field('events_registration_form_free', 'option')['form_id'] . '" title="false" description="false" ajax="true" field_values="start_date=' . $Lifted_Calendar->get_event_date() . '"]'); ?>
                    <?php endif; ?>
                  <?php else : ?>
                    <p class="lc-single__attendance-full"><?php apply_filters( 'lifted_calendar_attendance_full_text', '' ); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
