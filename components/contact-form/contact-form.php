<?php
/**
* Contact Form
* -----------------------------------------------------------------------------
*
* Contact Form component
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
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="contact-form bg-brand-beige py-16 lg:pt-22 lg:pb-20 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="contact-form">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-10/12">
        <div class="mb-10 lg:mb-16">
          <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
            <<?php echo $component_data['heading']['tag']; ?> class='mb-3 js-slide hdg-2 text-brand-black'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
          <?php endif; ?>
          <?php if( $component_data['description'] ) : ?>
            <div class="paragraph-large text-brand-gray">
              <?php echo $component_data['description']; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col w-full md:w-[70%] mb-10 lg:mb-0">
            <div class="p-5 lg:p-12 bg-brand-white">
              <?php echo gravity_form( $component_data['form_id'], false, false, false, null, true ); ?>
            </div>
          </div>
          <div class="col w-full md:w-[30%]">
            <ul>
              <?php if( get_field('contact_street_address', 'option') ?? null && get_field('contact_city', 'option') ?? null && get_field('contact_state', 'option') ?? null && get_field('contact_zip', 'option') ?? null ) : ?>
                <?php $address_url = get_field('gmb_link', 'options') != '' ? get_field('gmb_link', 'options') : 'https://www.google.com/maps/place/' . get_field( 'contact_street_address', 'options' ) . ' '. get_field( 'contact_city', 'options' ). ', ' . get_field( 'contact_state', 'options' ) . ' ' . get_field( 'contact_zip', 'options' );  ?>
                <li class="flex mb-3 last:mb-0">
                  <svg class="flex-shrink-0 w-6 h-6 mr-3 icon icon-location-pin text-brand-gold"><use xlink:href="#icon-location-pin"></use></svg>
                  <a class='flex flex-col underline duration-200 ease-in-out contact-form__contact-info-link text-brand-black ll-focus-black' href='<?php echo $address_url; ?>' target='_blank'>
                    <span><?php echo get_field('contact_street_address', 'options');?></span>
                    <span><?php echo get_field( 'contact_city', 'options' ) ?>, <?php echo get_field( 'contact_state', 'options' );?> <?php echo get_field( 'contact_zip', 'options' ); ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if( !empty(get_field('contact_phone_number', 'option')) ) : ?>
                <li class="flex mb-3 last:mb-0">
                  <svg class="flex-shrink-0 w-6 h-6 mr-3 icon icon-phone text-brand-gold"><use xlink:href="#icon-phone"></use></svg>
                  <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>" class="underline duration-200 ease-in-out contact-form__contact-info-link ll-focus-black text-brand-black">
                    <?php echo get_field('contact_phone_number', 'option'); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if( !empty(get_field('navigation_hours', 'option')) ) : ?>
                <li class="flex mb-3 last:mb-0">
                  <svg class="flex-shrink-0 w-6 h-6 mr-3 text-brand-gold icon icon-clock"><use xlink:href="#icon-clock"></use></svg>
                  <div class="text-brand-black">
                    <?php echo get_field('navigation_hours', 'option'); ?>
                  </div>
                </li>
              <?php endif; ?>
            </ul>
            <?php if( !empty($component_data['ctas']) ) : ?>
              <?php foreach( $component_data['ctas'] as $cta ) : ?>
                <div class="mt-12 mb-3 font-semibold paragraph-default text-brand-black">
                  <?php echo $cta['title'] ?? ''; ?>
                </div>
                <div class="mb-5 paragraph-default text-brand-gray">
                  <?php echo $cta['description'] ?? ''; ?>
                </div>
                <?php if ( $cta['link'] ) : ?>
                  <a class="flex items-center justify-between w-full secondary-btn gray" href="<?php echo $cta['link']['url']; ?>" <?php echo $cta['link']['target'] ? 'target="' . $cta['link']['target'] . '"' : '' ?>>
                    <?php echo $cta['link']['title']; ?>
                    <?php if($cta['link']['target'] === '_blank') : ?>
                      <span class="sr-only"> (opens in new tab)</span>
                    <?php endif; ?>
                    <svg class='w-6 h-6 icon icon-arrow text-brand-gray'><use xlink:href='#icon-arrow'></use></svg>
                  </a>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
