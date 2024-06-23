<?php 
$component_data['sections'] = array (
  0 => 
  array (
    'category_image_image_id' => 818,
    'category_image_image_focus_point' => 'object-center',
    'category_image_image_fit' => 'object-cover',
    'category_image_image_loading' => true,
    'category_name' => 'Dessert',
    'menu_items_section' => 
    array (
      0 => 
      array (
        'sub_category' => true,
        'sub_category_title' => 'Sub-category Title',
        'sub_category_description' => 'Sub-category Description Sub-category Description Sub-category Description Sub-category Description Sub-category Description Sub-category Description
',
        'menu_items' => 
        array (
          0 => 
          array (
            'menu_item_name' => 'Menu Item Name',
            'menu_item_price' => '55',
            'menu_item_description' => 'Menu Item Description Menu Item Description Menu Item Description Menu Item Description Menu Item Description',
          ),
        ),
        'sub_category_disclaimer' => 'Disclaimer Text',
      ),
    ),
  ),
); 
?>
<?php ll_include_component('menu', $component_data, array("classes"=>array(),"id"=>"") );?>