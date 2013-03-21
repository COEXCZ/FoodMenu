<?php
/**
 * Create a Dish
 * 
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuDishCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'FoodMenuDish';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu';

    public function beforeSet(){
        $items = $this->modx->getCollection($this->classKey);

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.dish_err_ns_name'));
        }
        return parent::beforeSave();
    }
}
return 'FoodMenuDishCreateProcessor';
