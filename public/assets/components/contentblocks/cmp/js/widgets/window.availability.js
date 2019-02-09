ContentBlocksComponent.window.Availability = function(config) {
    config = config || {};
    config.id = config.id || Ext.id(),
    Ext.applyIf(config,{
        title: (config.isUpdate) ?
            _('contentblocks.edit_condition') :
            _('contentblocks.add_condition'),
        autoHeight: true,
        modal: true,
        width: 300,
        fields: [{
            xtype: 'contentblocks-combo-availabilityfield',
            name: 'field',
            fieldLabel: _('contentblocks.condition_field'),
            allowBlank: false,
            anchor: '100%'
        },{
            xtype: 'textfield',
            name: 'value',
            fieldLabel: _('contentblocks.condition_value'),
            allowBlank: false,
            anchor: '100%'
        }]
    });
    ContentBlocksComponent.window.Availability.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.window.Availability, MODx.Window, {
    submit: function() {
        var r = this.fp.getForm().getValues();
        this.fireEvent('success',r);
        this.close();
        return false;
    }
});
Ext.reg('contentblocks-window-availability',ContentBlocksComponent.window.Availability);
