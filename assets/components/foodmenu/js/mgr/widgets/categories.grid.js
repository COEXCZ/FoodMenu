
FoodMenu.grid.Categories = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'foodmenu-grid-categories'
        ,url: FoodMenu.config.connectorUrl
        ,baseParams: {
            action: 'mgr/category/getlist'
        }
        ,save_action: 'mgr/category/updatefromgrid'
        ,autosave: true
        ,fields: ['id','name']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,ddGroup: 'foodmenuCategoryDDGroup'
        ,enableDragDrop: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
        },{
            header: _('name')
            ,dataIndex: 'name'
            ,width: 200
            ,editor: { xtype: 'textfield' }
        }]
        ,tbar: [{
            text: _('foodmenu.categories.create_category')
            ,handler: this.createCategory
            ,scope: this
        },'->',{
            xtype: 'textfield'
            ,id: 'foodmenu-categories-search-filter'
            ,emptyText: _('foodmenu.search...')
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
        }]
        ,listeners: {
            'render': function(g) {
                var ddrow = new Ext.ux.dd.GridReorderDropTarget(g, {
                    copy: false
                    ,listeners: {
                        'beforerowmove': function(objThis, oldIndex, newIndex, records) {
                        }

                        ,'afterrowmove': function(objThis, oldIndex, newIndex, records) {

                            MODx.Ajax.request({
                                url: FoodMenu.config.connectorUrl
                                ,params: {
                                    action: 'mgr/category/reorder'
                                    ,idItem: records.pop().id
                                    ,oldIndex: oldIndex
                                    ,newIndex: newIndex
                                }
                                ,listeners: {

                                }
                            });
                        }

                        ,'beforerowcopy': function(objThis, oldIndex, newIndex, records) {
                        }

                        ,'afterrowcopy': function(objThis, oldIndex, newIndex, records) {
                        }
                    }
                });

                Ext.dd.ScrollManager.register(g.getView().getEditorParent());
            }
            ,beforedestroy: function(g) {
                Ext.dd.ScrollManager.unregister(g.getView().getEditorParent());
            }

        }
    });
    FoodMenu.grid.Categories.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.grid.Categories,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('foodmenu.categories.update_category')
            ,handler: this.updateCategory
        });
        m.push('-');
        m.push({
            text: _('foodmenu.categories.remove_category')
            ,handler: this.removeCategory
        });
        this.addContextMenuItem(m);
    }
    
    ,createCategory: function(btn,e) {
        this.createUpdateCategory(btn, e, false);
    }

    ,updateCategory: function(btn,e) {
        this.createUpdateCategory(btn, e, true);
    }

    ,createUpdateCategory: function(btn,e,isUpdate) {
        var r;

        if(isUpdate){
            if (!this.menu.record || !this.menu.record.id) return false;
            r = this.menu.record;
        }else{
            r = {};
        }

        this.windows.createUpdateCategory = MODx.load({
            xtype: 'foodmenu-window-category-create-update'
            ,isUpdate: isUpdate
            ,title: (isUpdate) ?  _('foodmenu.categories.update_category') : _('foodmenu.categories.create_category')
            ,record: r
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        this.windows.createUpdateCategory.fp.getForm().reset();
        this.windows.createUpdateCategory.fp.getForm().setValues(r);
        this.windows.createUpdateCategory.show(e.target);
    }
    
    ,removeCategory: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('foodmenu.categories.remove_category')
            ,text: _('foodmenu.categories.remove_category_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/category/remove'
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
        this.refresh();
    }

    ,getDragDropText: function(){
        return this.selModel.selections.items[0].data.name;
    }
});
Ext.reg('foodmenu-grid-categories',FoodMenu.grid.Categories);

FoodMenu.window.CreateUpdateCategory = function(config) {
    config = config || {};
    this.ident = config.ident || 'foodmenu-window-category-create-update';
    Ext.applyIf(config,{
        id: this.ident
        ,height: 150
        ,width: 475
        ,closeAction: 'close'
        ,url: FoodMenu.config.connectorUrl
        ,action: (config.isUpdate)? 'mgr/category/update' : 'mgr/category/create'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,id: this.ident+'-id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('name')
            ,name: 'name'
            ,id: this.ident+'-name'
            ,anchor: '100%'
            ,itemCls: 'required'
        }]
    });
    FoodMenu.window.CreateUpdateCategory.superclass.constructor.call(this,config);
};
Ext.extend(FoodMenu.window.CreateUpdateCategory,MODx.Window);
Ext.reg('foodmenu-window-category-create-update',FoodMenu.window.CreateUpdateCategory);

