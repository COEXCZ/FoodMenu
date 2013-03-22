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
 * Resolve creating db tables
 *
 * @package foodmenu
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('foodmenu.core_path',null,$modx->getOption('core_path').'components/foodmenu/').'model/';
            $modx->addPackage('foodmenu',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('FoodMenuDish');
            $manager->createObjectContainer('FoodMenuCategory');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;