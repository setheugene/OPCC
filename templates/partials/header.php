<?php
  $logo = get_field( 'global_logo', 'option' );

  $primary_menu   = new LL_Menu( 'primary_navigation' );
  $resources_menu   = new LL_Menu( 'resources_navigation' );
?>
<header class="flex items-center navbar bg-brand-eggplant text-brand-white" role="banner">
  <div class="container">
    <div class="flex items-center justify-between flex-nowrap">

      <div class="relative flex items-center justify-between w-full lg:w-fit lg:justify-start">
        <div id="mobile-top-panel" class="absolute hidden inset bg-brand-eggplant">
          <?php if( !empty(get_field('nav_text_link', 'option')) ) : ?>
            <?php if ( get_field('nav_text_link', 'option') ) : ?>
              <a class="block text-sm md:inline-block navbar-text-link nav-link focus-offset xl:text-base" href="<?php echo get_field('nav_text_link', 'option')['url']; ?>" <?php echo get_field('nav_text_link', 'option')['target'] ? 'target="' . get_field('nav_text_link', 'option')['target'] . '"' : '' ?>>
                <span>
                  <?php echo get_field('nav_text_link', 'option')['title']; ?>
                </span>
                <?php if(get_field('nav_text_link', 'option')['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="flex items-center">

          <?php if ( $logo ) : ?>

            <a class="relative inline-block md:mr-10 lg:mr-4 logo-link nav-link xl:mr-10" href="<?php echo esc_url(home_url('/')); ?>">

              <div class="logo logo--header" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-animate.svg" alt="<?php bloginfo('name'); ?>">
                <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_555_6128)">
                  <path class="logo-border" d="M54.3311 1.66882H1.6687V54.3312H54.3311V1.66882Z" stroke="#FBFBF7" stroke-width="3" stroke-miterlimit="10"/>
                  <path class="logo-letter" d="M10.6863 18.9277C10.6863 14.5448 14.0855 11.5507 18.4908 11.5507C22.8961 11.5507 26.2953 14.5373 26.2953 18.9277C26.2953 23.3181 22.8961 26.3048 18.4908 26.3048C14.0855 26.3048 10.6863 23.3107 10.6863 18.9277ZM21.9124 18.9277C21.9124 16.9397 20.5647 15.3568 18.4908 15.3568C16.4169 15.3568 15.0692 16.9397 15.0692 18.9277C15.0692 20.9157 16.4263 22.4987 18.4908 22.4987C20.5553 22.4987 21.9124 20.9157 21.9124 18.9277Z" fill="#FBFBF7"/>
                  <path class="logo-letter" d="M11.3267 37.0713C11.3267 32.6659 14.7053 29.6942 19.1667 29.6942C22.9 29.6942 24.7909 31.8745 25.6459 33.8419L21.9256 35.5742C21.5616 34.4542 20.4509 33.5003 19.1667 33.5003C17.0928 33.5003 15.7021 35.0833 15.7021 37.0713C15.7021 39.0593 17.0928 40.6422 19.1667 40.6422C20.4491 40.6422 21.5616 39.679 21.9256 38.5683L25.6459 40.2801C24.8115 42.1841 22.9093 44.4502 19.1667 44.4502C14.7053 44.4483 11.3267 41.4542 11.3267 37.0713Z" fill="#FBFBF7"/>
                  <path class="logo-letter" d="M31.7778 26.0581V11.7968H39.3864C42.7221 11.7968 44.5178 14.02 44.5178 16.693C44.5178 19.3661 42.7221 21.5688 39.3864 21.5688H36.0973V26.0581H31.7778ZM40.133 16.693C40.133 15.924 39.5562 15.56 38.8264 15.56H36.0973V17.8H38.8264C39.5618 17.8037 40.133 17.4416 40.133 16.693Z" fill="#FBFBF7"/>
                  <path class="logo-letter" d="M30.9861 37.0713C30.9861 32.6659 34.3648 29.6942 38.8261 29.6942C42.5594 29.6942 44.4504 31.8745 45.3053 33.8419L41.585 35.5742C41.221 34.4542 40.1104 33.5003 38.8261 33.5003C36.7522 33.5003 35.3616 35.0833 35.3616 37.0713C35.3616 39.0593 36.7522 40.6422 38.8261 40.6422C40.1085 40.6422 41.221 39.679 41.585 38.5683L45.3053 40.2801C44.4709 42.1859 42.5594 44.4502 38.8261 44.4502C34.3648 44.4483 30.9861 41.4542 30.9861 37.0713Z" fill="#FBFBF7"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_555_6128">
                  <rect width="56" height="56" fill="white"/>
                  </clipPath>
                  </defs>
                </svg>
              </div>

            </a>
          <?php endif; ?>

          <?php if( !empty(get_field('nav_text_link', 'option')) ) : ?>
            <?php if ( get_field('nav_text_link', 'option') ) : ?>
              <a class="absolute hidden text-sm md:inline-block navbar-text-link lg:block nav-link focus-offset xl:text-base" href="<?php echo get_field('nav_text_link', 'option')['url']; ?>" <?php echo get_field('nav_text_link', 'option')['target'] ? 'target="' . get_field('nav_text_link', 'option')['target'] . '"' : '' ?>>
                <span>
                  <?php echo get_field('nav_text_link', 'option')['title']; ?>
                </span>
                <?php if(get_field('nav_text_link', 'option')['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          <?php endif; ?>

        </div>

        <div class="flex items-center">

          <?php if ( get_field('nav_event_calendar_link','option') ) : ?>
            <div class="absolute block md:relative w-fit lg:hidden primary-menu-item mobile-event">
              <a class="inline-block text-sm md:mr-16 lg:mr-8 primary-nav-trigger xl:mr-16 nav-link focus-offset xl:text-base" href="<?php echo get_field('nav_event_calendar_link','option')['url']; ?>" <?php echo get_field('nav_event_calendar_link','option')['target'] ? 'target="' . get_field('nav_event_calendar_link','option')['target'] . '"' : '' ?>>
                <?php echo get_field('nav_event_calendar_link','option')['title']; ?>
                <?php if(get_field('nav_event_calendar_link','option')['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            </div>
          <?php endif; ?>

          <button type="button" class="block lg:hidden navbar-toggle primary-nav-trigger" data-toggle-class="is-open" data-toggle-target="#primary-nav, #mobile-top-panel, .logo-link, .mobile-event">
            <span class="navbar-toggle-icon"></span>
            <span class="sr-only">Main Menu</span>
          </button>

        </div>

      </div>
      <div class="flex items-center">
        <nav class="hidden lg:block primary-nav" id="primary-nav" role="navigation" aria-label="Main Navigation">
          <div class="flex flex-col justify-between h-full">
            <div>
              <?php if ( get_field('event_planning_tool_link','option') ) : ?>
                <div class="block mt-2 mb-10 md:relative lg:hidden primary-menu-item">
                  <a class="block bg-brand-gold text-brand-white p-[14px] mx-auto w-full text-center" href="<?php echo get_field('event_planning_tool_link','option')['url']; ?>" <?php echo get_field('event_planning_tool_link','option')['target'] ? 'target="' . get_field('event_planning_tool_link','option')['target'] . '"' : '' ?>>
                    <span class="w-full text-sm font-semibold uppercase">
                      <svg class='w-6 h-6 mr-4 icon icon-event-planning-tool'><use xlink:href='#icon-event-planning-tool'></use></svg>
                      <?php echo get_field('event_planning_tool_link','option')['title']; ?>
                    </span>
                    <?php if(get_field('event_planning_tool_link','option')['target'] === '_blank') : ?>
                      <span class="sr-only"> (opens in new tab)</span>
                    <?php endif; ?>
                  </a>
                </div>
              <?php endif; ?>
              <?php if ( $primary_menu->items ) : ?>
                <ul class="flex flex-col lg:flex-row mobile-menu-top">
                  <?php foreach( $primary_menu->items as $key => $menu_item ) : ?>
                    <li class="primary-menu-item">
                      <<?php echo $menu_item->has_children ? 'button' : 'a'; ?> class="primary-nav-trigger inline-block mb-5 lg:mb-0 mr-4 xl:mr-10 nav-link focus-offset xl:text-base text-sm <?php echo $menu_item->fields['primary_nav_options'] ?? ''; ?>"
                        <?php if( $menu_item->has_children ) : ?>
                          data-toggle-class="is-open"
                          data-toggle-target="#menu-<?php echo $menu_item->ID; ?>" aria-expanded="false"
                          data-toggle-group="menu-accordions"
                          id="item-<?php echo $menu_item->ID; ?>"
                          <?php else : ?>
                          href="<?php echo $menu_item->url ?>"
                          target="<?php echo $menu_item->target; ?>"
                        <?php endif; ?>
                      >
                        <?php echo $menu_item->title; ?>

                        <?php if ( $menu_item->has_children ) : ?>

                          <svg class="w-5 h-5 mb-1 lg:w-3 lg:h-3 icon icon-nav-menu-plus" aria-hidden="true"><use xlink:href="#icon-nav-menu-plus"></use></svg>

                        <?php endif; ?>
                      </<?php echo $menu_item->has_children ? 'button' : 'a'; ?>>

                      <?php if ( $menu_item->has_children ) : ?>
                        <div class="child-menu-panel" id="menu-<?php echo $menu_item->ID; ?>" aria-hidden="true" aria-labelledby="item-<?php echo $menu_item->ID; ?>">
                          <div class="flex h-full">
                            <div class="relative child-menu-panel__left">
                              <button class="absolute inset-0 w-full h-full cursor-default" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>"></button>
                              <button class="hidden btn-menu-close md:flex" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>">
                                <svg class='w-6 h-6 icon icon-close'><use xlink:href='#icon-close'></use></svg>
                              </button>
                            </div>
                            <div class="flex flex-col justify-between child-menu-panel__right">
                              <ul class="relative pl-5 mb-5 right-panel__child-menu lg:mb-0 lg:pl-0">
                                <?php foreach ( $menu_item->children as $key => $child_item ) : ?>
                                  <li class="w-full mb-5 last:mb-0 primary-menu-child-item">
                                    <<?php echo $child_item->has_children ? 'button' : 'a'; ?> class="text-xl lg:text-base flex items-center justify-between w-full duration-300 ease-in-out hdg-5 primary-nav-trigger <?php echo $child_item->has_children && $key === 0 ? 'primary__child-menu-first' : ''; ?>"
                                      <?php if( $child_item->has_children ) : ?>
                                        data-toggle-class="is-open"
                                        data-toggle-target="#menu-<?php echo $child_item->ID; ?>"
                                        aria-expanded="false"
                                        data-toggle-group="child-menu-accordions"
                                        id="item-<?php echo $child_item->ID; ?>"
                                        <?php else : ?>
                                        href="<?php echo $child_item->url ?>"
                                        target="<?php echo $child_item->target; ?>"
                                      <?php endif; ?>>

                                      <?php echo $child_item->title; ?>
                                      <?php echo $child_item->has_children ? '<svg class="block w-4 h-4 duration-300 ease-in-out lg:w-3 lg:h-3 lg:hidden icon icon-nav-menu-plus"><use xlink:href="#icon-nav-menu-plus"></use></svg><svg class="hidden duration-300 ease-in-out lg:block icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>' : ''; ?>
                                    </<?php echo $child_item->has_children ? 'button' : 'a'; ?>>
                                    <?php if( $child_item->has_children ) : ?>
                                      <ul id="menu-<?php echo $child_item->ID; ?>" class="grandchild-menu">
                                        <?php foreach( $child_item->children as $grandchild_item ) : ?>
                                          <li class="grandchild-menu-item">
                                            <a class="duration-200 ease-in-out hover:text-brand-medium-gray <?php echo $grandchild_item->fields['primary_nav_options']; ?>" href="<?php echo $grandchild_item->url; ?>" target="<?php echo $grandchild_item->target; ?>">
                                              <?php echo $grandchild_item->title; ?>
                                            </a>
                                          </li>
                                        <?php endforeach; ?>
                                      </ul>
                                    <?php endif; ?>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                              <div class="hidden contact-information lg:block">
                                <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
                                  <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="flex mb-5 w-fit hover:underline text-brand-medium-gray">
                                    <svg class='w-6 h-6 mr-6 icon icon-phone text-brand-medium-gray'><use xlink:href='#icon-phone'></use></svg>
                                    <span class="text-brand-medium-gray">
                                      <?php echo get_field('contact_phone_number', 'option'); ?>
                                    </span>
                                  </a>
                                <?php endif; ?>
                                <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
                                  <?php $address_url = get_field('gmb_link', 'options') != '' ? get_field('gmb_link', 'options') : 'https://www.google.com/maps/place/' . get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>
                                  <a class='flex mb-5 hover:underline w-fit text-brand-medium-gray' href='<?php echo $address_url; ?>' target='_blank'>
                                    <svg class='w-6 h-6 mr-6 icon icon-location-pin'><use xlink:href='#icon-location-pin'></use></svg>
                                    <span>
                                      <div><?php echo get_field('contact_street_address', 'options');?></div>
                                      <div><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></div>
                                    </span>
                                  </a>
                                <?php endif; ?>
                                <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
                                  <div class="flex w-fit">
                                    <svg class='flex-shrink-0 w-6 h-6 mr-6 icon icon-clock text-brand-medium-gray'><use xlink:href='#icon-clock'></use></svg>
                                    <span class="text-brand-medium-gray">
                                      <?php echo get_field('navigation_hours_title', 'option') ?? ''; ?></br>
                                      <?php echo get_field('navigation_hours', 'option'); ?>
                                    </span>
                                  </div>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <?php if ( $resources_menu->items ) : ?>

                <ul class="flex flex-col mt-8 lg:hidden lg:flex-row lg:mt-0">
                  <?php foreach( $resources_menu->items as $key => $menu_item ) : ?>
                    <li class="primary-menu-item">
                      <<?php echo $menu_item->has_children ? 'button' : 'a'; ?> class="primary-nav-trigger inline-block mb-5 last:mb-0 mr-4 xl:mr-10 nav-link focus-offset xl:text-base text-sm <?php echo $menu_item->fields['primary_nav_options'] ?? ''; ?>"
                        <?php if( $menu_item->has_children ) : ?>
                          data-toggle-class="is-open"
                          data-toggle-target="#mobile-menu-<?php echo $menu_item->ID; ?>" aria-expanded="false"
                          data-toggle-group="menu-accordions"
                          id="item-<?php echo $menu_item->ID; ?>"
                          <?php else : ?>
                          href="<?php echo $menu_item->url ?>"
                          target="<?php echo $menu_item->target; ?>"
                        <?php endif; ?>
                      >
                        <?php echo $menu_item->title; ?>

                        <?php if ( $menu_item->has_children ) : ?>
                          <svg class="w-5 h-5 lg:w-3 lg:h-3 icon icon-nav-menu-plus" aria-hidden="true"><use xlink:href="#icon-nav-menu-plus"></use></svg>
                        <?php endif; ?>
                      </<?php echo $menu_item->has_children ? 'button' : 'a'; ?>>

                      <?php if ( $menu_item->has_children ) : ?>
                        <div class="child-menu-panel" id="mobile-menu-<?php echo $menu_item->ID; ?>" aria-hidden="true" aria-labelledby="item-<?php echo $menu_item->ID; ?>">
                          <div class="flex h-full">
                            <div class="relative child-menu-panel__left">
                              <button class="absolute inset-0 w-full h-full cursor-default" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>"></button>
                              <button class="hidden btn-menu-close md:flex" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>">
                                <svg class='w-6 h-6 icon icon-close'><use xlink:href='#icon-close'></use></svg>
                              </button>
                            </div>
                            <div class="flex flex-col justify-between child-menu-panel__right">
                              <ul class="relative pl-5 mb-5 right-panel__child-menu lg:pl-0 lg:mb-0">
                                <?php foreach ( $menu_item->children as $key => $child_item ) : ?>
                                  <li class="w-full mb-5 last:mb-0 primary-menu-child-item">
                                    <<?php echo $child_item->has_children ? 'button' : 'a'; ?> class="text-xl lg:text-base flex items-center justify-between w-full duration-300 ease-in-out hdg-5 primary-nav-trigger <?php echo $child_item->has_children && $key === 0 ? 'secondary__child-menu-first' : ''; ?>"
                                      <?php if( $child_item->has_children ) : ?>
                                        data-toggle-class="is-open"
                                        data-toggle-target="#menu-<?php echo $child_item->ID; ?>"
                                        aria-expanded="false"
                                        data-toggle-group="child-menu-accordions"
                                        id="item-<?php echo $child_item->ID; ?>"
                                        <?php else : ?>
                                        href="<?php echo $child_item->url ?>"
                                        target="<?php echo $child_item->target; ?>"
                                      <?php endif; ?>>

                                      <?php echo $child_item->title; ?>
                                      <?php echo $child_item->has_children ? '<svg class="duration-300 ease-in-out icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>' : ''; ?>
                                    </<?php echo $child_item->has_children ? 'button' : 'a'; ?>>
                                    <?php if( $child_item->has_children ) : ?>
                                      <ul id="menu-<?php echo $child_item->ID; ?>" class="grandchild-menu">
                                        <?php foreach( $child_item->children as $grandchild_item ) : ?>
                                          <li class="grandchild-menu-item">
                                            <a class="duration-200 ease-in-out hover:text-brand-medium-gray <?php echo $grandchild_item->fields['primary_nav_options']; ?>" href="<?php echo $grandchild_item->url; ?>" target="<?php echo $grandchild_item->target; ?>">
                                              <?php echo $grandchild_item->title; ?>
                                            </a>
                                          </li>
                                        <?php endforeach; ?>
                                      </ul>
                                    <?php endif; ?>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                              <div class="hidden contact-information lg:block">
                                <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
                                  <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="flex mb-5 w-fit text-brand-medium-gray group hover:underline">
                                    <svg class='w-6 h-6 mr-6 icon icon-phone text-brand-medium-gray'><use xlink:href='#icon-phone'></use></svg>
                                    <span class="duration-200 ease-in-out text-brand-medium-gray group-hover:underline">
                                      <?php echo get_field('contact_phone_number', 'option'); ?>
                                    </span>
                                  </a>
                                <?php endif; ?>
                                <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
                                  <?php $address_url = get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>

                                  <a class='flex mb-5 w-fit text-brand-medium-gray group hover:underline' href='https://www.google.com/maps/place/<?php echo $address_url; ?>' target='_blank'>
                                    <svg class='w-6 h-6 mr-6 icon icon-location-pin'><use xlink:href='#icon-location-pin'></use></svg>
                                    <span class="block duration-200 ease-in-out group-hover:text-brand-white text-brand-medium-gray group-hover:underline">
                                      <div><?php echo get_field('contact_street_address', 'options');?></div>
                                      <div><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></div>
                                    </span>
                                  </a>
                                <?php endif; ?>
                                <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
                                  <div class="flex w-fit">
                                    <svg class='flex-shrink-0 w-6 h-6 mr-6 icon icon-clock text-brand-medium-gray'><use xlink:href='#icon-clock'></use></svg>
                                    <span class="text-brand-medium-gray">
                                      <?php echo get_field('navigation_hours_title', 'option') ?? ''; ?></br>
                                      <?php echo get_field('navigation_hours', 'option'); ?>
                                    </span>
                                  </div>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                </ul>

              <?php endif; ?>
            </div>

            <div class="block pb-8 mt-10 lg:hidden contact-information">
              <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
                <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="flex mb-5 w-fit text-brand-medium-gray group hover:underline">
                  <svg class='w-6 h-6 mr-6 icon icon-phone text-brand-medium-gray'><use xlink:href='#icon-phone'></use></svg>
                  <span class="duration-200 ease-in-out text-brand-medium-gray group-hover:text-brand-white">
                    <?php echo get_field('contact_phone_number', 'option'); ?>
                  </span>
                </a>
              <?php endif; ?>
              <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
                <?php $address_url = get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>

                <a class='flex mb-5 w-fit text-brand-medium-gray group' href='https://www.google.com/maps/place/<?php echo $address_url; ?>' target='_blank'>
                  <svg class='w-6 h-6 mr-6 icon icon-location-pin'><use xlink:href='#icon-location-pin'></use></svg>
                  <span class="block duration-200 ease-in-out group-hover:text-brand-white text-brand-medium-gray group-hover:underline">
                    <div><?php echo get_field('contact_street_address', 'options');?></div>
                    <div><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></div>
                  </span>
                </a>
              <?php endif; ?>
              <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
                <div class="flex w-fit">
                  <svg class='flex-shrink-0 w-6 h-6 mr-6 icon icon-clock text-brand-medium-gray'><use xlink:href='#icon-clock'></use></svg>
                  <span class="text-brand-medium-gray">
                    <?php echo get_field('navigation_hours_title', 'option') ?? ''; ?></br>
                    <?php echo get_field('navigation_hours', 'option'); ?>
                  </span>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </nav>

        <?php if ( get_field('nav_event_calendar_link','option') ) : ?>
          <div class="hidden primary-menu-item lg:block">
            <a class="inline-block text-sm md:mr-16 lg:mr-8 primary-nav-trigger xl:mr-16 nav-link focus-offset xl:text-base" href="<?php echo get_field('nav_event_calendar_link','option')['url']; ?>" <?php echo get_field('nav_event_calendar_link','option')['target'] ? 'target="' . get_field('nav_event_calendar_link','option')['target'] . '"' : '' ?>>
              <?php echo get_field('nav_event_calendar_link','option')['title']; ?>
              <?php if(get_field('nav_event_calendar_link','option')['target'] === '_blank') : ?>
                <span class="sr-only"> (opens in new tab)</span>
              <?php endif; ?>
            </a>
          </div>
        <?php endif; ?>

        <button type="button" class="hidden lg:block navbar-toggle primary-nav-trigger" data-toggle-class="is-open" data-toggle-group="menu-accordions" data-toggle-target="#resources-menu">
          <span class="navbar-toggle-icon"></span>
          <span class="sr-only">Main Menu</span>
        </button>
      </div>
    </div>
  </div>
  <!-- RESOURCE MENU -->
  <?php if ( $resources_menu->items ) : ?>
    <div class="child-menu-panel" id="resources-menu" aria-hidden="true">
      <div class="flex justify-between h-full">
        <div class="relative child-menu-panel__left">
          <button class="absolute inset-0 w-full h-full cursor-default" data-toggle-trigger-off="#resources-menu"></button>
          <button class="hidden btn-menu-close md:flex" data-toggle-trigger-off="#resources-menu">
            <svg class='w-6 h-6 icon icon-close'><use xlink:href='#icon-close'></use></svg>
          </button>
        </div>
        <div class="flex flex-col justify-between child-menu-panel__right">
          <nav role="navigation" aria-label="Resources Navigation">
            <ul class="relative pl-5 mb-5 right-panel__child-menu lg:pl-0 lg:mb-0">
              <?php foreach ( $resources_menu->items as $key => $child_item ) : ?>
                <li class="w-full mb-5 last:mb-0 primary-menu-child-item">
                  <<?php echo $child_item->has_children ? 'button' : 'a'; ?> class="text-xl lg:text-base flex items-center justify-between w-full duration-300 ease-in-out hdg-5 primary-nav-trigger <?php echo $child_item->has_children && $key === 0 ? 'resources__child-menu-first' : ''; ?>"
                    <?php if( $child_item->has_children ) : ?>
                      data-toggle-class="is-open"
                      data-toggle-target="#menu-<?php echo $child_item->ID; ?>"
                      aria-expanded="false"
                      data-toggle-group="resources__child-menu-accordions"
                      id="item-<?php echo $child_item->ID; ?>"
                      <?php else : ?>
                      href="<?php echo $child_item->url ?>"
                      target="<?php echo $child_item->target; ?>"
                    <?php endif; ?>>
                    <?php echo $child_item->title; ?>
                    <?php echo $child_item->has_children ? '<svg class="duration-300 ease-in-out icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>' : ''; ?>
                  </<?php echo $child_item->has_children ? 'button' : 'a'; ?>>
                  <?php if( $child_item->has_children ) : ?>
                    <ul id="menu-<?php echo $child_item->ID; ?>" class="grandchild-menu">
                      <?php foreach( $child_item->children as $grandchild_item ) : ?>
                        <li class="grandchild-menu-item">
                          <a class="duration-200 ease-in-out hover:text-brand-medium-gray <?php echo $grandchild_item->fields['primary_nav_options'] ?? ''; ?>" href="<?php echo $grandchild_item->url; ?>" target="<?php echo $grandchild_item->target; ?>">
                            <?php echo $grandchild_item->title; ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>
          <div class="contact-information">
            <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
              <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="flex mb-5 w-fit hover:underline text-brand-medium-gray">
                <svg class='w-6 h-6 mr-6 icon icon-phone text-brand-medium-gray'><use xlink:href='#icon-phone'></use></svg>
                <span class="text-brand-medium-gray">
                  <?php echo get_field('contact_phone_number', 'option'); ?>
                </span>
              </a>
            <?php endif; ?>
            <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
              <?php $address_url = get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>
              <a class='flex mb-5 w-fit text-brand-medium-gray group-hover:underline hover:underline' href='https://www.google.com/maps/place/<?php echo $address_url; ?>' target='_blank'>
                <svg class='w-6 h-6 mr-6 icon icon-location-pin'><use xlink:href='#icon-location-pin'></use></svg>
                <span>
                  <div><?php echo get_field('contact_street_address', 'options');?></div>
                  <div><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></div>
                </span>
              </a>
            <?php endif; ?>
            <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
              <div class="flex w-fit">
                <svg class='flex-shrink-0 w-6 h-6 mr-6 icon icon-clock text-brand-medium-gray'><use xlink:href='#icon-clock'></use></svg>
                <span class="text-brand-medium-gray">
                  <?php echo get_field('navigation_hours_title', 'option') ?? ''; ?></br>
                  <?php echo get_field('navigation_hours', 'option'); ?>
                </span>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</header>
<!-- STICKY LINK -->
<?php if ( get_field('event_planning_tool_link','option') && get_page_template_slug() !== 'templates/template-event-planning-tool.php' ) : ; ?>
  <div class="hidden event-sticky-link md:block">
    <a class="flex ll-focus-gold" href="<?php echo get_field('event_planning_tool_link','option')['url']; ?>" <?php echo get_field('event_planning_tool_link','option')['target'] ? 'target="' . get_field('event_planning_tool_link','option')['target'] . '"' : '' ?>>
      <div class="flex items-center justify-center bg-brand-gold visible-link">
        <svg class='w-10 h-10 icon icon-event-planning-tool text-brand-white'><use xlink:href='#icon-event-planning-tool'></use></svg>
      </div>
      <div class="px-4 py-5 uppercase btn text-brand-gold bg-brand-white hidden-link">
        <?php echo get_field('event_planning_tool_link','option')['title']; ?>
      </div>
      <?php if(get_field('event_planning_tool_link','option')['target'] === '_blank') : ?>
        <span class="sr-only"> (opens in new tab)</span>
      <?php endif; ?>
    </a>
  </div>
<?php endif; ?>
