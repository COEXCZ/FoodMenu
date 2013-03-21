<?php
/**
 * Loads the home page.
 *
 * @package foodmenu
 * @subpackage controllers
 */
class FoodMenuHomeManagerController extends FoodMenuBaseManagerController {
    public function process(array $scriptProperties = array()) {

    }
    public function getPageTitle() { return $this->modx->lexicon('foodmenu'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->foodmenu->config['jsUrl'].'mgr/extra/categories.combo.js');

        $this->addJavascript($this->foodmenu->config['jsUrl'].'mgr/widgets/categories.grid.js');

        $this->addJavascript($this->foodmenu->config['jsUrl'].'mgr/widgets/dishes.grid.js');
        $this->addJavascript($this->foodmenu->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->foodmenu->config['jsUrl'].'mgr/sections/home.js');
    }
    public function getTemplateFile() { return $this->foodmenu->config['templatesPath'].'home.tpl'; }
}