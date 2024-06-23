<?php
/*
Template Name: Event Planning Tool
*/
?>
<header class="border-b bg-brand-white event-planning-tool__nav border-brand-light-gray">
  <div class="container relative flex items-center justify-end h-full">

    <div class="absolute back-button-wrapper">
      <button class="flex items-center font-semibold uppercase font-xs lg:font-normal llgq-quoter-back is-inactive text-brand-black">
        <svg class='w-4 h-4 mr-3 duration-300 ease-in-out transform rotate-180 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
        <span>back</span>
      </button>
    </div>

    <div class="absolute flex items-center w-[30%] font-semibold text-center uppercase transform -translate-x-1/2 -translate-y-1/2 justify-center lg:text-left font-xs lg:font-normal text-brand-black top-1/2 left-1/2 track-wide">
      <svg class="flex-shrink-0 hidden w-5 h-5 ml-4 mr-4 lg:block lg:w-10 lg:h-10 lg:ml-0 lg:mr-6 icon icon-event-planning-tool"><use xlink:href="#icon-event-planning-tool"></use></svg>
      <?php echo get_the_title(); ?>
    </div>

    <a href="<?php echo home_url(); ?>" class="text-brand-gray hover:text-brand-black">
      <svg class='w-5 h-5 icon icon-close'><use xlink:href='#icon-close'></use></svg>
    </a>

  </div>
</header>

<section class="event-planning-tool__body">
  <div class="container pt-10 lg:pt-20">
    <?php echo gravity_form( get_field('event_planning_tool_form_id'), false, false, false, null, true ); ?>
  </div>
</section>

<footer class="bottom-0 left-0 w-full lg:absolute event-planning-tool__footer">
  <div class="py-4 lg:py-8 bg-brand-beige">
    <div class="container">
      <div class="flex items-center justify-center">
        <div class="hidden font-semibold paragraph-default text-brand-gray lg:flex">
          <div id="llgq-progress-event-information" class="mr-20 active last:mr-0 llgq-progress">
            Event Information
          </div>
          <div id="llgq-progress-time-and-date" class="mr-20 last:mr-0 llgq-progress">
            Time and Date
          </div>
          <div id="llgq-progress-additional-needs" class="mr-20 last:mr-0 llgq-progress">
            Additional Needs
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
