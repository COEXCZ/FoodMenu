<?php
/**
 * @package foodmenu
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/foodmenucategory.class.php');
class FoodMenuCategory_mysql extends FoodMenuCategory {}
?>