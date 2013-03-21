<?php
/**
 * @package foodmenu
 */
$xpdo_meta_map['FoodMenuCategory']= array (
  'package' => 'foodmenu',
  'version' => NULL,
  'table' => 'foodmenu_categories',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'position' => NULL,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'position' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
    ),
  ),
  'composites' => 
  array (
    'Dishes' => 
    array (
      'class' => 'FoodMenuDish',
      'local' => 'id',
      'foreign' => 'category',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);
