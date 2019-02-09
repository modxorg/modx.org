ContentBlocksComponent.window.Defaults = function (config) {
    config = config || {};
    config.id = config.id || Ext.id(),
        Ext.applyIf(config, {
            url: ContentBlocksComponent.config.connectorUrl,
            baseParams: {
                action: (config.isUpdate) ?
                    'mgr/defaults/update' :
                    'mgr/defaults/create'
            },
            title: (config.isUpdate) ?
                _('contentblocks.edit_default') :
                _('contentblocks.add_default'),
            autoHeight: true,
            modal: true,
            width: 400,
            fields: [
                {
                    xtype: 'hidden',
                    name: 'id'
                },
                {
                    xtype: 'contentblocks-combo-availabilityfield',
                    name: 'constraint_field',
                    fieldLabel: _('contentblocks.constraint_field'),
                    allowBlank: true,
                    anchor: '100%'
                },
                {
                    xtype: 'textfield',
                    name: 'constraint_value',
                    fieldLabel: _('contentblocks.constraint_value'),
                    allowBlank: true,
                    anchor: '100%'
                },
                {
                    xtype: 'contentblocks-combo-templates',
                    name: 'default_template',
                    fieldLabel: _('contentblocks.default_template'),
                    allowBlank: false,
                    anchor: '100%',
                    formId: config.id,
                    id: config.id + '-default_template',
                    listeners: {
                        select: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                            }, scope: this},
                        change: this.inputChange
                    }
                },
                {
                    xtype: 'contentblocks-combo-layouts',
                    name: 'target_layout',
                    formId: config.id,
                    id: config.id + '-target_layout',
                    listeners: {
                        select: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this},
                        change: this.inputChange
                    },
                    fieldLabel: _('contentblocks.target_layout'),
                    allowBlank: false,
                    anchor: '100%'
                },
                {
                    xtype: 'contentblocks-combo-columns',
                    name: 'target_column',
                    formId: config.id,
                    id: config.id + '-target_column',
                    listeners: {
                        select: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this},
                        change: this.inputChange
                    },
                    fieldLabel: _('contentblocks.target_column'),
                    allowBlank: true,
                    anchor: '100%'
                },
                {
                    xtype: 'contentblocks-combo-fields',
                    name: 'target_field',
                    id: config.id + '-target_field',
                    fieldLabel: _('contentblocks.target_field'),
                    allowBlank: false,
                    anchor: '100%'
                }
            ],
            buttons: this.getWindowButtons(config),
            listeners: {
                render: {fn: this.initWindow, scope: this},
                scope: this
            }
        });
    ContentBlocksComponent.window.Defaults.superclass.constructor.call(this, config);
    this.on('render', this.initWindow);
};
Ext.extend(ContentBlocksComponent.window.Defaults, MODx.Window, {
    getWindowButtons: function(config) {
        var b = [{
            text: _('cancel'),
            scope: this,
            handler: function() { this.hide(); }
        },'-'];

        if (ContentBlocksConfig.permissions.defaults_save) {
            b.push([{
                text: _('save'),
                scope: this,
                handler: this.submit,
                cls: 'primary-button'
            }]);
        }
        return b;
    },

    inputChange: function(combo) {
        var f = Ext.getCmp(combo.formId),
            value = combo.getValue(),
            fieldNames = ['default_template', 'target_layout', 'target_column', 'target_field'],
            fieldCount = fieldNames.length,
            fieldName = combo.name,
            fieldNameIdx = fieldNames.indexOf(fieldName),
            targetFieldName = false,
            items = [],
            templateField = (fieldName == 'default_template') ? combo : Ext.getCmp(combo.formId + '-default_template'),
            reloadData = false,
            originalValue = combo.startValue || combo.originalValue;

        switch(fieldName) {
            case "default_template" :
                targetFieldName = combo.formId + '-target_layout';
                var layouts = templateField.getStore().getById(value);
                if(typeof layouts !== 'undefined') {
                    layouts = layouts.data.layouts;
                }
                else {
                    break;
                }
                Ext.each(layouts, function(layout) {
                    items.push(layout.layout);
                });
                items = items.join();
                reloadData = true;
                break;

            case "target_layout" :
                targetFieldName = combo.formId + '-target_column';
                var columns = combo.getStore().getById(value);
                if(typeof columns !== 'undefined') {
                    columns = columns.data.columns;
                }
                else {
                    break;
                }
                Ext.each(columns, function(column) {
                    items.push([column.reference]);
                });
                break;

            case "target_column" :
                targetFieldName = combo.formId + '-target_field';
                var selected = combo.store.find('reference', value),
                    reference = value,
                    layoutID = Ext.getCmp(combo.formId + '-target_layout').getValue(),
                    templateID = templateField.getValue(),
                    layouts = templateField.getStore().getById(templateID).data.layouts,
                    layout = false,
                    fields = [];
                Ext.each(layouts, function(layout){
                   if(layout.layout == layoutID) {
                       Ext.each(layout.content[reference], function(field) {
                          fields.push(field.field);
                       });
                       // stop looping
                       return false;
                   }
                });
                items = fields.join();
                reloadData = true;
                break;
        }

        for(i = 0; i <= fieldNameIdx; i ++) {
            fieldNames.shift();
        }

        Ext.each(fieldNames, function(fieldName) {
            var clearTargetName = combo.formId + '-' + fieldName,
                clearTarget = Ext.getCmp(clearTargetName);
            if(f.config.initCount > fieldCount && originalValue != value) {
                clearTarget.clearValue();
            }
            clearTarget.setDisabled(true);
            if(reloadData && clearTargetName == targetFieldName) {
                // get data from database
                if(items == '') {
                    // make sure that nothing shows up if nothing should show up
                    items = '-1';
                    // always clear it if there's no valid data, no matter what.
                    clearTarget.clearValue();
                }
                clearTarget.baseParams.ids = items;
                clearTarget.store.reload({
                    params: {ids: items},
                    callback : function(records, operation, success) {
                        clearTarget.setDisabled(false);
                    }});
            }
            else if(clearTargetName == targetFieldName) {
                // directly set data
                clearTarget.store.loadData(items);
                clearTarget.setDisabled(false);
            }
        });
        f.config.initCount++;
    },

    initWindow: function() {
        var fieldNames = ['default_template', 'target_layout', 'target_column', 'target_field'],
            formId = this.config.id;
        Ext.each(fieldNames, function(fieldName) {
            fieldName = formId + '-' + fieldName;
            var targetField = Ext.getCmp(fieldName);
            targetField.getStore().on('load', function() {
                targetField.fireEvent('change', targetField);
            });
        }, this);
    }
});
Ext.reg('contentblocks-window-defaults', ContentBlocksComponent.window.Defaults);
