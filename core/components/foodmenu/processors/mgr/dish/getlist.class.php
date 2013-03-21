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
    public $defaultSortField = 'company';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'foodmenu';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        $filterCategory = $this->getProperty('filterCategory');

        $c->leftJoin('FoodMenuCategory', 'Category');

        if (!empty($query)) {
            $c->where(array(
                    'name:LIKE' => '%'.$query.'%',
                    'OR:description:LIKE' => '%'.$query.'%',
                ));
        }

        if (!empty($filterCategory)) {
            $c->where(array(
                           'category' => $filterCategory
                      ));
        }
        $c->sortby('Category.position','ASC');
        $c->sortby('FoodMenuDish.position','ASC');

//        if ($this->getProperty('sort')) {
//            $c->sortby($this->getProperty('sort'),$this->getProperty('dir'));
//        }

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