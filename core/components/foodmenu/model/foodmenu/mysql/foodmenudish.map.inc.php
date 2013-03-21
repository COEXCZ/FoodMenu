<?php
/**
 * @package foodmenu
 */
$xpdo_meta_map['FoodMenuDish']= array (
  'package' => 'foodmenu',
  'version' => NULL,
  'table' => 'foodmenu_dishes',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'category' => 0,
    'description' => NULL,
    'price' => NULL,
    'weight' => NULL,
    'tip' => 0,
    'image' => '',
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
    'category' => 
    array (
      'dbtype' => 'int',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'text',
      'null' => true,
    ),
    'price' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '10,2',
      'phptype' => 'float',
      'null' => false,
    ),
    'weight' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'varchar',
      'null' => true,
    ),
    'tip' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'image' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '128',
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
  'aggregates' => 
  array (
    'Category' => 
    array (
      'class' => 'FoodMenuCategory',
      'local' => 'category',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
