<?php 
$component_data['content'] = '<p>Three Column Images content Nulla a elementum magna, nec viverra ex. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis dui urna, tempus id pellentesque id, maximus nec ex. Suspendisse ac tristique orci. Integer id risus accumsan, consequat turpis ut, dignissim elit. Donec sem purus, gravida sed quam nec, finibus accumsan quam. Aenean suscipit vel nunc in lacinia. Aliquam cursus augue vel ex consequat lobortis. Vestibulum ullamcorper justo quis purus pulvinar tristique. Ut eget sapien fermentum, eleifend dui nec, tincidunt ex. Phasellus nisi nisl, dapibus sit amet ipsum quis, rutrum lacinia libero. Duis porttitor, dolor vel consequat fermentum, dolor urna fermentum orci, sit amet tristique odio nibh a metus.</p>
'; 
$component_data['columns'] = array (
  0 => 
  array (
    'image_id' => 750,
    'image_focus_point' => 'object-center',
    'image_fit' => 'object-cover',
    'image_loading' => true,
    'link' => 
    array (
      'title' => 'Link',
      'url' => '#',
      'target' => '',
    ),
  ),
  1 => 
  array (
    'image_id' => 748,
    'image_focus_point' => 'object-center',
    'image_fit' => 'object-cover',
    'image_loading' => true,
    'link' => 
    array (
      'title' => 'Link Text',
      'url' => '#',
      'target' => '',
    ),
  ),
  2 => 
  array (
    'image_id' => 12,
    'image_focus_point' => 'object-center',
    'image_fit' => 'object-cover',
    'image_loading' => true,
    'link' => 
    array (
      'title' => 'Link',
      'url' => '#',
      'target' => '',
    ),
  ),
); 
?>
<?php ll_include_component('three-column-images', $component_data, array("classes"=>array(),"id"=>"") );?>