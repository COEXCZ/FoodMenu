<?php
/**
 * @package foodmenu
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/foodmenudish.class.php');
class FoodMenuDish_mysql extends FoodMenuDish {}
?>