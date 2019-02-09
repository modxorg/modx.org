ContentBlocksComponent.window.TemplateBuilder = function (config) {
    config = config || {};
    this.id = config.id = config.id || Ext.id();
    var viewWidth = Ext.getBody().getViewSize().width;
    Ext.applyIf(config, {
        title: _('contentblocks.template_builder'),
        autoHeight: false,
        height: Ext.getBody().getViewSize().height - 100,
        y: 20,
        closeAction: 'destroy',
        modal: true,
        cls: 'contentblocks-template-builder',
        width: viewWidth > 1050 ? viewWidth - 100 : viewWidth - 50,
        fields: [
            {
                xtype: 'panel',
                id: config.id + '-canvas',
                cls: 'contentblocks-canvas',
                html: '<div id="' + config.id + '-canvas-target"><p style="text-align: center;">Loading data..</p></div>',
                bodyStyle: 'height:' + (Ext.getBody().getViewSize().height - 75) + '; overflow: scroll;'
            }
        ],
        buttons: [
            {
                text: _('save'),
                id: config.id + '-save',
                scope: this,
                handler: this.submit,
                cls: 'primary-button'
            }
        ],
        keys: []
    });
    ContentBlocksComponent.window.TemplateBuilder.superclass.constructor.call(this, config);
    this.on('show', this.init);
};
Ext.extend(ContentBlocksComponent.window.TemplateBuilder, MODx.Window, {
    submit: function () {
        var r = {};
        r.data = ContentBlocks.getData();
        this.fireEvent('success', r);
        this.close();
        return false;
    },

    init: function () {
        var win = this;
        MODx.Ajax.request({
            url: ContentBlocksComponent.config.connectorUrl,
            params: {
                action: 'mgr/template_builder/getvars'
            },
            listeners: {
                'success': {fn: function (r) {
                    window.ContentBlocksCategories = r.object.categories;
                    window.ContentBlocksFields = r.object.fields;
                    window.ContentBlocksLayouts = r.object.layouts;
                    window.ContentBlocksTemplates = r.object.templates;
                    window.ContentBlocksContents = win.config.cbContent;

                    ContentBlocks.render('#' + win.config.id + '-canvas-target');
                }, scope: win}
            }
        });
    }

});
Ext.reg('contentblocks-window-template-builder', ContentBlocksComponent.window.TemplateBuilder);
