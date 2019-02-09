ContentBlocksComponent.window.Template = function (config) {
    config = config || {};
    config.id = config.id || Ext.id(),
        Ext.applyIf(config, {
            title: (config.isUpdate) ?
                _('contentblocks.edit_template') :
                _('contentblocks.add_template'),
            autoHeight: true,
            resizable: false,
            maximizable: false,
            url: ContentBlocksComponent.config.connectorUrl,
            baseParams: {
                action: (config.isUpdate) ?
                    'mgr/templates/update' :
                    'mgr/templates/create'
            },
            width: 750,
            y: 20,
            bodyCssClass: 'cb-window-vtabs',
            fields: [
                {
                    xtype: 'hidden',
                    name: 'id'
                },
                {
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
                            id: config.id + '-icon',
                            formId: config.id,
                            fieldLabel: _('contentblocks.icon'),
                            allowBlank: false,
                            anchor: '100%',
                            maxLength: 255,
                            listWidth: 435,
                            value: 'template_03',
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
                        },{
                            xtype: 'hidden',
                            name: 'content',
                            id: config.id + '-content'
                        },{
                            xtype: 'button',
                            text: _('contentblocks.open_template_builder'),
                            cls: 'primary-button',
                            handler: this.openTemplateBuilder,
                            scope: this,
                            anchor: '100%'
                        }]
                    },{
                        title: _('contentblocks.availability'),
                        id: config.id + '-availability',
                        items: [{
                            xtype: 'panel',
                            cls: 'panel-desc',
                            html: '<p>' + _('contentblocks.availability.template_description') + '</p>'
                        },{
                            xtype: 'contentblocks-grid-availability',
                            id: config.id + '-availability-grid'
                        }]
                    }]
                }
            ],

            listeners: {
                render: {fn: this.initWindow, scope: this},
                scope: this
            },

            keys: [],
            buttons: this.getWindowButtons(config)
        });
    ContentBlocksComponent.window.Template.superclass.constructor.call(this, config);
    this.on('beforeSubmit', this.beforeSubmit);
    this.on('render', this.initWindow);
};
Ext.extend(ContentBlocksComponent.window.Template, MODx.Window, {
    propHolder: null,
    getWindowButtons: function (config) {
        var b = [{
            text: _('cancel'),
            scope: this,
            handler: function () {
                this.hide();
            }
        }, '-'];

        if (ContentBlocksConfig.permissions.templates_save) {
            if (config.isUpdate) {
                b.push([{
                    text: _('save'),
                    handler: function () {
                        this.submit(false);
                    },
                    scope: this,
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

    openTemplateBuilder: function () {
        var contentHolder = Ext.getCmp(this.config.id + '-content'),
            content = contentHolder.getValue();

        var win = MODx.load({
            xtype: 'contentblocks-window-template-builder',
            cbContent: Ext.decode(content),
            listeners: {
                success: {fn: function (r) {
                    contentHolder.setValue(r.data);
                }, scope: this}
            }
        });

        win.show();
    },

    beforeSubmit: function () {
        var f = this.fp.getForm(),
            availability = [],
            grid = Ext.getCmp(this.config.id + '-availability-grid'),
            data = grid.getStore().data;

        data.each(function (item) {
            availability.push(item.data);
        });

        availability = Ext.encode(availability);

        Ext.apply(f.baseParams, {availability: availability});
    },

    initWindow: function () {
        var grid = Ext.getCmp(this.config.id + '-availability-grid'),
            availability = this.record && this.record.availability ? this.record.availability : false,
            store = grid.getStore();

        if (availability) {
            Ext.iterate(availability, function (av) {
                var rec = new grid.propRecord(av);
                store.add(rec);
            });
        }
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
Ext.reg('contentblocks-window-template', ContentBlocksComponent.window.Template);
