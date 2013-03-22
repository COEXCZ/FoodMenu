
FoodMenu.grid.Dishes = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'foodmenu-grid-dishes'
        ,url: FoodMenu.config.connectorUrl
        ,baseParams: {
            action: 'mgr/dish/getlist'
        }
        ,save_action: 'mgr/dish/updatefromgrid'
        ,autosave: true
        ,fields: ['id','name','description', 'category', 'category_text', 'price', 'weight', 'tip', 'image', 'position']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,grouping: true
        ,groupBy: 'category_text'
        ,singleText: _('foodmenu.dish')
        ,pluralText: _('foodmenu.dishes')
        ,enableDragDrop: false
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
        },{
            header: _('foodmenu.name')
            ,dataIndex: 'name'
            ,width: 200
            ,editor: { xtype: 'textfield' }
            ,sortable: true
        },{
            header: _('foodmenu.description')
            ,dataIndex: 'description'
            ,width: 250
            ,editor: { xtype: 'textfield' }
            ,sortable: true
        },{
            header: _('foodmenu.category')
            ,dataIndex: 'category_text'
            ,hidden: true
        },{
            header: _('foodmenu.price')
            ,dataIndex: 'price'
            ,width: 250
            ,editor: { xtype: 'textfield' }
            ,sortable: true
        },{
            header: _('foodmenu.weight')
            ,dataIndex: 'weight'
            ,width: 250
            ,editor: { xtype: 'textfield' }
            ,sortable: true
        },{
            header: _('foodmenu.tip')
            ,dataIndex: 'tip'
            ,width: 250
            ,editor: { xtype: 'modx-combo-boolean'  }
            ,renderer: this.rendYesNo
            ,sortable: true
        },{
            header: _('foodmenu.posiiton')
            ,dataIndex: 'position'
            ,width: 250
            ,editor: { xtype: 'textfield' }
            ,sortable: true
        }]
        ,tbar: [{
            text: _('foodmenu.create_dish')
            ,handler: this.createDish
            ,scope: this
        },'->',{
            xtype: 'foodmenu-extra-combo-categories'
            ,id: 'foodmenu-category-filter'
            ,emptyText: _('foodmenu.select_category')
            ,listeners: {
                'select': {fn:this.filterCategory,scope:this}
            }
        },{
            xtype: 'textfield'
            ,id: 'foodmenu-search-filter'
            ,emptyText: _('foodmenu.search') + '...'
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        },{
            text: _('foodmenu.clear_filter')
            ,handler: this.clearFilter
            ,scope: this
        }]
    });

    FoodMenu.grid.Dishes.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.grid.Dishes,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('foodmenu.update_dish')
            ,handler: this.updateDish
        });
        m.push('-');
        m.push({
            text: _('foodmenu.remove_dish')
            ,handler: this.removeDish
        });
        this.addContextMenuItem(m);
    }
    
    ,createDish: function(btn,e) {
        this.createUpdateDish(btn, e, false);
    }

    ,updateDish: function(btn,e) {
        this.createUpdateDish(btn, e, true);
    }

    ,createUpdateDish: function(btn,e,isUpdate) {
        var r;

        if(isUpdate){
            if (!this.menu.record || !this.menu.record.id) return false;
            r = this.menu.record;
        }else{
            r = {};
        }

        this.windows.createUpdateDish = MODx.load({
            xtype: 'foodmenu-window-dish-create-update'
            ,isUpdate: isUpdate
            ,title: (isUpdate) ?  _('foodmenu.update_dish') : _('foodmenu.create_dish')
            ,record: r
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        this.windows.createUpdateDish.fp.getForm().reset();
        this.windows.createUpdateDish.fp.getForm().setValues(r);
        this.windows.createUpdateDish.show(e.target);
    }
    
    ,removeDish: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('foodmenu.remove_dish')
            ,text: _('foodmenu.remove_dish_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/dish/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }

    ,search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
//        this.refresh();
    }
    
    ,clearFilter: function(){
        Ext.getCmp('foodmenu-category-filter').reset();
        Ext.getCmp('foodmenu-search-filter').reset();
        this.getStore().setBaseParam('filterCategory',null);
        this.getStore().setBaseParam('query',null);
        this.getBottomToolbar().changePage(1);
//        this.refresh();
    }

    ,getDragDropText: function(){
        return this.selModel.selections.items[0].data.name;
    }
});
Ext.reg('foodmenu-grid-dishes',FoodMenu.grid.Dishes);

FoodMenu.window.CreateUpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'foodmenu-window-dish-create-update';
    Ext.applyIf(config,{
        id: this.ident
        ,height: 150
        ,width: 600
        ,closeAction: 'close'
        ,url: FoodMenu.config.connectorUrl
        ,action: (config.isUpdate)? 'mgr/dish/update' : 'mgr/dish/create'
        ,fields: [{
            layout: 'column',
            cls: 'main-wrapper',
            defaults: {
                border: false
            },
            items: this.itemsPanel(config)
        }]
    });
    FoodMenu.window.CreateUpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.window.CreateUpdateItem,MODx.Window, {
    itemsPanel: function(config) {
        var items = [];

        items.push({
            columnWidth: 0.50
            ,layout: 'form'
            ,defaults: {
                width: '100%'
                ,msgTarget: 'under'
                ,labelSeparator: ''
            }
            ,items: this.itemsColumnLeft(config)
        },{
            columnWidth: 0.50
            ,layout: 'form'
            ,cls: 'no-right-margin'
            ,defaults: {
                width: '100%'
                ,msgTarget: 'under'
                ,labelSeparator: ''
            }
            ,items: this.itemsColumnRight(config)
        });

        return items;
    }

    ,itemsColumnLeft: function(config) {
        var items = [];

        items.push({
            name: 'id'
            ,xtype: 'hidden'
            ,id: this.ident+'-id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('foodmenu.name')
            ,name: 'name'
            ,id: this.ident+'-name'
            ,anchor: '100%'
            ,itemCls: 'required'
        },{
            xtype: 'textarea'
            ,fieldLabel: _('foodmenu.description')
            ,name: 'description'
            ,id: this.ident+'-description'
            ,anchor: '100%'
        },{
            xtype: 'foodmenu-extra-combo-categories'
            ,fieldLabel: _('foodmenu.category')
            ,name: 'category'
            ,id: this.ident+'-category'
            ,anchor: '100%'
            ,itemCls: 'required'
        });

        return items;
    }

    ,itemsColumnRight: function(config) {
        var items = [];

        items.push({
            xtype: 'textfield'
            ,fieldLabel: _('foodmenu.price')
            ,name: 'price'
            ,id: this.ident+'-price'
            ,anchor: '100%'
            ,itemCls: 'required'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('foodmenu.weight')
            ,name: 'weight'
            ,id: this.ident+'-weight'
            ,anchor: '100%'
        },{
            xtype: 'xcheckbox'
            ,fieldLabel: _('foodmenu.tip')
            ,name: 'tip'
            ,id: this.ident+'-tip'
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('foodmenu.image')
            ,name: 'image'
            ,id: this.ident+'-image'
            ,anchor: '100%'
        });


        return items;
    }
});
Ext.reg('foodmenu-window-dish-create-update',FoodMenu.window.CreateUpdateItem);

