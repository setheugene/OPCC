<div class="relative overflow-hidden single-team-page bg-brand-white" data-component="single-team">
  <div class="container">
    <div class="row">
      <div class="order-2 w-full col lg:w-7/12 single-team__left-column lg:order-1">
        <?php if( !empty(get_post_thumbnail_id()) ) : ?>
          <div class="relative justify-center py-12 lg:py-16 row single-team__headshot">
            <div class="w-full lg:w-7/12 col">
              <div class="relative aspect-3/4">
                <?php
                  ll_include_component(
                    'fit-image',
                    array(
                      'image_id' => get_post_thumbnail_id(),
                      'thumbnail_size' => 'large',
                      'position' => '',
                      'fit' =>  '',
                      'loading' => ''
                    )
                  );
                ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="mt-12 mb-12 wysiwyg lg:mt-16 js-slide-group">
          <?php echo get_field('team_bio') ?? ''; ?>
        </div>
        <?php if( !empty(get_field('team_member_form_id')) ) : ?>
          <hr class="mb-12 border-brand-light-gray">
          <div class="single-team__form-column">
            <?php if( get_field('team_member_contact_form_heading')['heading'] && get_field('team_member_contact_form_heading')['heading']['text']) : ?>
              <<?php echo get_field('team_member_contact_form_heading')['heading']['tag']; ?> class='mb-8 text-center uppercase hdg-4 text-brand-eggplant'><?php echo get_field('team_member_contact_form_heading')['heading']['text']; ?></<?php echo get_field('team_member_contact_form_heading')['heading']['tag']; ?>>
            <?php endif; ?>
            <?php echo gravity_form( get_field('team_member_form_id'), false, false, false, null, true ); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="order-1 w-full col lg:w-5/12 lg:order-2 team__right-column">
        <div class="px-12 pt-12 pb-12 sticky-card bg-brand-beige lg:pt-16 lg:pb-16 lg:px-16 js-slide-group">
          <a class="flex items-center mb-8 text-base w-fit btn text-brand-gray single-team__back-btn" href="<?php echo get_the_permalink(get_field( 'page_for_team', 'option' )); ?>">
            <svg class='w-6 h-6 mr-3 transform rotate-180 icon icon-arrow'><use xlink:href='#icon-arrow'></use></svg>
            back to team
          </a>
          <div class="mb-3 hdg-4 text-brand-black">
            <?php echo get_the_title(); ?>
          </div>
          <?php if( !empty(get_field('team_position')) ) : ?>
            <div class="mb-4 paragraph-default text-brand-gray">
              <?php the_field('team_position'); ?>
            </div>
          <?php endif; ?>
          <?php if( !empty(get_field('team_phone')) ) : ?>
            <div class="flex py-5 border-t border-brand-light-gray">
              <svg class='w-6 h-6 mr-3 icon text-brand-gray icon-phone'><use xlink:href='#icon-phone'></use></svg>
              <div class="flex flex-col">
                <div class="mb-2 paragraph-default text-brand-gray">
                  Phone
                </div>
                <div class="font-semibold text-brand-black">
                  <a class="secondary-btn black" href="tel:<?php echo strip_phone(get_field('team_phone')); ?>">
                    <?php the_field('team_phone'); ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php if( !empty(get_field('team_member_facts')) ) : ?>
            <?php foreach( get_field('team_member_facts') as $fact ) : ?>
              <div class="flex py-5 border-t border-brand-light-gray">
                <svg class='icon h-6 w-6 text-brand-gray mr-3 icon-<?php echo $fact['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $fact['svg_icon'] ?>'></use></svg>
                <div class="flex flex-col">
                  <div class="mb-2 paragraph-default text-brand-gray">
                    <?php echo $fact['title'] ?? ''; ?>
                  </div>
                  <div class="font-semibold text-brand-black">
                    <?php echo $fact['description'] ?? ''; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
