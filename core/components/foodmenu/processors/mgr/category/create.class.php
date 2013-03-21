<?php
/**
 * Create a Category
 * 
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuCategoryCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'FoodMenuCategory';
    public $languageTopics = array('foodmenu:default');
    public $objectType = 'foodmenu.categories';

    public function beforeSet(){
        $count = $this->modx->getCount($this->classKey);

        $this->setProperty('position', $count);

        return parent::beforeSet();
    }

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.categories.category_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('foodmenu.categories.category_err_ae'));
        }
        return parent::beforeSave();
    }
}
return 'FoodMenuCategoryCreateProcessor';
