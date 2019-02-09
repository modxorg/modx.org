ContentBlocksComponentcomboBoolean = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('yes'), '1'],
                [_('no'), '0']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponentcomboBoolean.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponentcomboBoolean,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-boolean',ContentBlocksComponentcomboBoolean);
