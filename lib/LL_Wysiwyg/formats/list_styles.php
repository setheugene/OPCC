<?php

LL_Wysiwyg()->add_format( array(
  'title' => 'List Styles',
  'items' => array(
    array(
      'title'    => 'Line Separated List',
      'classes'  => 'line-list',
      'selector' => 'ul, ol',
      'wrapper'  => false,
    ),
  )
) );
