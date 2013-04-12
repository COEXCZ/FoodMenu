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
        $category = $this->getProperty('category');

        if (empty($category)) {
            $this->addFieldError('category',$this->modx->lexicon('foodmenu.dish_err_ns_category'));
            return parent::beforeSet();
        }
        $items = $this->modx->getCollection($this->classKey, array('category' => $category));

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave() {
        $name = $this->getProperty('name');
        $category = $this->getProperty('category');
        $price = $this->getProperty('price');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.dish_err_ns_name'));
        }

        if (empty($category)) {
            $this->addFieldError('category',$this->modx->lexicon('foodmenu.dish_err_ns_category'));
        }

        if (empty($price)) {
            $this->addFieldError('price',$this->modx->lexicon('foodmenu.dish_err_ns_price'));
        }
        return parent::beforeSave();
    }
}
return 'FoodMenuDishCreateProcessor';
