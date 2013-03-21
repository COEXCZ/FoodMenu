Ext.onReady(function() {
    MODx.load({ xtype: 'foodmenu-page-home'});
});

FoodMenu.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'foodmenu-panel-home'
            ,renderTo: 'foodmenu-panel-home-div'
        }]
    });
    FoodMenu.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.page.Home,MODx.Component);
Ext.reg('foodmenu-page-home',FoodMenu.page.Home);