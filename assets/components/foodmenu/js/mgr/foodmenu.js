var FoodMenu = function(config) {
    config = config || {};
    FoodMenu.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('foodmenu',FoodMenu);
FoodMenu = new FoodMenu();