ContentBlocksComponent.grid.Defaults = function (config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config, {
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/defaults/getlist'
        },
        autosave: true,
        save_action: 'mgr/defaults/update_from_grid',
        autoHeight: true,
        emptyText: _('no_results'),
        fields: [
            {name: 'id', type: 'int'},
            {name: 'constraint_field', type: 'string'},
            {name: 'constraint_value', type: 'string'},
            {name: 'default_template', type: 'int'},
            {name: 'target_layout', type: 'int'},
            {name: 'target_field', type: 'int'},
            {name: 'target_column', type: 'string'},
            {name: 'sortorder', type: 'int'}
        ],
        paging: true,
        remoteSort: true,
        plugins: [new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true, // enable scrolling support
            listeners: {
                'afterrowmove': {
                    fn: this.onAfterRowMove,
                    scope: this
                }
            }
        })],
        columns: [
            {
                header: _('contentblocks.constraint_field'),
                dataIndex: 'constraint_field',
                sortable: true,
                width: .30,
                editor: {
                    xtype: 'contentblocks-combo-availabilityfield',
                    renderer: true
                }
            },
            {
                header: _('contentblocks.constraint_value'),
                dataIndex: 'constraint_value',
                sortable: false,
                width: .20,
                editor: {
                    xtype: 'textfield'
                }
            },
            {
                header: _('contentblocks.default_template'),
                dataIndex: 'default_template',
                sortable: false,
                width: .25,
                editor: {
                    xtype: 'contentblocks-combo-templates',
                    renderer: true
                },
                editable: false
            },
            {
              header: _('contentblocks.target_layout'),
              dataIndex: 'target_layout',
              sortable: false,
              width: .25,
              editor: {
                xtype: 'contentblocks-combo-layouts',
                renderer: true
              },
              editable: false
            },
            {
              header: _('contentblocks.target_column'),
              dataIndex: 'target_column',
              sortable: false,
              width: .20,
              editor: {
                xtype: 'textfield'
              },
              editable: false
            },
            {
                header: _('contentblocks.target_field'),
                dataIndex: 'target_field',
                sortable: false,
                width: .20,
                editor: {
                    xtype: 'contentblocks-combo-fields',
                    renderer: true
                },
                editable: false

            }
        ],
        tbar: this.getToolbarButtons(config)
    });
    ContentBlocksComponent.grid.Defaults.superclass.constructor.call(this, config);
    this.propRecord = Ext.data.Record.create(config.fields);
};
Ext.extend(ContentBlocksComponent.grid.Defaults, MODx.grid.Grid, {
    getToolbarButtons: function(config) {
        var buttons = [];
        if (ContentBlocksConfig.permissions.defaults_new) {
            buttons.push({
                text: _('contentblocks.add_default'),
                handler: this.addDefault,
                scope: this
            });
        }
        return buttons;
    },

    addDefault: function () {
        if (!ContentBlocksConfig.permissions.defaults_new) {
            return false;
        }
        var win = MODx.load({
            xtype: 'contentblocks-window-defaults',
            listeners: {
                success: {fn: function (r) {
                    this.refresh();
                }, scope: this},
                scope: this
            }
        });
        win.show();
    },

    editDefault: function () {
        if (!ContentBlocksConfig.permissions.defaults_edit) {
            return false;
        }
        var record = this.menu.record;
        var win = MODx.load({
            xtype: 'contentblocks-window-defaults',
            record: record,
            isUpdate: true,
            initCount: 0,
            listeners: {
                success: {fn: function () {
                    this.refresh();
                }, scope: this},
                scope: this
            }
        });
        win.setValues(record);
        win.show();
    },


    deleteDefault: function () {
        if (!ContentBlocksConfig.permissions.defaults_delete) {
            return false;
        }
        var record = this.menu.record;

        MODx.msg.confirm({
            title: _('warning'),
            text: _('contentblocks.delete_default.confirm'),
            url: ContentBlocksComponent.config.connectorUrl,
            params: {
                id: record.id,
                action: 'mgr/defaults/remove'
            },
            listeners: {
                'success': {fn: function (r) {
                    this.refresh();
                }, scope: this}
            }
        });
    },

    getMenu: function () {
        var m = [];

        if (ContentBlocksConfig.permissions.defaults_edit) {
            m.push({
                text: _('contentblocks.edit_default'),
                handler: this.editDefault,
                scope: this
            });
        }

        if (ContentBlocksConfig.permissions.defaults_delete) {
            if (m.length > 0) {
                m.push('-');
            }
            m.push({
                text: _('contentblocks.delete_default'),
                handler: this.deleteDefault,
                scope: this
            });
        }

        return m;
    },

    onAfterRowMove: function (dt, sri, ri, sels) {
        var s = this.getStore(),
            total = s.getTotalCount(),
            offset = this.getBottomToolbar().cursor;

        // Loop over all rows to set the new sortorder
        var r;
        for (var x = 0; x < total; x++) {
            r = s.getAt(x);
            if (r) {
                r.set('sortorder', x + offset);

                var e = {
                    grid: this,
                    record: r,
                    cancel: false
                };
                this.fireEvent('afteredit', e);
                r.commit();
            }
        }
        return true;
    }
});
Ext.reg('contentblocks-grid-defaults', ContentBlocksComponent.grid.Defaults);
