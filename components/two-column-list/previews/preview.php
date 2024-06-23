<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Two Col List Heading',
); 
$component_data['lists'] = array (
  0 => 
  array (
    'title' => 'list title',
    'list_items' => 
    array (
      0 => 
      array (
        'list_item' => 'List item',
      ),
      1 => 
      array (
        'list_item' => 'List item',
      ),
      2 => 
      array (
        'list_item' => 'List item',
      ),
    ),
  ),
  1 => 
  array (
    'title' => 'list title',
    'list_items' => 
    array (
      0 => 
      array (
        'list_item' => 'List item',
      ),
      1 => 
      array (
        'list_item' => 'List item',
      ),
      2 => 
      array (
        'list_item' => 'List item',
      ),
      3 => 
      array (
        'list_item' => 'List item',
      ),
    ),
  ),
); 
?>
<?php ll_include_component('two-column-list', $component_data, array("classes"=>array(),"id"=>"") );?>