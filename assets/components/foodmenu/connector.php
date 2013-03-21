<?php
/**
 * FoodMenu Connector
 *
 * @package foodmenu
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('foodmenu.core_path',null,$modx->getOption('core_path').'components/foodmenu/');
require_once $corePath.'model/foodmenu/foodmenu.class.php';
$modx->foodmenu = new FoodMenu($modx);

$modx->lexicon->load('foodmenu:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->foodmenu->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));