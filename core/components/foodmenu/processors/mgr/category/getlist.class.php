<?php
/**
 * Get list Categories
 *
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuCategoriesGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'FoodMenuCategory';
    public $languageTopics = array('foodmenu:default');
    public $defaultSortField = 'position';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'foodmenu.items';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                           'name:LIKE' => '%'.$query.'%'
                      ));
        }
        return $c;
    }
}
return 'FoodMenuCategoriesGetListProcessor';