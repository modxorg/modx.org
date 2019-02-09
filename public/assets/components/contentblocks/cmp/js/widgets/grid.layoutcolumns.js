ContentBlocksComponent.grid.LayoutColumns = function(config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config,{
		url: ContentBlocksComponent.config.connectorUrl,
        autoHeight: true,
        emptyText: _('no_results'),
		fields: [
            {name: 'reference', type: 'string'},
            {name: 'width', type: 'int'}
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
			header: _('contentblocks.reference'),
			dataIndex: 'reference',
			sortable: false,
			width: .6,
            editor: {
                xtype: 'textfield',
                vtype: 'alphanum'
            },
            renderer: function (v) {
                return '<span style="color: #aaa;">[[+</span>' + v + '<span style="color:#aaa;">]]</span>';
            }
		},{
			header: _('contentblocks.width'),
			dataIndex: 'width',
			sortable: false,
			width: .4,
            editor: {
                xtype: 'numberfield'
            },
            renderer: function(value) { return value + '%'; }
		}],
        tbar: [{
            text: _('contentblocks.add_layoutcolumn'),
            handler: this.addLayoutColumn,
            scope: this
        }]
    });
    ContentBlocksComponent.grid.LayoutColumns.superclass.constructor.call(this,config);
    this.propRecord = Ext.data.Record.create(config.fields);
};
Ext.extend(ContentBlocksComponent.grid.LayoutColumns,MODx.grid.LocalGrid,{
    addLayoutColumn: function() {
        var win = MODx.load({
            xtype: 'contentblocks-window-layoutcolumn',
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

    deleteLayoutColumn: function() {
        Ext.Msg.confirm(_('warning'), _('contentblocks.delete_layoutcolumn.confirm'), function(e) {
            if (e == 'yes') {
                this.getStore().removeAt(this.menu.recordIndex);
            }
        }, this);
    },

    getMenu: function() {
        var m = [];

        m.push({
            text: _('contentblocks.delete_layoutcolumn'),
            handler: this.deleteLayoutColumn,
            scope: this
        });
        return m;
    }
});
Ext.reg('contentblocks-grid-layoutcolumns',ContentBlocksComponent.grid.LayoutColumns);
