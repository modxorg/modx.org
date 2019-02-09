<script type="text/javascript">
var cbSettingLoaded = false;
MODx.on('ready',function() {
    if (!cbSettingLoaded) {
        var settingsRight = Ext.getCmp('modx-page-settings-right'),
            fld = {
            xtype: 'contentblocks-combo-boolean',
            name: 'use_contentblocks',
            fieldLabel: _('contentblocks.use_contentblocks'),
            description: _('contentblocks.use_contentblocks.description'),
            value: '[[+value]]'
            };

        if (settingsRight) {
            settingsRight.add([fld]);
            settingsRight.doLayout();

            var rp = Ext.getCmp('modx-panel-resource');
            if (rp && rp.on) {
                rp.on('success', function() {
                    if (typeof this.record.use_contentblocks !== 'undefined' && this.record.use_contentblocks != '[[+value]]') {
                        window.location = window.location.href;
                    }
                });
            }
        }
        cbSettingLoaded = true;
    }
});
</script>
