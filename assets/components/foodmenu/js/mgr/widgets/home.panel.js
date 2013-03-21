FoodMenu.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('foodmenu')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('foodmenu.dishes')
                ,items: [{
                    html: '<p>'+_('foodmenu.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'foodmenu-grid-dishes'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            },{
                title: _('foodmenu.categories')
                ,items: [{
                    html: '<p>'+_('foodmenu.categories.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'foodmenu-grid-categories'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    FoodMenu.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.panel.Home,MODx.Panel);
Ext.reg('foodmenu-panel-home',FoodMenu.panel.Home);