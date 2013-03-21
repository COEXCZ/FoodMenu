<?php
$foodmenu = $modx->getService('foodmenu','FoodMenu',$modx->getOption('foodmenu.core_path',null,$modx->getOption('core_path').'components/foodmenu/').'model/foodmenu/',$scriptProperties);
if (!($foodmenu instanceof FoodMenu)) return '';


$m = $modx->getManager();
$m->createObjectContainer('FoodMenuDish');
$m->createObjectContainer('FoodMenuCategory');
return 'Table created.';