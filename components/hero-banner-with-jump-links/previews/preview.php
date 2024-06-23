<?php 
$component_data['image_id'] = 23; 
$component_data['image_focus_point'] = 'object-center'; 
$component_data['image_fit'] = 'object-cover'; 
$component_data['image_loading'] = true; 
$component_data['looping_video_url'] = ''; 
$component_data['keyword_heading'] = array (
  'tag' => 'h2',
  'text' => 'Hero Banner with Jump Links Keyword',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Hero Banner with Jump Links Heading',
); 
$component_data['button'] = array (
  'title' => 'Hero Banner with Jump Links Button',
  'url' => '#',
  'target' => '',
); 
$component_data['jump_links'] = array (
  0 => 
  array (
    'text' => 'Jump Link Text',
    'link' => 'https://www.opcc.local/#stuff',
  ),
  1 => 
  array (
    'text' => 'Text',
    'link' => 'https://www.opcc.local/#stuff',
  ),
  2 => 
  array (
    'text' => 'Jump',
    'link' => 'https://www.opcc.local/#stuff',
  ),
  3 => 
  array (
    'text' => 'Link',
    'link' => 'https://www.opcc.local/#stuff',
  ),
); 
?>
<?php ll_include_component('hero-banner-with-jump-links', $component_data, array("classes"=>array(),"id"=>"") );?>