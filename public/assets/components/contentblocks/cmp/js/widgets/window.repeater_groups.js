ContentBlocksComponent.window.RepeaterField = function(config) {
    config = config || {};
    config.id = config.id || Ext.id(),
    Ext.applyIf(config,{
        title: (config.isUpdate) ?
            _('contentblocks.edit_field') :
            _('contentblocks.add_field'),
        modal: true,
        autoHeight: true,
        resizable: false,
        maximizable: false,
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: (config.isUpdate) ?
                'mgr/fields/update' :
                'mgr/fields/create'
        },
        width: 750,
        y: 20,
        bodyCssClass: 'cb-window-vtabs',
        fields: [{
            xtype: 'hidden',
            name: 'id'
        },{
            width: 600,
            xtype: 'modx-vtabs',
            autoHeight: true,
            deferredRender: false,
            forceLayout: true,
            resizeTabs: false,
            hideMode: 'offsets',
            defaults: {
                border: false,
                layout: 'form',
                autoHeight: true,
                cls: 'main-wrapper',
                deferredRender: false,
                forceLayout: true,
                hideMode: 'offsets',
                bodyStyle: 'max-height: ' + (Math.max(document.documentElement.clientHeight, window.innerHeight || 0) - 150) + 'px;'
            },
            items: [{
                title: _('contentblocks.general'),
                layout: 'form',
                items: [{
                    xtype: 'contentblocks-combo-inputs',
                    name: 'input',
                    fieldLabel: _('contentblocks.input'),
                    allowBlank: false,
                    anchor: '100%',
                    maxLength: 255,
                    id: config.id + '-input',
                    formId: config.id,
                    listeners: {
                        select: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this},
                        change: this.inputChange,
                        blur: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this}
                    }
                },{
                    layout: 'column',
                    border: false,
                    bodyStyle: 'padding-top: 10px;',
                    items: [{
                        columnWidth: 0.7,
                        layout: 'form',
                        items: [{
                            xtype: 'textfield',
                            name: 'key',
                            fieldLabel: _('contentblocks.repeater.key'),
                            allowBlank: false,
                            anchor: '100%',
                            maxLength: 255,
                            vtype: 'alphanum'
                        },{
                            xtype: 'textfield',
                            name: 'name',
                            fieldLabel: _('contentblocks.name'),
                            allowBlank: false,
                            anchor: '100%',
                            maxLength: 255
                        }]
                    },{
                        columnWidth: 0.3,
                        layout: 'form',
                        items: [{
                            xtype: 'numberfield',
                            name: 'width',
                            fieldLabel: _('contentblocks.repeater.width'),
                            allowBlank: false,
                            anchor: '100%',
                            value: '50',
                            minValue: 0,
                            maxValue: 100
                        },{
                            xtype: 'numberfield',
                            name: 'sortorder',
                            fieldLabel: _('contentblocks.sortorder'),
                            allowBlank: false,
                            anchor: '100%',
                            maxLength: 5,
                            value: 0
                        }]
                    }]
                }]
            },{
                title: _('contentblocks.properties'),
                id: config.id + '-properties',
                items: []
            }]
        }],

        listeners: {
            render: {fn: this.initWindow, scope: this},
            scope: this
        },

        keys: []
    });
    ContentBlocksComponent.window.RepeaterField.superclass.constructor.call(this,config);
    this.on('render', this.initWindow);
};
Ext.extend(ContentBlocksComponent.window.RepeaterField, MODx.Window, {
    propHolder: null,
    getDefaultProps: function() {
        var id = this.config.id + '-input',
            input = Ext.getCmp(id);

        this.propHolder = Ext.getCmp(this.config.id + '-properties');
        this.propHolder.add([{
            xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea',
            mimeType: 'text/html',
            name: 'template',
            id: this.config.id + '-template',
            fieldLabel: _('contentblocks.template'),
            description: _('contentblocks.' + input.getValue() + '_template.description') || undefined,
            allowBlank: true,
            anchor: '100%',
            grow: true,
            growMin: 75,
            growMax: 400,
            value: (this.config.record) ? this.config.record.template : ''
        }]);
        this.propHolder.doLayout();
    },

    initWindow: function() {
        this.getDefaultProps();

        var id = this.config.id + '-input',
            input = Ext.getCmp(id);

        input.getStore().on('load', function() {
            input.fireEvent('change', input);
        });

    },

    inputChange: function(combo) {
        var f = Ext.getCmp(combo.formId),
            propHolder = Ext.getCmp(combo.formId + '-properties'),

            value = combo.getValue(),
            selected = combo.store.find('value', value),
            record = combo.getStore().getAt(selected),
            items = [];
        if (!record) {
            return;
        }

        Ext.each(record.data.properties, function(prop) {
            prop.name = 'properties_' + prop.key;
            prop.value = (f.config.record && f.config.record.properties && f.config.record.properties[prop.key]) ? f.config.record.properties[prop.key] : prop.default;
            prop.anchor = '100%';

            switch (prop.xtype) {
                case 'code': // This is separate as I'd like it to be Ace-powered later
                    prop.xtype = Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea';
                    prop.mimeType = 'text/html';
                    break;

                default:
                    //prop.xtype = 'textfield';
                    break;
            }
            items.push(prop);
        });

        propHolder.removeAll();
        with (f) {
            f.getDefaultProps();
        }
        if (items.length > 0) {
            propHolder.add([items]);
            propHolder.doLayout();
        }

        if (!f.config.isUpdate) {
            if (record.data.defaultTpl) {
                var tpl = Ext.getCmp(combo.formId + '-template');
                tpl.setValue(record.data.defaultTpl);
            }
        }
    },

    submit: function() {
        var r = this.fp.getForm().getValues(),
            props = {};
        Ext.iterate(r, function(key, value) {
            if (key.substr(0, 11) == 'properties_') {
                props[key.substr(11)] = value;
                props[key] = undefined;
            }
        });
        r.properties = props;
        this.fireEvent('success',r);
        this.close();
        return false;
    }
});
Ext.reg('contentblocks-window-repeater-field', ContentBlocksComponent.window.RepeaterField);
