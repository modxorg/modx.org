ContentBlocksComponent.window.RebuildContent = function(config) {
    config = config || {};
    this.id = config.id = config.id || Ext.id();
    config.register = config.register || 'mgr';
    config.topic = config.topic || '/contentblocks/rebuild_content/' + this.id + '/';
    Ext.applyIf(config,{
        title: _('contentblocks.rebuild_content'),
        modal: true,
        width: 500,
        fields: [{
            xtype: 'panel',
            height: 30,
            scrollable: false,
            autoScroll: false,
            id: config.id + '-progress',
            cls: 'contentblocks-progress',
            html: '<div id="' + config.id + '-progress-bar" class="contentblocks-progress-bar"></div>'
        },{
            xtype: 'panel',
            height: 250,
            scrollable: true,
            autoScroll: true,
            id: config.id + '-body-container',
            items: [{
                xtype: 'panel',
                id: config.id + '-body',
                cls: 'modx-console-text'
            }]
        }],
        buttons: [{
            text: _('console_download_output'),
            id: config.id + 'download-button',
            handler: this.download,
            scope: this
        },{
            text: _('close'),
            id: config.id + 'ok-button',
            scope: this,
            handler: this.hideConsole,
            cls: 'primary-button'
        }],
        listeners: {
            success: function() {
                this.fireEvent('complete');
                return false;
            },
            failure: function(r) {
                this.fireEvent('complete');
            }
        }
    });
    ContentBlocksComponent.window.RebuildContent.superclass.constructor.call(this,config);
    this.on('show', this.init);
    this.addEvents({
        'shutdown': true,
        'complete': true
    });
    this.on('complete',this.onComplete,this);
};
Ext.extend(ContentBlocksComponent.window.RebuildContent,MODx.Window,{
    running: false,
    init: function() {
        Ext.Msg.hide();
        Ext.getCmp(this.config.id + 'ok-button').setDisabled(true);
        Ext.getCmp(this.config.id + 'download-button').setDisabled(true);
        var body = Ext.getCmp(this.id + '-body');
        var bodyContainer = Ext.getCmp(this.id + '-body-container');
        body.el.dom.innerHTML = '';

        this.provider = new Ext.direct.PollingProvider({
            type:'polling'
            ,url: MODx.config.connector_url ? MODx.config.connector_url : MODx.config.connectors_url+'system/index.php'
            ,interval: 1000
            ,baseParams: {
                action: MODx.config.connector_url ? 'system/console' : 'console'
                ,register: this.config.register || ''
                ,topic: this.config.topic || ''
                ,show_filename: this.config.show_filename || 0
                ,format: this.config.format || 'html_log'
            }
        });
        Ext.Direct.addProvider(this.provider);
        var progressRegex = /<span class="info">PROGRESS:(\d+)<\/span><br \/>/g,
            progressBar = Ext.get(this.config.id + '-progress-bar');
        Ext.Direct.on('message', function(e,p) {
            var match = progressRegex.exec(e.data);
            if (match != null) {
                progressBar.applyStyles({width: match[1] + '%'});
                while ((match = progressRegex.exec(e.data)) != null) {
                    progressBar.applyStyles({width: match[1] + '%'});
                }
            }

            var tdata = e.data.replace(progressRegex,"");
            body.el.insertHtml('beforeEnd', tdata);
            body.el.scroll('b', body.el.getHeight(), true);
            if (e.complete) {
                this.fireEvent('complete');
            }
            delete e;
        },this);

        body.el.insertHtml('beforeEnd',_('contentblocks.rebuild_content.initialising') + '<br />');

        var win = this;
        MODx.Ajax.request({
            url: ContentBlocksComponent.config.connectorUrl,
            params: {
                action: 'mgr/rebuild_content',
                register: this.config.register,
                topic: this.config.topic
            },
            listeners: {
                'success':{fn: win.onComplete,scope: win},
                'failure':{fn: win.onComplete,scope: win}
            }
        });
    },

    onComplete: function() {
        if (this.provider) this.provider.disconnect();
        Ext.getCmp(this.config.id + 'ok-button').setDisabled(false);
        Ext.getCmp(this.config.id + 'download-button').setDisabled(false);
    },

    hideConsole: function() {
        if (this.provider && this.provider.disconnect) {
            try {
                this.provider.disconnect();
            } catch (e) {}
        }
        this.fireEvent('shutdown');
        this.hide();
    },

    download: function() {
        var c = Ext.getCmp(this.id + '-body').getEl().dom.innerHTML || '&nbsp;';
        MODx.Ajax.request({
            url: MODx.config.connector_url ? MODx.config.connector_url : MODx.config.connectors_url+'system/index.php'
            ,params: {
                action: MODx.config.connector_url ? 'system/downloadOutput' : 'downloadOutput'
                ,data: c
            }
            ,listeners: {
                'success':{fn:function(r) {
                    if (MODx.config.connector_url) {
                        location.href = MODx.config.connector_url+'?action=system/downloadOutput&HTTP_MODAUTH='+MODx.siteId+'&download='+r.message;
                    }
                    else {
                        location.href = MODx.config.connectors_url+'system/index.php?action=downloadOutput&HTTP_MODAUTH='+MODx.siteId+'&download='+r.message;
                    }
                },scope:this}
            }
        });
    }
});
Ext.reg('contentblocks-window-rebuild_content',ContentBlocksComponent.window.RebuildContent);
