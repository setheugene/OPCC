<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Contact Form Heading',
); 
$component_data['description'] = 'Contact Form Description'; 
$component_data['contact_info'] = true; 
$component_data['ctas'] = array (
  0 => 
  array (
    'title' => 'CTA Title',
    'description' => 'CTA Description',
    'link' => 
    array (
      'title' => 'CTA Link',
      'url' => '#',
      'target' => '',
    ),
  ),
); 
$component_data['form_id'] = '1'; 
?>
<?php ll_include_component('contact-form', $component_data, array("classes"=>array(),"id"=>"") );?>