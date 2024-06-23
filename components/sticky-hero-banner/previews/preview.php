<?php 
$component_data[''] = NULL; 
$component_data['sticky_content_items'] = array (
  0 => 
  array (
    'svg_icon' => 'checkmark',
    'title' => 'Check',
    'content' => '<p>Content goes here</p>
',
  ),
  1 => 
  array (
    'svg_icon' => 'meeting-conference',
    'title' => 'Title',
    'content' => '<p>Content goes here Content goes here Content goes here Content goes here</p>
',
  ),
); 
$component_data['sticky_content_button'] = array (
  'title' => 'Link',
  'url' => '#',
  'target' => '',
); 
$component_data[''] = NULL; 
$component_data['image_slider_keyword_heading'] = array (
  'tag' => 'h2',
  'text' => 'Keyword Heading<br />
',
); 
$component_data['image_slider_heading_heading'] = array (
  'tag' => 'h2',
  'text' => 'Heading',
); 
$component_data['image_slider_images'] = array (
  0 => 
  array (
    'image_id' => 750,
    'image_focus_point' => 'object-center',
    'image_fit' => 'object-cover',
    'image_loading' => true,
  ),
); 
$component_data[''] = NULL; 
$component_data['content'] = array (
  0 => 
  array (
    'acf_fc_layout' => 'one_column_wysiwyg',
    'heading' => 
    array (
      'tag' => 'h2',
      'text' => 'Heading',
    ),
    'content' => '<p>finibus accumsan quam. Aenean suscipit vel nunc in lacinia. Aliquam cursus augue vel ex consequat lobortis. Vestibulum ullamcorper justo quis purus pulvinar tristique. Ut eget sapien fermentum, eleifend dui nec, tincidunt ex. Phasellus nisi nisl, dapibus sit amet ipsum quis, rutrum lacinia</p>
',
  ),
  1 => 
  array (
    'acf_fc_layout' => 'single_image',
    'image_id' => 795,
    'image_focus_point' => 'object-center',
    'image_fit' => 'object-cover',
    'image_loading' => true,
  ),
); 
?>
<?php ll_include_component('sticky-hero-banner', $component_data, array("classes"=>array(),"id"=>"") );?>