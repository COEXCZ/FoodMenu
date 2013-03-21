<?php
/**
 * FoodMenu
 *
 * Copyright 2010 by Shaun McCormick <shaun+foodmenu@modx.com>
 *
 * FoodMenu is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * FoodMenu is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FoodMenu; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package foodmenu
 */
/**
 * Properties for the FoodMenu snippet.
 *
 * @package foodmenu
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_foodmenu.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'foodmenu:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_foodmenu.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'foodmenu:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_foodmenu.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'foodmenu:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_foodmenu.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'foodmenu:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_foodmenu.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'foodmenu:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_foodmenu.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'foodmenu:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_foodmenu.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'foodmenu:properties',
    ),
    */
);

return $properties;