<?php
/**
 * Get list Dishes
 *
 * @package foodmenu
 * @subpackage processors
 */
class FoodMenuDishGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'FoodMenuDish';
    public $languageTopics = array('foodmenu:default');
    public $defaultSortField = 'position';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'foodmenu';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');

        $c->leftJoin('FoodMenuCategory', 'Category');

        if (!empty($query)) {
            $c->where(array(
                    'name:LIKE' => '%'.$query.'%',
                    'OR:description:LIKE' => '%'.$query.'%',
                ));
        }
        return $c;
    }

    public function prepareQueryAfterCount(xPDOQuery $c) {
        $c->select($this->modx->getSelectColumns('FoodMenuDish', 'FoodMenuDish'));
        $c->select(array(
                        'category_text' => 'Category.name'
                   ));

        return $c;
    }
}
return 'FoodMenuDishGetListProcessor';