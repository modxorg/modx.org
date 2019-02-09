<div id="tv-input-properties-form{$tv}"></div>
{literal}
<script type="text/javascript">
// <![CDATA[
var params = {
{/literal}{foreach from=$params key=k item=v name='p'}
 '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last},{/if}
{/foreach}{literal}
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    renderTo: 'tv-input-properties-form{/literal}{$tv}{literal}'
    ,xtype: 'panel'
    ,layout: 'column'
    ,autoHeight: true
    ,border: false
    ,items: [{
        columnWidth:.5,
        border: false,
        layout: 'form',
        cls: 'form-with-labels',
        labelAlign: 'top',
        items: [{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.advAttrib'|escape:javascript]}{literal}'
            ,name: 'inopt_advAttrib'
            ,hiddenName: 'inopt_advAttrib'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_advAttrib', inputValue: 1, description: '{/literal}{$_lang['setting_redactor.advAttrib_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_advAttrib', inputValue: 0, description: '{/literal}{$_lang['setting_redactor.advAttrib_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_advAttrib', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.advAttrib_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['advAttrib']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.cleanup']|escape:javascript}{literal}'
            ,name: 'inopt_cleanup'
            ,hiddenName: 'inopt_cleanup'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_cleanup', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.cleanup_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_cleanup', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.cleanup_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_cleanup', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.cleanup_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['cleanup']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.convertDivs']|escape:javascript}{literal}'
            ,name: 'inopt_convertDivs'
            ,hiddenName: 'inopt_convertDivs'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_convertdivs', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.convertDivs_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_convertdivs', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.convertDivs_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_convertdivs', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.convertDivs_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['convertdivs']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.codemirror']|escape:javascript}{literal}'
            ,name: 'inopt_codemirror'
            ,hiddenName: 'inopt_codemirror'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_codemirror', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.codemirror_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_codemirror', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.codemirror_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_codemirror', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.codemirror_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['codemirror']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.cleanSpaces']|escape:javascript}{literal}'
            ,name: 'inopt_cleanSpaces'
            ,hiddenName: 'inopt_cleanSpaces'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_cleanSpaces', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.cleanSpaces_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_cleanSpaces', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.cleanSpaces_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_cleanSpaces', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.cleanSpaces_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['cleanSpaces']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.convertLinks']|escape:javascript}{literal}'
            ,name: 'inopt_convertLinks'
            ,hiddenName: 'inopt_convertLinks'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_convertlinks', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.convertLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_convertlinks', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.convertLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_convertlinks', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.convertLinks_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['convertlinks']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.wym']|escape:javascript}{literal}'
            ,name: 'inopt_wym'
            ,hiddenName: 'inopt_wym'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_wym', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.wym_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_wym', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.wym_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_wym', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.wym_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['wym']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.typewriter']|escape:javascript}{literal}'
            ,description: 'Typewriter'
            ,name: 'inopt_typewriter'
            ,hiddenName: 'inopt_typewriter'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_typewriter', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.typewriter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_typewriter', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.typewriter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_typewriter', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.typewriter_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['typewriter']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.buttonSource']|escape:javascript}{literal}'
            ,name: 'inopt_buttonSource'
            ,hiddenName: 'inopt_buttonSource'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_buttonSource', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.buttonSource_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_buttonSource', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.buttonSource_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_buttonSource', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.buttonSource_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['buttonSource']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.buttonFullScreen']|escape:javascript}{literal}'
            ,name: 'inopt_buttonFullScreen'
            ,hiddenName: 'inopt_buttonFullScreen'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_buttonFullScreen', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.buttonFullScreen_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_buttonFullScreen', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.buttonFullScreen_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_buttonFullScreen', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.buttonFullScreen_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['buttonFullScreen']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.toolbarOverflow']|escape:javascript}{literal}'
            ,name: 'inopt_toolbarOverflow'
            ,hiddenName: 'inopt_toolbarOverflow'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_toolbarOverflow', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.toolbarOverflow_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_toolbarOverflow', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.toolbarOverflow_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_toolbarOverflow', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.toolbarOverflow_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['toolbarOverflow']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.toolbarFixed']|escape:javascript}{literal}'
            ,name: 'inopt_toolbarFixed'
            ,hiddenName: 'inopt_toolbarFixed'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_toolbarFixed', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.toolbarFixed_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_toolbarFixed', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.toolbarFixed_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_toolbarFixed', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.toolbarFixed_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['toolbarFixed']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_textdirection']|escape:javascript}{literal}'
            ,name: 'inopt_direction'
            ,hiddenName: 'inopt_direction'
            ,id: 'inopt_direction{/literal}{$tv}{literal}'
            ,columns: 1
            ,items: [
                {boxLabel: 'Left to Right', name: 'inopt_direction', inputValue: 'ltr', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Right to Left', name: 'inopt_direction', inputValue: 'rtl', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_direction', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['direction']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.linkProtocol']|escape:javascript}{literal}'
            ,name: 'inopt_linkProtocol'
            ,hiddenName: 'inopt_linkProtocol'
            ,columns: 1
            ,items: [
                {boxLabel: 'None', name: 'inopt_linkProtocol', inputValue: 'none', description: '{/literal}{$_lang['setting_redactor.linkProtocol_desc']|escape:javascript}{literal}'},
                {boxLabel: 'http://', name: 'inopt_linkProtocol', inputValue: 'http://', description: '{/literal}{$_lang['setting_redactor.linkProtocol_desc']|escape:javascript}{literal}'},
                {boxLabel: 'https://', name: 'inopt_linkProtocol', inputValue: 'https://', description: '{/literal}{$_lang['setting_redactor.linkProtocol_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_linkProtocol', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.linkProtocol_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['linkProtocol']
            ,defaultValue: 'inherit'
        },{
          xtype: 'radiogroup'
          ,fieldLabel: '{/literal}{$_lang['setting_redactor.linkNofollow']|escape:javascript}{literal}'
          ,name: 'inopt_noFollow'
          ,hiddenName: 'inopt_noFollow'
          ,columns: 1
          ,items: [
            {boxLabel: 'On', name: 'inopt_noFollow', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.linkNofollow_desc']|escape:javascript}{literal}'},
            {boxLabel: 'Off', name: 'inopt_noFollow', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.linkNofollow_desc']|escape:javascript}{literal}'},
            {boxLabel: 'Inherit', name: 'inopt_noFollow', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.linkNofollow_desc']|escape:javascript}{literal}'}
          ]
          ,listeners: oc
          ,value: params['noFollow']
          ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.dragUpload']|escape:javascript}{literal}'
            ,name: 'inopt_dragUpload'
            ,hiddenName: 'inopt_dragUpload'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_dragUpload', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.dragUpload_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_dragUpload', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.dragUpload_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_dragUpload', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.dragUpload_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['dragUpload']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.convertImageLinks']|escape:javascript}{literal}'
            ,name: 'inopt_convertImageLinks'
            ,hiddenName: 'inopt_convertImageLinks'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_convertImageLinks', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.convertImageLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_convertImageLinks', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.convertImageLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_convertImageLinks', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.convertImageLinks_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['convertImageLinks']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_breadcrumb']|escape:javascript}{literal}'
            ,name: 'inopt_breadcrumb'
            ,hiddenName: 'inopt_breadcrumb'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_breadcrumb', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_breadcrumb_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_breadcrumb', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_breadcrumb_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_breadcrumb', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_breadcrumb_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['breadcrumb']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_contrast']|escape:javascript}{literal}'
            ,name: 'inopt_contrast'
            ,hiddenName: 'inopt_contrast'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_contrast', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_contrast_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_contrast', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_contrast_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_contrast', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_contrast_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['contrast']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_counter']|escape:javascript}{literal}'
            ,name: 'inopt_counter'
            ,hiddenName: 'inopt_counter'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_counter', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_counter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_counter', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_counter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_counter', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_counter_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['counter']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_download']|escape:javascript}{literal}'
            ,name: 'inopt_download'
            ,hiddenName: 'inopt_download'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_download', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_download_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_download', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_download_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_download', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_download_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['download']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_eureka']|escape:javascript}{literal}'
            ,name: 'inopt_eureka'
            ,hiddenName: 'inopt_eureka'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_eureka', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_eureka_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_eureka', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_eureka_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_eureka', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_eureka_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['eureka']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_fontcolor']|escape:javascript}{literal}'
            ,name: 'inopt_fontcolor'
            ,hiddenName: 'inopt_fontcolor'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_fontcolor', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_fontcolor_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_fontcolor', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_fontcolor_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_fontcolor', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_fontcolor_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['fontcolor']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_fontfamily']|escape:javascript}{literal}'
            ,name: 'inopt_fontfamily'
            ,hiddenName: 'inopt_fontfamily'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_fontfamily', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_fontfamily_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_fontfamily', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_fontfamily_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_fontfamily', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_fontfamily_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['fontfamily']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_fontsize']|escape:javascript}{literal}'
            ,name: 'inopt_fontsize'
            ,hiddenName: 'inopt_fontsize'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_fontsize', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_fontsize_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_fontsize', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_fontsize_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_fontsize', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_fontsize_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['fontsize']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_imagepx']|escape:javascript}{literal}'
            ,name: 'inopt_imagepx'
            ,hiddenName: 'inopt_imagepx'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_imagepx', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_imagepx_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_imagepx', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_imagepx_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_imagepx', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_imagepx_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['imagepx']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.limiter']|escape:javascript}{literal}'
            ,name: 'inopt_limiter'
            ,hiddenName: 'inopt_limiter'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_limiter', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.limiter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_limiter', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.limiter_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_limiter', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.limiter_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['limiter']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_norphan']|escape:javascript}{literal}'
            ,name: 'inopt_norphan'
            ,hiddenName: 'inopt_norphan'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_norphan', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_norphan_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_norphan', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_norphan_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_norphan', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_norphan_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['norphan']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_replacer']|escape:javascript}{literal}'
            ,name: 'inopt_replacer'
            ,hiddenName: 'inopt_replacer'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_replacer', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_replacer_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_replacer', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_replacer_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_replacer', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_replacer_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['replacer']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_speek']|escape:javascript}{literal}'
            ,name: 'inopt_speek'
            ,hiddenName: 'inopt_speek'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_speek', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_speek_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_speek', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_speek_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_speek', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_speek_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['speek']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_syntax']|escape:javascript}{literal}'
            ,name: 'inopt_syntax'
            ,hiddenName: 'inopt_syntax'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_syntax', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_syntax_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_syntax', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_syntax_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_syntax', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_syntax_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['syntax']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_table']|escape:javascript}{literal}'
            ,name: 'inopt_table'
            ,hiddenName: 'inopt_table'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_table', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_table_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_table', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_table_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_table', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_table_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['table']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_textdirection']|escape:javascript}{literal}'
            ,name: 'inopt_textdirection'
            ,hiddenName: 'inopt_textdirection'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_textdirection', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_textdirection', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_textdirection', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_textdirection_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['textdirection']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.textexpander']|escape:javascript}{literal}'
            ,name: 'inopt_textexpander'
            ,hiddenName: 'inopt_textexpander'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_textexpander', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.textexpander_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_textexpander', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.textexpander_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_textexpander', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.textexpander_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['textexpander']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_uploadcare']|escape:javascript}{literal}'
            ,name: 'inopt_use_uploadcare'
            ,hiddenName: 'inopt_use_uploadcare'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_use_uploadcare', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_uploadcare_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_use_uploadcare', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_uploadcare_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_use_uploadcare', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_uploadcare_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['use_uploadcare']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_zoom']|escape:javascript}{literal}'
            ,name: 'inopt_zoom'
            ,hiddenName: 'inopt_zoom'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_zoom', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_zoom_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_zoom', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_zoom_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_zoom', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_zoom_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['zoom']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.plugin_video']|escape:javascript}{literal}'
            ,name: 'inopt_video'
            ,hiddenName: 'inopt_video'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_video', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.plugin_video_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_video', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.plugin_video_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_video', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.plugin_video_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['video']
            ,defaultValue: 'inherit'
        },{
            xtype: 'radiogroup'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.convertVideoLinks']|escape:javascript}{literal}'
            ,name: 'inopt_convertVideoLinks'
            ,hiddenName: 'inopt_convertVideoLinks'
            ,columns: 1
            ,items: [
                {boxLabel: 'On', name: 'inopt_convertVideoLinks', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.convertVideoLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Off', name: 'inopt_convertVideoLinks', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.convertVideoLinks_desc']|escape:javascript}{literal}'},
                {boxLabel: 'Inherit', name: 'inopt_convertVideoLinks', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.convertVideoLinks_desc']|escape:javascript}{literal}'}
            ]
            ,listeners: oc
            ,value: params['convertVideoLinks']
            ,defaultValue: 'inherit'
        }]
    },{
        columnWidth:.5,
        border: false,
        layout: 'form',
        cls: 'form-with-labels',
        labelAlign: 'top',
        items: [{
            xtype: 'panel',
            html: '<p>Leave any of the fields below empty to use the default from the System Settings.</p>',
            border: false
        },{
            xtype: 'modx-combo-language'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.lang']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.lang_desc']|escape:javascript}{literal}'
            ,name: 'inopt_lang'
            ,hiddenName: 'inopt_lang'
            ,listeners: oc
            ,value: params['lang']
            ,anchor: '100%'
            ,allowBlank: true
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.allowedTags']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.allowedTags_desc']|escape:javascript}{literal}'
            ,name: 'inopt_allowedTags'
            ,listeners: oc
            ,value: params['allowedTags']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.deniedTags']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.deniedTags_desc']|escape:javascript}{literal}'
            ,name: 'inopt_deniedTags'
            ,listeners: oc
            ,value: params['deniedTags']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.formattingTags']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.formattingTags_desc']|escape:javascript}{literal}'
            ,name: 'inopt_formattingTags'
            ,listeners: oc
            ,value: params['formattingTags']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.formattingAdd']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.formattingAdd_desc']|escape:javascript}{literal}'
            ,name: 'inopt_formattingAdd'
            ,listeners: oc
            ,value: params['formattingAdd']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.clipsJson']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.clipsJson_desc']|escape:javascript}{literal}'
            ,name: 'inopt_clipsJson'
            ,listeners: oc
            ,value: params['clipsJson']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.colors']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.colors_desc']|escape:javascript}{literal}'
            ,name: 'inopt_colors'
            ,listeners: oc
            ,value: params['colors']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.buttons']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.buttons_desc']|escape:javascript}{literal}'
            ,name: 'inopt_buttons'
            ,listeners: oc
            ,value: params['buttons']
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.buttonsHideOnMobile']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.buttonsHideOnMobile_desc']|escape:javascript}{literal}'
            ,name: 'inopt_buttonsHideOnMobile'
            ,listeners: oc
            ,value: params['buttonsHideOnMobile']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.minHeight']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.minHeight_desc']|escape:javascript}{literal}'
            ,name: 'inopt_minHeight'
            ,listeners: oc
            ,value: params['minHeight']
        },{
            xtype: 'modx-combo-source'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.mediasource']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.mediasource_desc']|escape:javascript}{literal}'
            ,name: 'inopt_mediasource'
            ,hiddenName: 'inopt_mediasource'
            ,listeners: oc
            ,value: params['mediasource']
            ,anchor: '100%'
        },{
            xtype: 'modx-combo-source'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.file_mediasource']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.file_mediasource_desc']|escape:javascript}{literal}'
            ,name: 'inopt_file_mediasource'
            ,hiddenName: 'inopt_file_mediasource'
            ,listeners: oc
            ,value: params['file_mediasource']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.image_upload_path']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.image_upload_path_desc']|escape:javascript}{literal}'
            ,name: 'inopt_image_upload_path'
            ,listeners: oc
            ,value: params['image_upload_path']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.image_browse_path']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.image_browse_path_desc']|escape:javascript}{literal}'
            ,name: 'inopt_image_browse_path'
            ,listeners: oc
            ,value: params['image_browse_path']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.file_upload_path']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.file_upload_path_desc']|escape:javascript}{literal}'
            ,name: 'inopt_file_upload_path'
            ,listeners: oc
            ,value: params['file_upload_path']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.file_browse_path']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.file_browse_path_desc']|escape:javascript}{literal}'
            ,name: 'inopt_file_browse_path'
            ,listeners: oc
            ,value: params['file_browse_path']
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: '{/literal}{$_lang['setting_redactor.predefinedLinks']|escape:javascript}{literal}'
            ,description: '{/literal}{$_lang['setting_redactor.predefinedLinks_desc']|escape:javascript}{literal}'
            ,name: 'inopt_predefinedLinks'
            ,listeners: oc
            ,value: params['predefinedLinks']
            ,anchor: '100%'
        },
		{
			xtype: 'radiogroup'
			,fieldLabel: '{/literal}{$_lang['setting_redactor.imageTabLink']|escape:javascript}{literal}'
			,name: 'inopt_imageTabLink'
			,hiddenName: 'inopt_imageTabLink'
			,columns: 1
			,items: [
			    {boxLabel: 'On', name: 'inopt_imageTabLink', inputValue: '1', description: '{/literal}{$_lang['setting_redactor.imageTabLink_desc']|escape:javascript}{literal}'},
			    {boxLabel: 'Off', name: 'inopt_imageTabLink', inputValue: '0', description: '{/literal}{$_lang['setting_redactor.imageTabLink_desc']|escape:javascript}{literal}'},
			    {boxLabel: 'Inherit', name: 'inopt_imageTabLink', inputValue: 'inherit', description: '{/literal}{$_lang['setting_redactor.imageTabLink_desc']|escape:javascript}{literal}'}
			]
			,listeners: oc
			,value: params['imageTabLink']
			,defaultValue: 'inherit'
		}]
    }]
});
// ]]>
</script>
{/literal}
