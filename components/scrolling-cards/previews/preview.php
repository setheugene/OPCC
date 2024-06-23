<?php 
$component_data['keyword_heading'] = array (
  'tag' => 'h2',
  'text' => 'Scrolling Cards Keyword',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Scrolling Cards Heading',
); 
$component_data['cards'] = array (
  0 => 
  array (
    'image_image_id' => 750,
    'image_image_focus_point' => 'object-center',
    'image_image_fit' => 'object-cover',
    'image_image_loading' => true,
    'title' => 'Card title',
    'description' => 'Card description',
    'link' => 
    array (
      'title' => 'Link Text',
      'url' => '#',
      'target' => '',
    ),
  ),
  1 => 
  array (
    'image_image_id' => 749,
    'image_image_focus_point' => 'object-center',
    'image_image_fit' => 'object-cover',
    'image_image_loading' => true,
    'title' => 'Card title',
    'description' => 'Card description Card description Card description',
    'link' => 
    array (
      'title' => 'Linkage',
      'url' => '#',
      'target' => '',
    ),
  ),
); 
?>
<?php ll_include_component('scrolling-cards', $component_data, array("classes"=>array(),"id"=>"") );?>