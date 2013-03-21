<?php
/**
 * Remove a Category.
 * 
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuCategoryRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'FoodMenuCategory';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu.categories';
}
return 'FoodMenuCategoryRemoveProcessor';