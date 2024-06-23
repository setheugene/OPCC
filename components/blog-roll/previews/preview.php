<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Blog Posts',
); 
$component_data['show'] = 'recent'; 
$component_data['category'] = NULL; 
$component_data['posts'] = NULL; 
?>
<?php ll_include_component('blog-roll', $component_data, array("classes"=>array(),"id"=>"") );?>