ContentBlocksComponent.window.Categories = function (config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config, {
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: (config.isUpdate) ?
                'mgr/categories/update' :
                'mgr/categories/create'
        },
        title: (config.isUpdate) ?
            _('contentblocks.edit_category') :
            _('contentblocks.add_category'),
        autoHeight: true,
        modal: true,
        width: 400,
        fields: [{
            xtype: 'hidden',
            name: 'id'
        },{
            xtype: 'textfield',
            name: 'name',
            fieldLabel: _('contentblocks.name'),
            allowBlank: true,
            anchor: '100%'
        },{
            xtype: 'textarea',
            name: 'description',
            fieldLabel: _('contentblocks.description'),
            allowBlank: true,
            anchor: '100%'
        },{
            xtype: 'numberfield',
            name: 'sortorder',
            fieldLabel: _('contentblocks.sortorder'),
            allowBlank: true,
            anchor: '100%'
        }],
        buttons: this.getWindowButtons(config)
    });
    ContentBlocksComponent.window.Categories.superclass.constructor.call(this, config);
};
Ext.extend(ContentBlocksComponent.window.Categories, MODx.Window, {
    getWindowButtons: function(config) {
        var b = [{
            text: _('cancel'),
            scope: this,
            handler: function() { this.hide(); }
        },'-'];

        if (ContentBlocksConfig.permissions.categories_save) {
            b.push([{
                text: _('save'),
                scope: this,
                handler: this.submit,
                cls: 'primary-button'
            }]);
        }
        return b;
    }
});
Ext.reg('contentblocks-window-categories', ContentBlocksComponent.window.Categories);
