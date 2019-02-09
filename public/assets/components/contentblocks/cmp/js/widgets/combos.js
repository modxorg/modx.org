ContentBlocksComponent.combo.Icons = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/icons/getlist',
            combo: true
        },
        fields: ['value','icon_url', 'icon_type'],
        hiddenName: config.name,
        paging: false,
        valueField: 'value',
        displayField: 'value',
        tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item" style="float: left;"><img src="{icon_url}" alt="{value}" width="80" height="80"></div></tpl>')
    });
    ContentBlocksComponent.combo.Icons.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Icons,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-icons',ContentBlocksComponent.combo.Icons);


ContentBlocksComponent.combo.Inputs = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/inputs/getlist',
            combo: true
        },
        fields: ['value', 'display', 'description', {
            name: 'properties',
            type: 'object'
        }, {
            name: 'parent_properties',
            type: 'object'
        }, 'defaultIcon', 'defaultTpl'],
        hiddenName: config.name,
        paging: false,
        valueField: 'value',
        displayField: 'display',
        tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item">{display}<br><small style="white-space: normal;">{description:htmlEncode}</small></div></tpl>')
    });
    ContentBlocksComponent.combo.Inputs.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Inputs,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-inputs',ContentBlocksComponent.combo.Inputs);


ContentBlocksComponent.combo.Fields = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/fields/getlist',
            // this means this will only ever return text/richtext fields. Needed for proper default template selection.
            inputs: ContentBlocksConfig.defaults_allowed_inputs || 'textarea,richtext,code',
            combo: true
        },
        autoload: false,
        fields: ['id', 'name', 'description'],
        hiddenName: config.name,
        paging: true,
        valueField: 'id',
        displayField: 'name',
        triggerAction: "all",
        tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item">{name}<br><small style="white-space: normal;">{description:htmlEncode}</small></div></tpl>')
    });
    ContentBlocksComponent.combo.Fields.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Fields,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-fields',ContentBlocksComponent.combo.Fields);


ContentBlocksComponent.combo.Layouts = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/layouts/getlist',
            combo: true
        },
        autoload: false,
        fields: ['id', 'name', 'description', 'columns'],
        hiddenName: config.name,
        paging: true,
        valueField: 'id',
        displayField: 'name',
        triggerAction: "all",
        tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item">{name}<br><small style="white-space: normal;">{description:htmlEncode}</small></div></tpl>')
    });
    ContentBlocksComponent.combo.Layouts.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Layouts,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-layouts',ContentBlocksComponent.combo.Layouts);


ContentBlocksComponent.combo.Templates = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/templates/getlist',
            combo: true
        },
        fields: ['id', 'name', 'description', 'layouts'],
        hiddenName: config.name,
        paging: true,
        valueField: 'id',
        displayField: 'name',
        triggerAction: "all",
        tpl: new Ext.XTemplate('<tpl for="."><div class="x-combo-list-item">{name}<br><small style="white-space: normal;">{description:htmlEncode}</small></div></tpl>')
    });
    ContentBlocksComponent.combo.Templates.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Templates,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-templates',ContentBlocksComponent.combo.Templates);


ContentBlocksComponent.combo.Chunks = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'content/chunk/getlist',
            combo: true
        },
        fields: ['id', 'name'],
        hiddenName: config.name,
        paging: true,
        pageSize: 20,
        valueField: 'id',
        displayField: 'name'
    });
    ContentBlocksComponent.combo.Chunks.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Chunks,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-chunks',ContentBlocksComponent.combo.Chunks);


ContentBlocksComponent.combo.MediaSource = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/sources/getlist',
            combo: true
        },
        fields: ['id', 'name', 'description'],
        hiddenName: config.name,
        paging: true,
        pageSize: 20,
        valueField: 'id',
        displayField: 'name',
        tpl: new Ext.XTemplate('<tpl for=".">'
            ,'<div class="x-combo-list-item">'
            ,'<h4 class="modx-combo-title">{name}</h4>'
            ,'<p class="modx-combo-desc">{description}</p>'
            ,'</div></tpl>')
    });
    ContentBlocksComponent.combo.MediaSource.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.MediaSource,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-mediasource',ContentBlocksComponent.combo.MediaSource);

ContentBlocksComponent.combo.Category = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        url: ContentBlocksComponent.config.connectorUrl,
        baseParams: {
            action: 'mgr/categories/getlist',
            combo: true
        },
        fields: ['id', 'name', 'description', 'sortorder'],
        hiddenName: config.name,
        paging: true,
        pageSize: 20,
        valueField: 'id',
        displayField: 'name',
        tpl: new Ext.XTemplate('<tpl for=".">'
            ,'<div class="x-combo-list-item">'
            ,'<h4 class="modx-combo-title">{name}</h4>'
            ,'<p class="modx-combo-desc">{description}</p>'
            ,'</div></tpl>')
    });
    ContentBlocksComponent.combo.Category.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Category,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-category',ContentBlocksComponent.combo.Category);

ContentBlocksComponent.combo.AvailabilityField = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('contentblocks.condition_field.resource'), 'resource'],
                [_('contentblocks.condition_field.class_key'), 'class_key'],
                [_('contentblocks.condition_field.template'), 'template'],
                [_('contentblocks.condition_field.parent'), 'parent'],
                [_('contentblocks.condition_field.ultimateparent'), 'ultimateparent'],
                [_('contentblocks.condition_field.context'), 'context'],
                [_('contentblocks.condition_field.usergroup'), 'usergroup']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponent.combo.AvailabilityField.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.AvailabilityField,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-availabilityfield',ContentBlocksComponent.combo.AvailabilityField);

ContentBlocksComponent.combo.Columns = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        triggerAction: "all",
        store: new Ext.data.SimpleStore({
            fields: ['reference'],
            data: []
        }),
        fields: ['reference'],
        hiddenName: config.name,
        paging: false,
        valueField: 'reference',
        displayField: 'reference'
    });
    ContentBlocksComponent.combo.Columns.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Columns,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-columns',ContentBlocksComponent.combo.Columns);

ContentBlocksComponent.combo.FieldTypes = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('contentblocks.fieldtype.textfield'), 'textfield'],
                [_('contentblocks.fieldtype.link'), 'link'],
                [_('contentblocks.fieldtype.textarea'), 'textarea'],
                [_('contentblocks.fieldtype.richtext') + ' (Only works in a modal window!)', 'richtext'],
                [_('contentblocks.fieldtype.select'), 'select'],
                [_('contentblocks.fieldtype.radio'), 'radio'],
                [_('contentblocks.fieldtype.checkbox'), 'checkbox'],
                [_('contentblocks.fieldtype.image'), 'image']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponent.combo.FieldTypes.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.FieldTypes,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-fieldtypes',ContentBlocksComponent.combo.FieldTypes);

ContentBlocksComponent.combo.fieldIsExposed = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('contentblocks.field_is_exposed.modal'), 'modal'],
                [_('contentblocks.field_is_exposed.exposedassetting'), 'asSetting'],
                [_('contentblocks.field_is_exposed.exposedasfield'), 'asField']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponent.combo.fieldIsExposed.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.fieldIsExposed,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-field_is_exposed',ContentBlocksComponent.combo.fieldIsExposed);

ContentBlocksComponent.combo.Boolean = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('yes'), '1'],
                [_('no'), '0']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponent.combo.Boolean.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.Boolean,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-boolean',ContentBlocksComponent.combo.Boolean);

ContentBlocksComponent.combo.GalleryThumbSize = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('contentblocks.gallery.thumb_size.small'), 'small'],
                [_('contentblocks.gallery.thumb_size.medium'), 'medium'],
                [_('contentblocks.gallery.thumb_size.large'), 'large']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display'
    });
    ContentBlocksComponent.combo.GalleryThumbSize.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.GalleryThumbSize,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-gallery-thumbsize',ContentBlocksComponent.combo.GalleryThumbSize);

ContentBlocksComponent.combo.RepeaterLayoutStyle = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        mode: 'local',
        store: new Ext.data.SimpleStore({
            fields: ['display','value'],
            data: [
                [_('contentblocks.repeater.default'), 'default'],
                // [_('contentblocks.repeater.condensed'), 'condensed'],
                [_('contentblocks.repeater.mini'), 'mini']
            ]
        }),
        fields: ['value','display'],
        hiddenName: config.name || 'field',
        paging: false,
        valueField: 'value',
        displayField: 'display',
        defaultValue: 'default'
    });
    ContentBlocksComponent.combo.RepeaterLayoutStyle.superclass.constructor.call(this,config);
};
Ext.extend(ContentBlocksComponent.combo.RepeaterLayoutStyle,MODx.combo.ComboBox);
Ext.reg('contentblocks-combo-repeater-layout-style',ContentBlocksComponent.combo.RepeaterLayoutStyle);