<?php
require_once dirname(__FILE__) . '/model/foodmenu/foodmenu.class.php';
/**
 * @package foodmenu
 */
class IndexManagerController extends FoodMenuBaseManagerController {
    public static function getDefaultController() { return 'home'; }
}

abstract class FoodMenuBaseManagerController extends modExtraManagerController {
    /** @var FoodMenu $foodmenu */
    public $foodmenu;
    public function initialize() {
        $this->foodmenu = new FoodMenu($this->modx);

        $this->addCss($this->foodmenu->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->foodmenu->config['jsUrl'].'mgr/foodmenu.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            FoodMenu.config = '.$this->modx->toJSON($this->foodmenu->config).';
            FoodMenu.config.connector_url = "'.$this->foodmenu->config['connectorUrl'].'";
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('foodmenu:default');
    }
    public function checkPermissions() { return true;}
}