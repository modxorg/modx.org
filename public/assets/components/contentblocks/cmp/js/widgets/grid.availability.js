ContentBlocksComponent.grid.Availability = function(config) {
    config = config || {};
    config.id = config.id || Ext.id();
    Ext.applyIf(config,{
		url: ContentBlocksComponent.config.connectorUrl,
        autoHeight: true,
        emptyText: _('no_results'),
		fields: [
            {name: 'field', type: 'string'},
            {name: 'value', type: 'string'}
        ],
        paging: true,
		remoteSort: true,
        plugins: [new Ext.ux.dd.GridDragDropRowOrder({
            copy: false,
            scrollable: true // enable scrolling support
        })],
		columns: [{
			header: _('contentblocks.condition_field'),
			dataIndex: 'field',
			sortable: true,
			width: .35,
            editor: {
                xtype: 'contentblocks-combo-availabilityfield',
                renderer: true
            }
		},{
			header: _('contentblocks.condition_value'),
			dataIndex: 'value',
			sortable: true,
			width: .65,
            editor: {
                xtype: 'textfield'
            }
		}],
        tbar: [{
            text: _('contentblocks.add_condition'),
            handler: this.addCondition,
            scope: this
        }]
    });
    ContentBlocksComponent.grid.Availability.superclass.constructor.call(this,config);
    this.propRecord = Ext.data.Record.create(config.fields);
};
Ext.extend(ContentBlocksComponent.grid.Availability,MODx.grid.LocalGrid,{
    addCondition: function() {
        var win = MODx.load({
            xtype: 'contentblocks-window-availability',
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

    deleteCondition: function() {
        Ext.Msg.confirm(_('warning'), _('contentblocks.delete_condition.confirm'), function(e) {
            if (e == 'yes') {
                this.getStore().removeAt(this.menu.recordIndex);
            }
        }, this);
    },

    getMenu: function() {
        var m = [];

        m.push({
            text: _('contentblocks.delete_condition'),
            handler: this.deleteCondition,
            scope: this
        });
        return m;
    }
});
Ext.reg('contentblocks-grid-availability',ContentBlocksComponent.grid.Availability);
