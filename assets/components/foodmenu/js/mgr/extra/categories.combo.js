FoodMenu.combo.Categories = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'foodmenu-extra-combo-categories'
        ,name: 'category'
        ,hiddenName: 'category'
        ,url: FoodMenu.config.connectorUrl
        ,baseParams: { action: 'mgr/category/getlist' }
        ,fields: ['id','name']
        ,displayField: 'name'
        ,valueField: 'id'
        ,triggerAction: 'all'
        ,editable: false
        ,selectOnFocus: true
        ,forceSelection: true
        ,enableKeyEvents: true
    });
    FoodMenu.combo.Categories.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.combo.Categories,MODx.combo.ComboBox);
Ext.reg('foodmenu-extra-combo-categories',FoodMenu.combo.Categories);