ContentBlocksComponent.panel.RepeaterGroups = function (config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config, {
        layout: 'form',
        items: [
            {
                xtype: 'hidden',
                id: config.id + '-hidden-field',
                name: config.name,
                value: config.value
            },
            {
                xtype: 'contentblocks-grid-repeater-groups',
                hiddenFieldId: config.id + '-hidden-field',
                initialValue: config.value
            }
        ]
    });
    ContentBlocksComponent.panel.RepeaterGroups.superclass.constructor.call(this, config);
};
Ext.extend(ContentBlocksComponent.panel.RepeaterGroups, MODx.Panel, {});
Ext.reg('contentblocks-repeater-groups', ContentBlocksComponent.panel.RepeaterGroups);

ContentBlocksComponent.grid.RepeaterGroups = function (config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config, {
        url: ContentBlocksComponent.config.connectorUrl,
        autoHeight: true,
        emptyText: _('no_results'),
        fields: [
            {name: 'key', type: 'string'},
            {name: 'width', type: 'string'},
            {name: 'input', type: 'string'},
            {name: 'name', type: 'string'},
            {name: 'sortorder', type: 'int'},
            {name: 'template', type: 'string'},
            {name: 'properties', type: 'object'}
        ],
        paging: true,
        remoteSort: true,
        plugins: [new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true, // enable scrolling support
            listeners: {
                'afterrowmove': {
                    fn:this.updateHiddenField,
                    scope:this
                }
            }
        })],
        columns: [
            {
                header: _('contentblocks.name'),
                dataIndex: 'name',
                sortable: true,
                width: .30,
                editor: {
                    xtype: 'textfield',
                    listeners: {
                        change: this.updateHiddenField,
                        scope: this
                    }
                }
            },
            {
                header: _('contentblocks.repeater.key'),
                dataIndex: 'key',
                sortable: true,
                width: .25,
                editor: {
                    xtype: 'textfield',
                    vtype: 'alphanum',
                    listeners: {
                        change: this.updateHiddenField,
                        scope: this
                    }
                },
                renderer: function (v) {
                    return '<span style="color: #aaa;">[[+</span>' + v + '<span style="color:#aaa;">]]</span>';
                }
            },
            {
                header: _('contentblocks.input'),
                dataIndex: 'input',
                sortable: true,
                width: .20
            },
            {
                header: _('contentblocks.width'),
                dataIndex: 'width',
                sortable: true,
                width: .25,
                editor: {
                    xtype: 'numberfield',
                    listeners: {
                        change: this.updateHiddenField,
                        scope: this
                    }
                },
                renderer: function(v) {
                    return v + '%';
                }
            }
        ],
        tbar: [
            {
                text: _('contentblocks.add_field'),
                handler: this.addField,
                scope: this
            }
        ]
    });
    ContentBlocksComponent.grid.RepeaterGroups.superclass.constructor.call(this, config);
    this.propRecord = Ext.data.Record.create(config.fields);
    this.on('render', this.initData);
};
Ext.extend(ContentBlocksComponent.grid.RepeaterGroups, MODx.grid.LocalGrid, {
    hiddenField: false,
    updateHiddenField: function () {
        if (!this.hiddenField) {
            this.hiddenField = Ext.getCmp(this.config.hiddenFieldId);
        }

        var data = [];

        this.store.each(function (record) {
            data.push(record.data);
        });

        this.hiddenField.setValue(Ext.encode(data));
    },

    initData: function () {
        var data = Ext.decode(this.config.initialValue),
            grid = this,
            store = grid.getStore();

        if (data) {
            Ext.iterate(data, function (av) {
                var rec = new grid.propRecord(av);
                store.add(rec);
            });
        }
    },

    addField: function () {
        var win = MODx.load({
            xtype: 'contentblocks-window-repeater-field',
            grid: this,
            listeners: {
                success: {fn: function (r) {
                    var s = this.getStore();
                    var rec = new this.propRecord(r);
                    s.add(rec);

                    this.updateHiddenField();
                }, scope: this},
                scope: this
            }
        });
        win.show();
    },
    editField: function () {
        var record = this.menu.record;

        var win = MODx.load({
            xtype: 'contentblocks-window-repeater-field',
            isUpdate: true,
            record: record,
            grid: this,
            listeners: {
                success: {fn: function (r) {
                    var s = this.getStore(),
                        rec = s.getAt(this.menu.recordIndex),
                        fields = this.config.fields;

                    Ext.each(fields, function (fld) {
                        rec.set(fld.name, r[fld.name]);
                    });

                    this.getView().refresh();

                    this.updateHiddenField();
                }, scope: this},
                scope: this
            }
        });
        win.setValues(record);
        win.show();
    },

    deleteField: function () {
        Ext.Msg.confirm(_('warning'), _('contentblocks.delete_field.confirm'), function (e) { // @todo maybe use different warning text?
            if (e == 'yes') {
                this.getStore().removeAt(this.menu.recordIndex);
                this.updateHiddenField();
            }
        }, this);
    },

    getMenu: function () {
        var m = [];

        m.push({
            text: _('contentblocks.edit_field'),
            handler: this.editField,
            scope: this
        }, '-', {
            text: _('contentblocks.delete_field'),
            handler: this.deleteField,
            scope: this
        });
        return m;
    }
});
Ext.reg('contentblocks-grid-repeater-groups', ContentBlocksComponent.grid.RepeaterGroups);
