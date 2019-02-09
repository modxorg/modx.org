ContentBlocksComponent.grid.Settings = function(config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config,{
		url: ContentBlocksComponent.config.connectorUrl,
        autoHeight: true,
        emptyText: _('no_results'),
		fields: [
            {name: 'fieldtype', type: 'string'},
            {name: 'fieldoptions', type: 'string'},
            {name: 'reference', type: 'string'},
            {name: 'title', type: 'string'},
            {name: 'default_value', type: 'string'},
            {name: 'field_is_exposed', type: 'string'},
            {name: 'process_tags', type: 'bool'},
            {name: 'image_source', type: 'int'},
            {name: 'image_directory', type: 'string'},
            {name: 'image_file_types', type: 'string'},
            {name: 'image_thumbnail_size', type: 'string'}
        ],
        paging: true,
		remoteSort: true,
        enableDragDrop: true,
        ddGroup: config.id,
        plugins: [new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true // enable scrolling support
        })],
		columns: [{
			header: _('contentblocks.title'),
			dataIndex: 'title',
			sortable: true,
			width: .30,
            editor: {
                xtype: 'textfield'
            }
		},{
			header: _('contentblocks.reference'),
			dataIndex: 'reference',
			sortable: true,
			width: .25,
            editor: {
                xtype: 'textfield',
                vtype: 'alphanum'
            },
            renderer: function (v) {
                return '<span style="color: #aaa;">[[+</span>' + v + '<span style="color:#aaa;">]]</span>';
            }
		},{
			header: _('contentblocks.fieldtype'),
			dataIndex: 'fieldtype',
			sortable: true,
			width: .20,
            editor: {
                xtype: 'contentblocks-combo-fieldtypes',
                renderer: true
            }
		},{
			header: _('contentblocks.default_value'),
			dataIndex: 'default_value',
			sortable: true,
            renderer: Ext.util.Format.htmlEncode,
			width: .25,
            editor: {
                xtype: 'textfield'
            }
		},{
			header: _('contentblocks.field_is_exposed'),
			dataIndex: 'field_is_exposed',
			sortable: false,
			width: .20,
            editor: {
                xtype: 'contentblocks-combo-field_is_exposed',
                renderer: true
            }
		}],
        tbar: [{
            text: _('contentblocks.add_setting'),
            handler: this.addSetting,
            scope: this
        }]
    });
    ContentBlocksComponent.grid.Settings.superclass.constructor.call(this,config);
    this.propRecord = Ext.data.Record.create(config.fields);
};
Ext.extend(ContentBlocksComponent.grid.Settings,MODx.grid.LocalGrid,{
    addSetting: function() {
        var win = MODx.load({
            xtype: 'contentblocks-window-settings',
            grid: this,
            listeners: {
                success: {fn: function(r) {
                    var s = this.getStore();
                    var rec = new this.propRecord(r);
                    s.add(rec);
                },scope: this},
                scope: this
            }
        });
        win.show();
    },
    editSetting: function() {
        var record = this.menu.record;

        var win = MODx.load({
            xtype: 'contentblocks-window-settings',
            isUpdate: true,
            record: record,
            grid: this,
            listeners: {
                success: {fn: function(r) {
                    var s = this.getStore();
                    var rec = s.getAt(this.menu.recordIndex);
                    rec.set('fieldtype',r.fieldtype);
                    rec.set('fieldoptions',r.fieldoptions);
                    rec.set('image_source',r.image_source);
                    rec.set('image_directory',r.image_directory);
                    rec.set('image_thumbnail_size',r.image_thumbnail_size);
                    rec.set('image_file_types',r.image_file_types);
                    rec.set('image_directory',r.image_directory);
                    rec.set('reference', r.reference);
                    rec.set('title',r.title);
                    rec.set('default_value',r.default_value);
                    rec.set('field_is_exposed',r.field_is_exposed);
                    rec.set('limit_to_current_context',r.limit_to_current_context);
                    rec.set('process_tags',r.process_tags);
                    this.getView().refresh();
                },scope: this},
                scope: this
            }
        });
        win.setValues(record);
        win.show();
    },
    
    duplicateSetting: function() {
        var record = Ext.apply({}, this.menu.record);

        var win = MODx.load({
            xtype: 'contentblocks-window-settings',
            record: record,
            grid: this,
            listeners: {
                success: {fn: function(r) {
                    var s = this.getStore();
                    var rec = new this.propRecord(r);
                    s.add(rec);
                }, scope: this},
                scope: this
            }
        });
        win.setValues(record);
        win.show();
    },

    deleteSetting: function() {
        Ext.Msg.confirm(_('warning'), _('contentblocks.delete_setting.confirm'), function(e) {
            if (e == 'yes') {
                this.getStore().removeAt(this.menu.recordIndex);
            }
        }, this);
    },

    getMenu: function() {
        var m = [];

        m.push({
            text: _('contentblocks.edit_setting'),
            handler: this.editSetting,
            scope: this
        },{
            text: _('contentblocks.duplicate_setting'),
            handler: this.duplicateSetting,
            scope: this
        },'-',{
            text: _('contentblocks.delete_setting'),
            handler: this.deleteSetting,
            scope: this
        });
        return m;
    }
});
Ext.reg('contentblocks-grid-settings',ContentBlocksComponent.grid.Settings);
