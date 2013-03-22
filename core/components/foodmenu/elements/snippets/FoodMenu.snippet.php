<?php
/**
 * The base FoodMenu snippet.
 *
 * @package foodmenu
 */
$FoodMenu = $modx->getService('foodmenu', 'FoodMenu', $modx->getOption('foodmenu.core_path', null, $modx->getOption('core_path') . 'components/foodmenu/') . 'model/foodmenu/', $scriptProperties);
if (!($FoodMenu instanceof FoodMenu)) return '';

$output = array();
$output_dishes = array();

// set variables
$tpl = $modx->getOption('tpl', $scriptProperties, 'Category');
$itemTpl = $modx->getOption('itemTpl', $scriptProperties, 'Dish');

$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// get categories
$c = $modx->newQuery('FoodMenuCategory');
$c->sortBy('position', 'asc');

$categories = $modx->getCollection('FoodMenuCategory', $c);

foreach ($categories as $cat) {
    $cat = $cat->toArray();

    // get dishes for current category
    $c = $modx->newQuery('FoodMenuDish');
    $c->where(array(
        'category' => $cat['id']
    ));
    $c->sortBy('position', 'asc');

    $dishes = $modx->getCollection('FoodMenuDish', $c);

    // skip category if no dishes
    if (count($dishes) < 1) {
        continue;
    }

    // iterate over all dishes in category
    foreach ($dishes as $dish) {
        $dish = $dish->toArray();

        // render dish
        $output_dishes[] = $FoodMenu->getChunk($itemTpl, $dish);
    }

    // extend category for dishes render
    $cat['dishes'] = implode($outputSeparator, $output_dishes);

    // render category with dishes
    $output[] = $FoodMenu->getChunk($tpl, $cat);
}

// output
$output = implode($outputSeparator, $output);
if (!empty($toPlaceholder)) {
    // if using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);
    return '';
}

// by default just return output
return $output;