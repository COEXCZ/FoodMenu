<?php
/**
 * Remove a Dish.
 * 
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuDishRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'FoodMenuDish';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu';
}
return 'FoodMenuDishRemoveProcessor';