ContentBlocksComponent.grid.Fields = function(config) {
    config = config || {};
    var exp = new Ext.grid.RowExpander({
        tpl : new Ext.Template('<p style="margin-top: 8px">{description}</p>'),
        renderer : function(v, p, record){
            return record.get('description').length > 0 ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
        },
        expandOnEnter: false,
        expandOnDblClick: false
    });
    config.parent = config.parent || 0;
    config.parent_properties = config.parent_properties || [];
    config.id = config.id || 'contentblocks-grid-fields';
    Ext.applyIf(config,{
		url: ContentBlocksComponent.config.connectorUrl,
		baseParams: {
            action: 'mgr/fields/getlist',
            parent: config.parent
        },
        autosave: true,
        save_action: 'mgr/fields/update_from_grid',
        emptyText: _('no_results'),
		fields: [
            {name: 'id', type: 'int'},
            {name: 'parent', type: 'int'},
            {name: 'parent_properties', type: 'object'},
            {name: 'input', type: 'string'},
            {name: 'input_display', type: 'string'},
            {name: 'name', type: 'string'},
            {name: 'description', type: 'string'},
            {name: 'category', type: 'int'},
            {name: 'category_name', type: 'string'},
            {name: 'icon', type: 'string'},
            {name: 'icon_type', type: 'string'},
            {name: 'sortorder', type: 'int'},
            {name: 'template', type: 'string'},
            {name: 'properties', type: 'object'},
            {name: 'availability', type: 'object'},
            {name: 'layouts', type: 'string'},
            {name: 'times_per_page', type: 'int'},
            {name: 'times_per_layout', type: 'int'},
            {name: 'settings', type: 'object'}
        ],
        paging: true,
		remoteSort: true,
        plugins: [exp, new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true, // enable scrolling support
            listeners: {
                'afterrowmove': {
                    fn:this.onAfterRowMove,
                    scope:this
                }
            }
        })],
		columns: [exp, {
			header: _('contentblocks.id'),
			dataIndex: 'id',
			sortable: true,
			width: .05,
            hidden: true
		},{
			header: _('contentblocks.name'),
			dataIndex: 'name',
			sortable: true,
			width: config.parent === 0 ? .3 : .15,
            renderer: function(v, cell, record) {
                if (record.data.icon.length > 0 && config.parent === 0) {
                    var icon_type = (record.data.icon_type != '') ? record.data.icon_type : 'core',
                        icon_base_url = (icon_type == 'core') ? ContentBlocksComponent.config.assetsUrl + 'img/icons/' : ContentBlocksComponent.config.customIconUrl;
                    v = '<img class="contentblocks-icon" src="' + icon_base_url + record.data.icon + '.png" alt="' + record.data.icon + '" style=""> ' + v + ' <span class="contentblocks-id">(' + record.data.id + ')</span>';
                }
                return v;
            }
		},{
			header: _('contentblocks.category'),
			dataIndex: 'category',
			sortable: true,
			width: .15,
            editor: {
                xtype: 'contentblocks-combo-category',
                renderer: true
            }
		},{
			header: _('contentblocks.input'),
			dataIndex: 'input',
			sortable: true,
			width: .1,
            renderer: function (v, cell, record) {
                return record.data.input_display
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
    ContentBlocksComponent.grid.Fields.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.grid.Fields,MODx.grid.Grid,{
    getToolbarButtons: function(config) {
        var buttons = [];
        if (ContentBlocksConfig.permissions.fields_new) {
            buttons.push({
                text: _('contentblocks.add_field'),
                handler: this.addField,
                scope: this
            });
        }
        buttons.push('->');
        if (config.parent < 1) {
            buttons.push([{
                xtype: 'contentblocks-combo-inputs'
                , name: 'category'
                , id: config.id + '-input-filter'
                , emptyText: _('contentblocks.input')
                , listeners: {
                    'select': {fn: this.filterInputType, scope: this}
                },
                hidden: config.parent > 0
            }, {
                xtype: 'contentblocks-combo-category'
                , name: 'category'
                , id: config.id + '-category-filter'
                , emptyText: _('contentblocks.category')
                , listeners: {
                    'select': {fn: this.filterCategory, scope: this}
                },
                hidden: config.parent > 0
            }, {
                xtype: 'textfield'
                , id: config.id + '-search-filter'
                , emptyText: _('contentblocks.search')
                , listeners: {
                    'change': {fn: this.search, scope: this}
                    , 'render': {
                        fn: function (cmp) {
                            new Ext.KeyMap(cmp.getEl(), {
                                key: Ext.EventObject.ENTER
                                , fn: function () {
                                    this.fireEvent('change', this);
                                    this.blur();
                                    return true;
                                }
                                , scope: cmp
                            });
                        }, scope: this
                    }
                },
                hidden: config.parent > 0
            }, {
                xtype: 'button'
                , id: config.id + '-clear-filters'
                , text: _('filter_clear')
                , listeners: {
                    'click': {fn: this.clearFilter, scope: this}
                },
                hidden: config.parent > 0
            }]);
        }
        if (ContentBlocksConfig.permissions.fields_export) {
            buttons.push(['-', {
                text: _('contentblocks.export_fields'),
                handler: this.exportAllFields,
                scope: this
            }]);
        }
        if (ContentBlocksConfig.permissions.fields_import) {
            buttons.push(['-', {
                text: _('contentblocks.import_fields'),
                handler: this.importFields,
                scope: this
            }]);
        }

        return buttons;
    },

    addField: function() {
        if (!ContentBlocksConfig.permissions.fields_new) {
            return false;
        }
        var addWindow = {
            xtype: 'contentblocks-window-field',
            parent: this.config.parent,
            listeners: {
                success: {fn: function() {
                    this.refresh();
                },scope: this},
                scope: this
            }
        };

        // If the grid is showing subfields, enhance it with the parent properties and extra config options
        if (this.config.parent !== 0) {
            this.enhanceSubfieldWindow(addWindow);
        }

        var win = MODx.load(addWindow);
        win.show();
    },

    editField: function() {
        if (!ContentBlocksConfig.permissions.fields_edit) {
            return false;
        }
        var record = this.menu.record,
            editWindow = {
                xtype: 'contentblocks-window-field',
                record: record,
                isUpdate: true,
                listeners: {
                    success: {fn: function() {
                        this.refresh();
                    },scope: this},
                    scope: this
                }
            };

        // If the grid is showing subfields, enhance it with the parent properties and extra config options
        if (this.config.parent !== 0) {
            this.enhanceSubfieldWindow(editWindow);
        }

        var win = MODx.load(editWindow);
        win.setValues(record);
        win.show();
    },

    enhanceSubfieldWindow: function(window) {
        window.parent = this.config.parent;
        window.parent_name = this.config.parent_name;
        // get the parent properties for the input type selected in this window
        var id = this.config.id.substr(0, this.config.id.indexOf('-contentblocks-grid-fields')) + '-input',
            inputSelect = Ext.getCmp(id);

        if (inputSelect) {
            // Get the selected record
            var selectedValue = inputSelect.getValue(),
                selectedIndex = inputSelect.store.find('value', selectedValue),
                selectedRecord = inputSelect.getStore().getAt(selectedIndex);

            // Found it? Then pass along the parent properties
            if (selectedRecord) {
                window.parent_properties = selectedRecord.data.parent_properties;
            }
        }
        else {
            if (console) console.error('Input not found with id ', id);
        }
    },

    duplicateField: function() {
        if (!ContentBlocksConfig.permissions.fields_new || !ContentBlocksConfig.permissions.fields_edit) {
            return false;
        }
        var record =  vcJquery.extend(true, {}, this.menu.record);
        record.id = 0;

        var duplicateWindow = {
            xtype: 'contentblocks-window-field',
            record: record,
            isUpdate: false,
            isDuplicate: true,
            title: _('contentblocks.duplicate_field'),
            listeners: {
                success: {fn: function(r) {
                    this.refresh();
                },scope: this},
            scope: this
            }
        };

        // If the grid is showing subfields, enhance it with the parent properties and extra config options
        if (this.config.parent !== 0) {
            this.enhanceSubfieldWindow(duplicateWindow);
        }

        var win = MODx.load(duplicateWindow);

        win.setValues(record);
        win.show();
    },

    deleteField: function() {
        if (!ContentBlocksConfig.permissions.fields_delete) {
            return false;
        }
        var record = this.menu.record;

        MODx.msg.confirm({
            title: _('warning'),
            text: _('contentblocks.delete_field.confirm'),
            url: ContentBlocksComponent.config.connectorUrl,
            params: {
                id: record.id,
                action: 'mgr/fields/remove'
            },
            listeners: {
                'success':{fn: function(r) {
                    this.refresh();
                },scope:this}
            }
        });
    },

    getMenu: function() {
        var m = [];


        if (ContentBlocksConfig.permissions.fields_edit) {
            m.push({
                text: _('contentblocks.edit_field'),
                handler: this.editField,
                scope: this
            });
        }
        if (ContentBlocksConfig.permissions.fields_new && ContentBlocksConfig.permissions.fields_edit) {
            m.push({
                text: _('contentblocks.duplicate_field'),
                handler: this.duplicateField,
                scope: this
            });
        }
        if (ContentBlocksConfig.permissions.fields_export) {
            m.push({
                text: _('contentblocks.export_field'),
                handler: this.exportField,
                scope: this
            });
        }
        if (ContentBlocksConfig.permissions.fields_delete) {
            if (m.length > 0) {
                m.push('-');
            }
            m.push({
                text: _('contentblocks.delete_field'),
                handler: this.deleteField,
                scope: this
            });
        }
        return m;
    },

    exportField: function() {
        if (!ContentBlocksConfig.permissions.fields_export) {
            return false;
        }
        var record = this.menu.record;
        window.location = ContentBlocksComponent.config.connectorUrl + '?action=mgr/fields/export&items=' + record.id + '&HTTP_MODAUTH=' + MODx.siteId;
    },

    exportAllFields: function() {
        if (!ContentBlocksConfig.permissions.fields_export) {
            return false;
        }
        var that = this;
        Ext.Msg.confirm(_('contentblocks.export_fields'), _('contentblocks.export_fields.confirm'), function(e) {
            if (e == 'yes') {
                var url = ContentBlocksComponent.config.connectorUrl + '?action=mgr/fields/export&HTTP_MODAUTH=' + MODx.siteId;
                if (that.config.parent && that.config.parent > 0) {
                    url = url + '&parent=' + that.config.parent;
                }
                window.location = url;
            }
        });
    },

    importFields: function() {
        if (!ContentBlocksConfig.permissions.fields_import) {
            return false;
        }
        var win = MODx.load({
            xtype: 'contentblocks-window-import',
            title: _('contentblocks.import_fields.title'),
            introduction: _('contentblocks.import_fields.intro'),
            what: _('contentblocks.fields'),
            baseParams: {
                action: 'mgr/fields/import'
            },
            record: {
                parent: this.config.parent
            },
            listeners: {
                success: {fn: function(r) {
                    this.refresh();
                },scope: this},
                scope: this
            }
        });
        win.show();
    },

    onAfterRowMove: function(dt,sri,ri,sels) {
        var s = this.getStore(),
            total = s.getTotalCount(),
            offset = this.getBottomToolbar().cursor;

        // Loop over all rows to set the new sortorder
        var r;
        for (var x = 0; x<total; x++) {
            r = s.getAt(x);
            if (r) {
                r.set('sortorder', x + offset);

                var e = {
                    grid: this,
                    record: r,
                    cancel:false
                };
                this.fireEvent('afteredit', e);
                r.commit();
            }
        }
        return true;
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
    filterInputType : function(cb,nv,ov) {
        this.getStore().setBaseParam('type',cb.getValue());
        this.getBottomToolbar().changePage(1);
        this.refresh();
    },
    clearFilter: function() {
        this.getStore().baseParams = {
            action: 'mgr/fields/getlist'
        };
        Ext.getCmp(this.config.id + '-search-filter').reset();
        Ext.getCmp(this.config.id + '-category-filter').reset();
        Ext.getCmp(this.config.id + '-input-filter').reset();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('contentblocks-grid-fields',ContentBlocksComponent.grid.Fields);
