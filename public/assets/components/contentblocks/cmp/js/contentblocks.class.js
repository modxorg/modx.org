var ContentBlocksComponent = function(config) {
    config = config || {};
    ContentBlocksComponent.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},tabs:{},combo:{},
    config: {
        connectorUrl: ''
    },
    attribution: function() {
        return {
            xtype: 'panel',
            bodyStyle: 'text-align: right; background: none; padding: 10px 0;',
            html: '<a href="https://www.modmore.com/contentblocks/"><img src="' + ContentBlocksComponent.config.assetsUrl + 'img/small_modmore_logo.png" alt="a modmore product" /></a>',
            border: false,
            width: '98%',
            hidden: ContentBlocksComponent.config.hideLogo
        };
    }
});
Ext.reg('contentblocks',ContentBlocksComponent);
ContentBlocksComponent = new ContentBlocksComponent();
