<?php
/**
* Clickable Amenities
* -----------------------------------------------------------------------------
*
* Clickable Amenities component
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
<section class="clickable-amenities bg-brand-beige relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="clickable-amenities">
  <div class="clickable-amenities__top-spacer"></div>
  <div class="clickable-amenities__bg-image-wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/amenities-building.png" alt="black and white image of the outside of the overland park convention center building">
  </div>
  <div class="z-20 clickable-amenities__content-wrapper">
    <div class="container">
      <div class="row">
        <div class="w-full col lg:w-5/12 js-slide-group">
          <?php if( $component_data['heading'] && $component_data['heading']['text']) : ?>
            <<?php echo $component_data['heading']['tag']; ?> class='hdg-3 mb-[10px] text-brand-eggplant'><?php echo $component_data['heading']['text']; ?></<?php echo $component_data['heading']['tag']; ?>>
          <?php endif; ?>
          <div class="w-10/12 paragraph-default text-brand-gray lg:w-full">
            <?php echo $component_data['description'] ?? ''; ?>
          </div>
        </div>

        <div class="relative block w-full h-full pt-8 lg:hidden col">
          <?php if( $component_data['first'] ) : ?>
            <div class="flex flex-col items-center justify-center w-full p-4 clickable-amenities__mobile bg-brand-white">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['first']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['first']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['first']['title'] ?? ''; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if( $component_data['second'] ) : ?>
            <div class="flex flex-col items-center justify-center w-full p-4 clickable-amenities__mobile bg-brand-white">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['second']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['second']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['second']['title'] ?? ''; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if( $component_data['third'] ) : ?>
            <div class="flex flex-col items-center justify-center w-full p-4 clickable-amenities__mobile bg-brand-white">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['third']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['third']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['third']['title'] ?? ''; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if( $component_data['fourth'] ) : ?>
            <div class="flex flex-col items-center justify-center w-full p-4 clickable-amenities__mobile bg-brand-white">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['fourth']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['fourth']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['fourth']['title'] ?? ''; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if( $component_data['fifth'] ) : ?>
            <div class="flex flex-col items-center justify-center w-full p-4 clickable-amenities__mobile bg-brand-white">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['fifth']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['fifth']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['fifth']['title'] ?? ''; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
  <div class="z-30 clickable-amenities__pins-wrapper">
    <div class="container relative z-10 hidden h-full lg:block">
      <?php if( $component_data['first'] ) : ?>
        <div class="first clickable-amenities__pin">
          <div class="relative">
            <button class="flex items-center justify-center clickable-amenities__button" data-toggle-group="clickable-amenities-pins" data-toggle-target="#clickable-amenities__pin-one" data-toggle-class="is-open" data-toggle-outside data-toggle-event="mouseover">
              <svg class='w-3 h-3 icon text-brand-black icon-plus'><use xlink:href='#icon-plus'></use></svg>
            </button>
            <div id="clickable-amenities__pin-one" class="clickable-amenities__pin-tooltip">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['first']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['first']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['first']['title'] ?? ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if( $component_data['second'] ) : ?>
        <div class="second clickable-amenities__pin">
          <div class="relative">
            <button class="flex items-center justify-center clickable-amenities__button" data-toggle-group="clickable-amenities-pins" data-toggle-target="#clickable-amenities__pin-two" data-toggle-class="is-open" data-toggle-outside data-toggle-event="mouseover">
              <svg class='w-3 h-3 icon text-brand-black icon-plus'><use xlink:href='#icon-plus'></use></svg>
            </button>
            <div id="clickable-amenities__pin-two" class="clickable-amenities__pin-tooltip">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['second']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['second']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['second']['title'] ?? ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if( $component_data['third'] ) : ?>
        <div class="third clickable-amenities__pin">
          <div class="relative">
            <button class="flex items-center justify-center clickable-amenities__button" data-toggle-group="clickable-amenities-pins" data-toggle-target="#clickable-amenities__pin-three" data-toggle-class="is-open" data-toggle-outside data-toggle-event="mouseover">
              <svg class='w-3 h-3 icon text-brand-black icon-plus'><use xlink:href='#icon-plus'></use></svg>
            </button>
            <div id="clickable-amenities__pin-three" class="clickable-amenities__pin-tooltip">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['third']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['third']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['third']['title'] ?? ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if( $component_data['fourth'] ) : ?>
        <div class="fourth clickable-amenities__pin">
          <div class="relative">
            <button class="flex items-center justify-center clickable-amenities__button" data-toggle-group="clickable-amenities-pins" data-toggle-target="#clickable-amenities__pin-four" data-toggle-class="is-open" data-toggle-outside data-toggle-event="mouseover">
              <svg class='w-3 h-3 icon text-brand-black icon-plus'><use xlink:href='#icon-plus'></use></svg>
            </button>
            <div id="clickable-amenities__pin-four" class="clickable-amenities__pin-tooltip">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['fourth']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['fourth']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['fourth']['title'] ?? ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if( $component_data['fifth'] ) : ?>
        <div class="fifth clickable-amenities__pin">
          <div class="relative">
            <button class="flex items-center justify-center clickable-amenities__button" data-toggle-group="clickable-amenities-pins" data-toggle-target="#clickable-amenities__pin-five" data-toggle-class="is-open" data-toggle-outside data-toggle-event="mouseover">
              <svg class='w-3 h-3 icon text-brand-black icon-plus'><use xlink:href='#icon-plus'></use></svg>
            </button>
            <div id="clickable-amenities__pin-five" class="clickable-amenities__pin-tooltip">
              <svg class='icon h-5 w-5 text-brand-gold icon-<?php echo $component_data['fifth']['svg_icon'] ?>'><use xlink:href='#icon-<?php echo $component_data['fifth']['svg_icon'] ?>'></use></svg>
              <div class="font-semibold text-brand-black paragraph-default">
                <?php echo $component_data['fifth']['title'] ?? ''; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
