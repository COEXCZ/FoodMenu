<?php
/**
 * Update a Category
 * 
 * @package foodmenu
 * @subpackage processors
 */

class FoodMenuCategoryUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'FoodMenuCategory';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu.categories';

    public function beforeSet() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.categories.category_err_ns_name'));

        } else if ($this->modx->getCount($this->classKey, array('name' => $name)) && ($this->object->name != $name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.categories.category_err_ae'));
        }
        return parent::beforeSave();
    }

}
return 'FoodMenuCategoryUpdateProcessor';