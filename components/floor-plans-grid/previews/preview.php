<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'ballroom floorplans',
); 
$component_data['description'] = 'Click to expand each ballroom floorplan image.'; 
$component_data['download_link_text'] = 'Download floorplans'; 
$component_data['downloadable_file'] = 'http://opcc.local/wp-content/uploads/2023/10/sample.pdf'; 
$component_data['floor_plans'] = array (
  0 => 632,
  1 => 638,
  2 => 637,
  3 => 628,
  4 => 635,
); 
$component_data['cta_card'] = array (
  'svg_icon' => 'floorplan',
  'title' => 'Interested in a custom floor plan for your event?',
  'description' => 'Contact our award-winning event planning team today to get started.',
  'link' => 
  array (
    'title' => 'Contact Us',
    'url' => '#',
    'target' => '',
  ),
); 
?>
<?php ll_include_component('floor-plans-grid', $component_data, array("classes"=>array(),"id"=>"") );?>