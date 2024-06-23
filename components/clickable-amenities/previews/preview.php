<?php 
$component_data[''] = NULL; 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Clickable Amenities Heading',
); 
$component_data['description'] = 'Clickable Amenities Description'; 
$component_data[''] = NULL; 
$component_data['first'] = array (
  'svg_icon' => 'electric',
  'title' => 'Pin One',
); 
$component_data['second'] = array (
  'svg_icon' => 'convention',
  'title' => 'Pin Two',
); 
$component_data['third'] = array (
  'svg_icon' => 'filled-map-pin',
  'title' => 'Pin Three',
); 
$component_data['fourth'] = array (
  'svg_icon' => 'parking',
  'title' => 'Pin Four',
); 
$component_data['fifth'] = array (
  'svg_icon' => 'globe-website',
  'title' => 'Pin Five',
); 
?>
<?php ll_include_component('clickable-amenities', $component_data, array("classes"=>array(),"id"=>"") );?>