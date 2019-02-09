Ext.onReady(function() {
    MODx.load({
        xtype: 'contentblocks-page-home',
        renderTo: 'contentblocks-admin-home'
    });
});
 
ContentBlocksComponent.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        border: false,
        id : 'contentblocks-page-wrapper',
        components: [{
            cls: 'container form-with-labels',
            xtype: 'modx-formpanel',
            items: [{
                html: '<h2>' + _('contentblocks.mgr.home') + '</h2>',
                border: false,
                id: 'modx-contentblocks-header',
                cls: 'modx-page-header'
            }, {
                xtype: 'modx-tabs',
                id: 'contentblocks-page-home-tabs',
                width: '98%',
                border: false,

                stateful: true,
                stateId: 'contentblocks-page-home',
                stateEvents: ['tabchange'],
                getState: function () {
                    return {
                        activeTab: this.items.indexOf(this.getActiveTab())
                    };
                },

                defaults: {
                    border: false,
                    autoHeight: true,
                    defaults: {
                        border: false
                    }
                },
                items: this.getTabs(config)
            }, ContentBlocksComponent.attribution()],
        }],
        buttons: this.getButtons(config)
    });
    ContentBlocksComponent.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.page.Home,MODx.Component,{
    getTabs: function(config) {
        var tabs = [];
        if (ContentBlocksConfig.permissions.fields) {
            tabs.push({
                title: _('contentblocks.fields'),
                id: 'contentblocks-page-home-tabs-fields',
                hidden: true,
                hideLabel: true,
                items: [{
                    xtype: 'panel',
                    bodyCssClass: 'panel-desc',
                    html: '<p>' + _('contentblocks.field_desc') + '</p>'
                }, {
                    xtype: 'contentblocks-grid-fields',
                    cls: 'main-wrapper'
                }]
            });
        }
        if (ContentBlocksConfig.permissions.layouts) {
            tabs.push({
                title: _('contentblocks.layouts'),
                id: 'contentblocks-page-home-tabs-layouts',
                items: [{
                    xtype: 'panel',
                    bodyCssClass: 'panel-desc',
                    html: '<p>' + _('contentblocks.layout_desc') + '</p>'
                },{
                    xtype: 'contentblocks-grid-layouts',
                    cls: 'main-wrapper'
                }]
            });
        }
        if (ContentBlocksConfig.permissions.templates) {
            tabs.push({
                title: _('contentblocks.templates'),
                id: 'contentblocks-page-home-tabs-templates',
                items: [{
                    xtype: 'panel',
                    bodyCssClass: 'panel-desc',
                    html: '<p>' + _('contentblocks.templates_desc') + '</p>'
                },{
                    xtype: 'contentblocks-grid-templates',
                    cls: 'main-wrapper'
                }]
            });
        }
        tabs.push({
            xtype: 'tbfill'
        });

        if (ContentBlocksConfig.permissions.categories) {
            tabs.push({
                title: _('contentblocks.categories'),
                id: 'contentblocks-page-home-tabs-categories',
                items: [{
                    xtype: 'panel',
                    bodyCssClass: 'panel-desc',
                    html: '<p>' + _('contentblocks.categories.intro') + '</p>'
                },{
                    xtype: 'contentblocks-grid-categories',
                    cls: 'main-wrapper'
                }]
            });
        }
        if (ContentBlocksConfig.permissions.defaults) {
            tabs.push({
                title: _('contentblocks.defaults'),
                id: 'contentblocks-page-home-tabs-defaults',
                items: [{
                    xtype: 'panel',
                    bodyCssClass: 'panel-desc',
                    html: '<p>' + _('contentblocks.defaults.intro') + '</p>'
                },{
                    xtype: 'contentblocks-grid-defaults',
                    cls: 'main-wrapper'
                }]
            });
        }

        return tabs;
    },

    getButtons: function() {
        var buttons = [{
            text: _('help_ex'),
            handler: this.loadHelpPane,
            scope: this,
            id: 'modx-abtn-help'
        }];

        if (ContentBlocksConfig.permissions.rebuild_content) {
            buttons.push(['-', {
                text: _('contentblocks.rebuild_content'),
                handler: this.rebuildContent,
                scope: this
            }]);
        }

        return buttons;
    },

    loadHelpPane: function() {
        var tabs = Ext.getCmp('contentblocks-page-home-tabs'),
            aTab = tabs.activeTab,
            baseUrl = 'https://docs.modmore.com/en/ContentBlocks/v1.x/',
            url = '';

        switch (aTab.id) {
            case 'contentblocks-page-home-tabs-fields':
                url = 'Fields.html';
                break;
            case 'contentblocks-page-home-tabs-layouts':
                url = 'Layouts.html';
                break;
            case 'contentblocks-page-home-tabs-templates':
                url = 'Templates.html';
                break;
            case 'contentblocks-page-home-tabs-categories':
                url = 'Categories.html';
                break;
            case 'contentblocks-page-home-tabs-defaults':
                url = 'Default_Templates.html';
                break;
        }

        if (url.length > 0) {
            MODx.config.help_url = baseUrl + url + '?embed=1';
            MODx.loadHelpPane();
        }
    },

    rebuildContent: function() {
        Ext.Msg.confirm(_('contentblocks.rebuild_content'), _('contentblocks.rebuild_content.confirm'), function(e) {
            if (e == 'yes') {
                var win = MODx.load({xtype: 'contentblocks-window-rebuild_content'});
                win.show();
            }
        });
    }
});
Ext.reg('contentblocks-page-home',ContentBlocksComponent.page.Home);
