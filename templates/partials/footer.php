<?php
  /*
   * create as an array to loop through
   * if they're in a list, or create them individually
   *
   * Call individually
   * $footer_menu_one = new LL_Menu( 'footer_menu_one' );
   * $footer_menu_two = new LL_Menu( 'footer_menu_two' );
  */

  $menus = array(
    new LL_Menu( 'footer_menu_one' ),
    new LL_Menu( 'footer_menu_two' )
  );
?>
<footer class="relative footer bg-brand-eggplant text-brand-white" role="contentinfo">
  <div class="container">
    <div class="pt-8 row lg:pt-16">
      <div class="w-full col">
        <?php echo gravity_form( get_field('footer_event_planning_tool_starter_form_id', 'option'), false, false, false, null, true ); ?>
      </div>
    </div>
    <div class="py-8 row lg:pt-12 lg:pb-8">
      <div class="w-full mb-6 text-center md:w-1/2 lg:mb-0 md:text-left lg:w-1/6 col">
        <nav class="" role="navigation" aria-label="Contact Navigation">
          <h4 class="mb-5 font-semibold">Contact</h4>
          <ul>
            <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
              <li class="mb-3 last:mb-0">
                <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="duration-200 ease-in-out text-brand-medium-gray hover:text-brand-white hover:underline">
                  <?php echo get_field('contact_phone_number', 'option'); ?>
                </a>
              </li>
            <?php endif; ?>
            <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
              <li class="mb-3 last:mb-0">
                <div class="text-brand-medium-gray">
                  <?php echo get_field('navigation_hours', 'option'); ?>
                </div>
              </li>
            <?php endif; ?>
            <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
              <?php $address_url = get_field('gmb_link', 'options') != '' ? get_field('gmb_link', 'options') : 'https://www.google.com/maps/place/' . get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>
              <li class="mb-3 last:mb-0">
                <a class='duration-200 ease-in-out text-brand-medium-gray hover:text-brand-white hover:underline' href='<?php echo $address_url; ?>' target='_blank'>
                  <span><?php echo get_field('contact_street_address', 'options');?></span>
                  <span><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
      <?php foreach ( $menus as $menu ) : ?>
        <div class="w-full mb-6 text-center md:w-1/2 lg:mb-0 md:text-left lg:w-1/6 col">
          <?php if ( isset($menu->hasItems) ) : ?>
            <nav class="" role="navigation" aria-label="<?php echo $menu->name; ?> Navigation">
              <h4 class="mb-5 font-semibold"><?php echo $menu->name; ?></h4>
              <ul>
                <?php foreach( $menu->items as $menu_item ): ?>
                  <li class="mb-3 last:mb-0">
                    <a class="duration-200 ease-in-out text-brand-medium-gray hover:text-brand-white hover:underline" href="<?php echo $menu_item->url ?>" target="<?php echo $menu_item->target; ?>">
                      <?php echo $menu_item->title; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </nav>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
      <div class="w-full mb-6 text-center md:w-1/2 lg:mb-0 md:text-left lg:w-1/6 col">
        <nav class="" role="navigation" aria-label="Social Media Navigation">
          <h4 class="mb-5 font-semibold">
            Follow Us
          </h4>
          <?php echo ll_get_social_list(); ?>
        </nav>
      </div>
      <div class="w-full mb-6 text-center md:w-1/2 lg:mb-0 md:text-left lg:w-1/3 col">
        <?php if( !empty(get_field('footer_awards', 'options')) ) : ?>
          <div class="flex items-center justify-center md:justify-start">
            <?php foreach( get_field('footer_awards', 'options') as $award ) : ?>

              <div class="mr-8 md:mr-12 last:mr-0 award__wrapper">
                <img src="<?php echo esc_url($award['award']['url']); ?>" alt="<?php echo esc_attr($award['award']['alt']); ?>" />
              </div>

            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="py-5 text-brand-white bg-brand-plum footer-bottom">
    <div class="container">
      <div class="flex flex-wrap items-center justify-center text-sm text-center md:flex-nowrap md:justify-between">
        <div class="w-full mb-5 md:w-auto md:text-left md:mb-0">
          &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.
        </div>

        <div class="w-full md:w-auto md:text-right">
          <a class="hover:underline" href="https://liftedlogic.com/" target="_blank">Web Design</a> & <a class="hover:underline" href="https://liftedlogic.com/" target="_blank">SEO</a> by <a class="hover:underline" href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
        </div>
      </div>
    </div>
  </div>


</footer>
