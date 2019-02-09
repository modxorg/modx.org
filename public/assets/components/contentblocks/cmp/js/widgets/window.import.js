ContentBlocksComponent.window.Import = function(config) {
    config = config || {};
    config.id = config.id || Ext.id(),
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        autoHeight: true,
        fileUpload: true,
        modal: true,
        width: 450,
        fields: [{
            xtype: 'hidden',
            name: 'parent'
        },{
            xtype: 'panel',
            cls: 'panel-desc',
            html: '<p>' + config.introduction + '</p>',
            border: false
        },{
            xtype: 'textfield',
            fieldLabel: _('contentblocks.import_file'),
            name: 'file',
            inputType: 'file'
        },{
            xtype: 'radiogroup',
            fieldLabel: _('contentblocks.import_mode'),
            columns: 1,
            items: [{
                boxLabel: _('contentblocks.import_mode.insert', {what: config.what}),
                name: 'mode',
                inputValue: 'insert',
                checked: true
            },{
                boxLabel: _('contentblocks.import_mode.overwrite', {what: config.what}),
                name: 'mode',
                inputValue: 'overwrite'
            },{
                boxLabel: _('contentblocks.import_mode.replace', {what: config.what}),
                name: 'mode',
                inputValue: 'replace'
            }]
        }],
        buttons: [{
            text: _('cancel'),
            scope: this,
            handler: function() { this.hide(); }
        },'-',{
            text: _('contentblocks.start_import'),
            scope: this,
            handler: this.submit,
            cls: 'primary-button'
        }]
    });
    ContentBlocksComponent.window.Import.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.window.Import, MODx.Window);
Ext.reg('contentblocks-window-import',ContentBlocksComponent.window.Import);
