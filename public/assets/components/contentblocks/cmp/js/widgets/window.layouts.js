ContentBlocksComponent.window.Layout = function(config) {
    config = config || {};
    config.id = config.id || Ext.id(),
    Ext.applyIf(config,{
        title: (config.isUpdate) ?
            _('contentblocks.edit_layout') :
            _('contentblocks.add_layout'),
        autoHeight: true,
        resizable: false,
        maximizable: false,
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: (config.isUpdate) ?
                'mgr/layouts/update' :
                'mgr/layouts/create'
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
            defaults: {
                border: false,
                layout: 'form',
                autoHeight: true,
                cls: 'main-wrapper',
                deferredRender: false,
                forceLayout: true,
                bodyStyle: 'max-height: ' + (Math.max(document.documentElement.clientHeight, window.innerHeight || 0) - 150) + 'px;'
            },
            items: [{
                title: _('contentblocks.general'),
                items: [{
                    xtype: 'textfield',
                    name: 'name',
                    fieldLabel: _('contentblocks.name'),
                    allowBlank: false,
                    anchor: '100%',
                    maxLength: 255
                },{
                    xtype: 'textarea',
                    name: 'description',
                    fieldLabel: _('contentblocks.description'),
                    allowBlank: true,
                    anchor: '100%',
                    maxLength: 1024
                },{
                    xtype: 'contentblocks-combo-category',
                    name: 'category',
                    fieldLabel: _('contentblocks.category'),
                    allowBlank: true,
                    anchor: '100%'
                },{
                    xtype: 'contentblocks-combo-icons',
                    name: 'icon',
                    formId: config.id,
                    fieldLabel: _('contentblocks.icon'),
                    allowBlank: false,
                    anchor: '100%',
                    maxLength: 255,
                    value: 'layout_1',
                    listeners: {
                        select: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this},
                        change: this.iconChange,
                        blur: {fn: function(fld) {
                            fld.fireEvent('change', fld);
                        }, scope: this}
                    }
                },{
                    xtype: 'hidden',
                    name: 'icon_type',
                    value: 'core',
                    id: config.id + '-icon_type',
                    fieldLabel: 'icon type',
                    anchor: '100%',
                    maxLength: 255,
                    listWidth: 435
                },{
                    xtype: 'numberfield',
                    name: 'sortorder',
                    fieldLabel: _('contentblocks.sortorder'),
                    allowBlank: false,
                    anchor: '100%',
                    maxLength: 5,
                    value: 0
                }]
            },{
                title: _('contentblocks.template'),
                items: [{
                    xtype: 'panel',
                    cls: 'panel-desc',
                    html: '<p>' + _('contentblocks.template.description') + '</p>'
                },{
                    xtype: Ext.ComponentMgr.isRegistered('modx-texteditor') ? 'modx-texteditor' : 'textarea',
                    mimeType: 'text/html',
                    name: 'template',
                    id: config.id + '-template',
                    //fieldLabel: _('contentblocks.template'),
                    allowBlank: true,
                    anchor: '100%',
                    grow: true,
                    growMin: 150,
                    growMax: 300
                }]
            },{
                title: _('contentblocks.columns'),
                items: [{
                    xtype: 'panel',
                    cls: 'panel-desc',
                    html: '<p>' + _('contentblocks.columns.description') + '</p>'
                },{
                    xtype: 'contentblocks-grid-layoutcolumns',
                    id: config.id + '-grid'
                }]
            },{
                title: _('contentblocks.availability'),
                id: config.id + '-availability',
                items: [{
                    xtype: 'panel',
                    cls: 'panel-desc',
                    html: '<p>' + _('contentblocks.availability.layout_description') + '</p>'
                },{
                    xtype: 'contentblocks-grid-availability',
                    id: config.id + '-availability-grid'
                },{
                    layout: 'form',
                    bodyStyle: 'padding-top: 10px;',
                    items: [{
                        fieldLabel: _('contentblocks.availibility.times_per_page'),
                        description: _('contentblocks.availibility.times_per_page.description'),
                        xtype: 'numberfield',
                        name: 'times_per_page',
                        anchor: '100%',
                        allowNegative:false,
                        maxLength: 255,
                        allowBlank: true
                    },{
                        boxLabel: _('contentblocks.availibility.only_nested'),
                        description: _('contentblocks.availibility.only_nested.description'),
                        xtype: 'checkbox',
                        name: 'layout_only_nested',
                        allowBlank: true,
                        inputValue: 1
                    }]
                }]
            },{
                title: _('contentblocks.settings'),
                id: config.id + '-settings',
                items: [{
                    xtype: 'panel',
                    cls: 'panel-desc',
                    html: '<p>' + _('contentblocks.settings.layout_description') + '</p>'
                },{
                    xtype: 'contentblocks-grid-settings',
                    id: config.id + '-settings-grid'
                }]
            }]
        }],

        keys: [],
        buttons: this.getButtons(config)
    });
    ContentBlocksComponent.window.Layout.superclass.constructor.call(this,config);
    this.on('beforeSubmit', this.beforeSubmit);
    this.on('render', this.onRenderInit);
};
Ext.extend(ContentBlocksComponent.window.Layout, MODx.Window, {
    editor: null,

    onRenderInit: function() {
        var grid = Ext.getCmp(this.config.id + '-grid'),
            columns = this.record && this.record.columns ? this.record.columns : false,
            store = grid.getStore();

        if (columns) {
            Ext.iterate(columns, function(column) {
                var rec = new grid.propRecord(column);
                store.add(rec);
            });
        }

        var avGrid = Ext.getCmp(this.config.id + '-availability-grid'),
            availability = this.record && this.record.availability ? this.record.availability : false,
            avStore = avGrid.getStore();

        if (availability) {
            Ext.iterate(availability, function(av) {
                var rec = new avGrid.propRecord(av);
                avStore.add(rec);
            });
        }

        var settingGrid = Ext.getCmp(this.config.id + '-settings-grid'),
            settings = this.record && this.record.settings ? this.record.settings : false,
            settingsStore = settingGrid.getStore();

        if (settings) {
            Ext.iterate(settings, function(av) {
                var rec = new settingGrid.propRecord(av);
                settingsStore.add(rec);
            });
        }
    },

    beforeSubmit: function() {
        // Get column definitions
        var f = this.fp.getForm(),
            columns = [],
            grid = Ext.getCmp(this.config.id + '-grid'),
            data = grid.getStore().data;

        data.each(function(item) {
            columns.push(item.data);
        });

        // Get availability definitions
        var availability = [],
            avGrid = Ext.getCmp(this.config.id + '-availability-grid'),
            avData = avGrid.getStore().data;

        avData.each(function(item) {
            availability.push(item.data);
        });

        // Get setting definitions
        var settings = [],
            settingsGrid = Ext.getCmp(this.config.id + '-settings-grid'),
            settingsData = settingsGrid.getStore().data;

        settingsData.each(function(item) {
            settings.push(item.data);
        });

        columns = Ext.encode(columns);
        availability = Ext.encode(availability);
        settings = Ext.encode(settings);
        Ext.apply(f.baseParams, {columns: columns, availability: availability, settings: settings});
    },

    getButtons: function(config) {
        var b = [{
            text: _('cancel'),
            scope: this,
            handler: function() { this.hide(); }
        }];

        if (ContentBlocksConfig.permissions.layouts_save) {
            if (config.isUpdate) {
                b.push([{
                    text: _('save'),
                    scope: this,
                    handler: function () {
                        this.submit(false);
                    },
                    cls: 'primary-button'
                }, {
                    text: _('save_and_close'),
                    scope: this,
                    handler: this.submit,
                    cls: 'primary-button'
                }]);
            }
            else {
                b.push([{
                    text: _('save'),
                    scope: this,
                    handler: this.submit,
                    cls: 'primary-button'
                }]);
            }
        }

        return b;
    },

    iconChange: function(combo) {
        var f = Ext.getCmp(combo.formId),
            value = combo.getValue(),
            selected = combo.store.find('value', value),
            record = combo.getStore().getAt(selected);
        if (!record) {
            return;
        }
        var icon_type = Ext.getCmp(combo.formId + '-icon_type');
        icon_type.setValue(record.data.icon_type);
    }
});
Ext.reg('contentblocks-window-layout', ContentBlocksComponent.window.Layout);
