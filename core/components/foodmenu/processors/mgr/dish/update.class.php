<?php
/**
 * Update a Dish
 * 
 * @package foodmenu
 * @subpackage processors
 */

class FoodMenuUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'FoodMenuDish';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu';

    public function beforeSet() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.dish_err_ns_name'));

        }

        return parent::beforeSave();
    }

}
return 'FoodMenuUpdateProcessor';