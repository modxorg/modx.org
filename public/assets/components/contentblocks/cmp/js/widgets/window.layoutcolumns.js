ContentBlocksComponent.window.LayoutColumn = function(config) {
    config = config || {};
    config.id = config.id || Ext.id(),
    Ext.applyIf(config,{
        title: (config.isUpdate) ?
            _('contentblocks.edit_layoutcolumn') :
            _('contentblocks.add_layoutcolumn'),
        autoHeight: true,
        modal: true,
        width: 300,
        fields: [{
            xtype: 'textfield',
            name: 'reference',
            fieldLabel: _('contentblocks.reference'),
            allowBlank: false,
            anchor: '100%',
            maxLength: 25,
            vtype: 'alphanum'
        },{
            xtype: 'numberfield',
            name: 'width',
            fieldLabel: _('contentblocks.width'),
            allowBlank: false,
            anchor: '100%'
        }]
    });
    ContentBlocksComponent.window.LayoutColumn.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.window.LayoutColumn, MODx.Window, {
    submit: function() {
        var r = this.fp.getForm().getValues();
        this.fireEvent('success',r);
        this.close();
        return false;
    }
});
Ext.reg('contentblocks-window-layoutcolumn',ContentBlocksComponent.window.LayoutColumn);
