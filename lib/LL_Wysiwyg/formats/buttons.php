<?php

LL_Wysiwyg()->add_format( array(
  'title' => 'Buttons & Links',
  'items' => array(
    array(
      'title'    => 'Primary Button - Black',
      'classes'  => 'primary-btn black',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-span' => "true"
      )
    ),
    array(
      'title'    => 'Primary Button - White',
      'classes'  => 'primary-btn white',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-span' => "true"
      )
    ),
    array(
      'title'    => 'Secondary Button - Gold',
      'classes'  => 'secondary-btn gold',
      'selector' => 'a',
      'wrapper'  => false
    ),
    array(
      'title'    => 'Secondary Button - White',
      'classes'  => 'secondary-btn white',
      'selector' => 'a',
      'wrapper'  => false
    ),
    array(
      'title' => 'Button Group',
      'classes' => 'btn-group',
      'wrapper' => true,
      'block' => 'div',
    )
  )
) );
