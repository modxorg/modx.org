ContentBlocksComponent.grid.Templates = function (config) {
    config = config || {};
    var exp = new Ext.grid.RowExpander({
        tpl: new Ext.Template('<p style="margin-top: 8px">{description}</p>'),
        renderer: function (v, p, record) {
            return record.get('description').length > 0 ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
        },
        expandOnEnter: false,
        expandOnDblClick: false
    });
    Ext.applyIf(config, {
        url: ContentBlocksComponent.config.connectorUrl,
        id: 'contentblocks-grid-templates',
        baseParams: {
            action: 'mgr/templates/getlist'
        },
        autosave: true,
        save_action: 'mgr/templates/update_from_grid',
        emptyText: _('no_results'),
        fields: [
            {name: 'id', type: 'int'},
            {name: 'name', type: 'string'},
            {name: 'description', type: 'string'},
            {name: 'sortorder', type: 'int'},
            {name: 'category', type: 'int'},
            {name: 'category_name', type: 'string'},
            {name: 'icon', type: 'string'},
            {name: 'icon_type', type: 'string'},
            {name: 'content', type: 'object'},
            {name: 'availability', type: 'object'}
        ],
        paging: true,
        remoteSort: true,
        plugins: [exp,new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true, // enable scrolling support
            listeners: {
                'afterrowmove': {
                    fn: this.onAfterRowMove,
                    scope: this
                }
            }
        })],
        columns: [exp, {
            header: _('contentblocks.id'),
            dataIndex: 'id',
            sortable: true,
            width: .05,
            hidden: true
        }, {
            header: _('contentblocks.name'),
            dataIndex: 'name',
            sortable: true,
            width: .2,
            renderer: function (v, cell, record) {
                if (record.data.icon.length > 0) {
                    var icon_type = (record.data.icon_type != '') ? record.data.icon_type : 'core',
                        icon_base_url = (icon_type == 'core') ? ContentBlocksComponent.config.assetsUrl + 'img/icons/' : ContentBlocksComponent.config.customIconUrl;
                    v = '<img class="contentblocks-icon" src="' + icon_base_url + record.data.icon + '.png" alt="' + record.data.icon + '" style=""> ' + v + ' <span class="contentblocks-id">(' + record.data.id + ')</span>';
                }
                return v;
            }
        }, {
            header: _('contentblocks.category'),
            dataIndex: 'category',
            sortable: true,
            width: .15,
            editor: {
                xtype: 'contentblocks-combo-category',
                renderer: true
            }
        },{
            header: _('contentblocks.sortorder'),
            dataIndex: 'sortorder',
            sortable: true,
            width: .05,
            editor: {
                xtype: 'numberfield'
            }
        }],
        tbar: this.getToolbarButtons(config)
    });
    ContentBlocksComponent.grid.Templates.superclass.constructor.call(this, config);
};
Ext.extend(ContentBlocksComponent.grid.Templates, MODx.grid.Grid, {
    getToolbarButtons: function(config) {
        var buttons = [];

        if (ContentBlocksConfig.permissions.templates_new) {
            buttons.push({
                text: _('contentblocks.add_template'),
                handler: this.addTemplate,
                scope: this
            });
        }

        buttons.push(['->',{
            xtype: 'contentblocks-combo-category',
            name: 'category',
            id: 'contentblocks-templates-category-filter',
            emptyText: _('contentblocks.category'),
            listeners: {
                'select': {fn:this.filterCategory,scope:this}
            }
        }, {
            xtype: 'textfield',
            id: 'contentblocks-templates-search-filter',
            emptyText: _('contentblocks.search'),
            listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        },{
            xtype: 'button',
            id: 'contentblocks-templates-clear-filters',
            text: _('filter_clear'),
            listeners: {
                'click': {fn: this.clearFilter, scope: this}
            }
        }]);

        if (ContentBlocksConfig.permissions.templates_export) {
            buttons.push({
                text: _('contentblocks.export_templates'),
                handler: this.exportAllTemplates,
                scope: this
            });
        }
        if (ContentBlocksConfig.permissions.templates_export) {
            buttons.push({
                text: _('contentblocks.import_templates'),
                handler: this.importTemplates,
                scope: this
            });
        }

        return buttons;
    },
    addTemplate: function () {
        if (!ContentBlocksConfig.permissions.templates_new) {
            return false;
        }
        var win = MODx.load({
            xtype: 'contentblocks-window-template',
            listeners: {
                success: {fn: function () {
                    this.refresh();
                }, scope: this},
                scope: this
            }
        });
        win.show();
    },

    editTemplate: function () {
        if (!ContentBlocksConfig.permissions.templates_edit) {
            return false;
        }
        var record = this.menu.record;
        var win = MODx.load({
            xtype: 'contentblocks-window-template',
            record: record,
            isUpdate: true,
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

    duplicateTemplate: function () {
        if (!ContentBlocksConfig.permissions.templates_new || !ContentBlocksConfig.permissions.templates_edit) {
            return false;
        }
        var record =  vcJquery.extend(true, {}, this.menu.record);
        record.id = 0;
        record.name = _('duplicate_of', {name: record.name});
        var win = MODx.load({
            xtype: 'contentblocks-window-template',
            record: record,
            isUpdate: false,
            title: _('contentblocks.duplicate_template'),
            listeners: {
                success: {fn: function (r) {
                    this.refresh();
                }, scope: this},
                scope: this
            }
        });
        win.setValues(record);
        win.show();
    },


    deleteTemplate: function () {
        if (!ContentBlocksConfig.permissions.templates_delete) {
            return false;
        }
        var record = this.menu.record;

        MODx.msg.confirm({
            title: _('warning'),
            text: _('contentblocks.delete_template.confirm'),
            url: ContentBlocksComponent.config.connectorUrl,
            params: {
                id: record.id,
                action: 'mgr/templates/remove'
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

        if (ContentBlocksConfig.permissions.templates_edit) {
            m.push({
                text: _('contentblocks.edit_template'),
                handler: this.editTemplate,
                scope: this
            });
        }

        if (ContentBlocksConfig.permissions.templates_edit && ContentBlocksConfig.permissions.templates_new) {
            m.push({
                text: _('contentblocks.duplicate_template'),
                handler: this.duplicateTemplate,
                scope: this
            });
        }

        if (ContentBlocksConfig.permissions.templates_export) {
            m.push({
                text: _('contentblocks.export_template'),
                handler: this.exportTemplate,
                scope: this
            });
        }

        if (ContentBlocksConfig.permissions.templates_delete) {
            if (m.length > 0) {
                m.push('-');
            }
            m.push({
                text: _('contentblocks.delete_template'),
                handler: this.deleteTemplate,
                scope: this
            });
        }

        return m;
    },

    exportTemplate: function() {
        if (!ContentBlocksConfig.permissions.templates_export) {
            return false;
        }
        var record = this.menu.record;
        window.location = ContentBlocksComponent.config.connectorUrl + '?action=mgr/templates/export&items=' + record.id + '&HTTP_MODAUTH=' + MODx.siteId;
    },

    exportAllTemplates: function () {
        if (!ContentBlocksConfig.permissions.templates_export) {
            return false;
        }
        Ext.Msg.confirm(_('contentblocks.export_templates'), _('contentblocks.export_templates.confirm'), function (e) {
            if (e == 'yes') {
                window.location = ContentBlocksComponent.config.connectorUrl + '?action=mgr/templates/export&HTTP_MODAUTH=' + MODx.siteId;
            }
        });
    },

    importTemplates: function () {
        if (!ContentBlocksConfig.permissions.templates_import) {
            return false;
        }
        var win = MODx.load({
            xtype: 'contentblocks-window-import',
            title: _('contentblocks.import_templates.title'),
            introduction: _('contentblocks.import_templates.intro'),
            what: _('contentblocks.templates'),
            baseParams: {
                action: 'mgr/templates/import'
            },
            listeners: {
                success: {fn: function (r) {
                    this.refresh();
                }, scope: this},
                scope: this
            }
        });
        win.show();
    },
    search: function(tf,nv,ov) {
        this.getStore().setBaseParam('search',tf.getValue());
        this.getBottomToolbar().changePage(1);
        this.refresh();
    },
    filterCategory: function(cb,nv,ov) {
        this.getStore().setBaseParam('category',cb.getValue());
        this.getBottomToolbar().changePage(1);
        this.refresh();
    },
    clearFilter: function() {
        this.getStore().baseParams = {
            action: 'mgr/templates/getlist'
        };
        Ext.getCmp('contentblocks-templates-search-filter').reset();
        Ext.getCmp('contentblocks-templates-category-filter').reset();
        this.getBottomToolbar().changePage(1);
        this.refresh();
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
Ext.reg('contentblocks-grid-templates', ContentBlocksComponent.grid.Templates);
