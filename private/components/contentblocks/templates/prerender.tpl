<script type="text/x-tmpl" id="contentblocks-wrapper-tpl">
    <div class="contentblocks-wrapper" id="contentblocks">
        <ul class="contentblocks-layout-wrapper"></ul>
        <div class="contentblocks-add-layout" data-contentblocks-op="new">
            <h3><a href="javascript:void(0);">+ {%=_('contentblocks.add_layout')%}</a></h3>
        </div>
    </div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-switch-layout">
    <div class="contentblocks-switch-layouts-wrapper">
        <p>{%=_('contentblocks.switch_layout.introduction')%}</p>
        <ul>
            <li data-layout="{%=o.id%}" class="contentblocks-layout" id="{%=o.generated_id%}-wrapper">
                <div class="contentblocks-region-container" id="{%=o.generated_id%}">
                    <div class="contentblocks-region-content">
                        {%#o.columns_html%}
                    </div>
                </div>
            </li>
        </ul>
        {% if (o.unassigned_settings_html) { %}
        <div class="contentblocks-unassigned-settings-wrapper">
            <div class="contentblocks-column-container-header">
                <h3>
                    {%=_('contentblocks.unassigned_layout_settings')%}
                </h3>
                <p>
                    {%=_('contentblocks.unassigned_layout_settings.introduction')%}
                </p>
            </div>
            {%#o.unassigned_settings_html%}
        </div>
        {% } %}

        <div class="contentblocks-modal-actions">
            <a href="javascript:void(0);" class="big contentblocks-field-button save-button">{%=_('contentblocks.save')%}</a>
        </div>
    </div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-switch-layout-column">
<div class="contentblocks-region {%=o.classes%}" data-part="{%=o.reference%}" style="width: {%=o.width%}%;">
    <div class="contentblocks-column-container-header">
        <h3>
            <span class="contentblocks-column-title">{%=o.name%}</span>
        </h3>
    </div>
    <ul class="contentblocks-content contentblocks-switch-content" data-part="{%=o.reference%}"></ul>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-switch-layout-field">
    <li class="contentblocks-field-outer" data-idx="{%=o.fieldData.origIdx%}" data-col="{%=o.fieldData.origCol%}" data-field="{%=o.fieldData.encodedField%}">
        <label>{%=o.name%}</label>
    </li>
</script>

<script type="text/x-tmpl" id="contentblocks-unassigned-settings">
    <ul class="contentblocks-unassigned-settings">
        {%#o.settings%}
    </ul>
</script>

<script type="text/x-tmpl" id="contentblocks-unassigned-setting">
    <li><label>{%=o.ref%}:</label> {%=o.value%}</li>
</script>

<script type="text/x-tmpl" id="contentblocks-layout-wrapper">
<li data-layout="{%=o.id%}" class="contentblocks-layout" id="{%=o.generated_id%}-wrapper">
    <div class="contentblocks-add-layout contentblocks-add-layout-here" data-contentblocks-op="new">
        <h3><a href="javascript:void(0);">+ {%=_('contentblocks.add_layout')%}</a></h3>
    </div>
    <div class="contentblocks-region-container" id="{%=o.generated_id%}">
        <div class="contentblocks-region-container-header">
            <div class="contentblocks-region-container-tools">
                <a href="javascript:void(0);" class="contentblocks-layout-settings"><span class="icon icon-cog"></span> {%=_('contentblocks.layout_settings')%}</a>
                <a href="javascript:void(0);" class="contentblocks-layout-move-up" aria-label="{%=_('contentblocks.move_layout_up')%}" title="{%=_('contentblocks.move_layout_up')%}">&#9650;</a>
                <a href="javascript:void(0);" class="contentblocks-layout-move-down" aria-label="{%=_('contentblocks.move_layout_down')%}" title="{%=_('contentblocks.move_layout_down')%}">&#9660;</a>

                <div class="contentblocks-dropmenu-container">
                    <a href="javascript:void(0);" class="contentblocks-layout-menu contentblocks-dropmenu-title"></a>
                    <ul class="contentblocks-dropmenu-items">
                        <li><a href="javascript:void(0);" class="contentblocks-switch-layout" data-contentblocks-op="switch">{%=_('contentblocks.switch_layout')%}</a></li>
                        <li><a href="javascript:void(0);" class="contentblocks-repeat-layout">{%=_('contentblocks.repeat_layout')%}</a></li>
                        <li class="separator"></li>
                        <li><a href="javascript:void(0);" class="contentblocks-layout-delete"><span aria-hidden>&times;</span> {%=_('contentblocks.delete_layout')%}</a></li>
                    </ul>
                </div>
            </div>

            <h3>
                <a class="contentblocks-collapser contentblocks-layout-collapser contentblocks-layout-expanded" href="javascript:void(0)">-</a>
                <span class="contentblocks-layout-title">{%=o.title%}</span>
            </h3>
        </div>
        <div class="contentblocks-region-settings"></div>
        <div class="contentblocks-region-content">
            {%#o.columns_html%}
        </div>
    </div>
</li>
</script>

<script type="text/x-tmpl" id="contentblocks-layout-column">
<div class="contentblocks-region {%=o.classes%}" data-part="{%=o.reference%}" style="width: {%=o.width%}%;">
    <ul class="contentblocks-content" data-part="{%=o.reference%}"></ul>

    <div class="contentblocks-add-block">
        <h3><a href="javascript:void(0);">+ {%=_('contentblocks.add_content')%}</a></h3>
    </div>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-wrapper">
<div class="contentblocks-modal-header">
    {% if (o.hasLayoutOptions) { %}
    <div class="switch-view">
        <a href="javascript:void(0);" class="switch-view-default" data-view="default" aria-label="{%=_('contentblocks.table')%}" title="{%=_('contentblocks.table')%}">&#xf009;</a>
        <a href="javascript:void(0);" class="switch-view-list" data-view="expanded" aria-label="{%=_('contentblocks.list')%}" title="{%=_('contentblocks.list')%}">&#xf00b;</a>
        <a href="javascript:void(0);" class="switch-view-list-condensed" data-view="condensed" aria-label="{%=_('contentblocks.condensed_list')%}" title="{%=_('contentblocks.condensed_list')%}">&#xf03a;</a>
    </div>
    {% } %}
    <a href="javascript:void(0);" class="close" aria-label="{%=_('contentblocks.close_modal')%}" title="{%=_('contentblocks.close_modal')%}">&times;</a>
    <h3>{%=o.title%}</h3>
</div>
<div class="contentblocks-modal-content {%=o.classes%}">
    {%#o.content%}
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-add-content">
<p>{%=_('contentblocks.add_content.introduction')%}</p>
<div class="contentblocks-modal-field"><input type="text" class="contentblocks-modal-filter" placeholder="{%=_('contentblocks.search_fields')%}" /></div>
<div class="contentblocks-add-field-categories">
    {%#o.category_html%}
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-add-content-category">
<div class="contentblocks-add-field-category  contentblocks-add-field-category-{%=o.category_id%}">
    <h2 class="contentblocks-category-title">{%=o.category_name%}</h2>
    {% if (o.category_description) { %}
    <p class="contentblocks-category-description">{%=o.category_description%}</p>
    {% } %}
    <ul class="contentblocks-add-field-list">{%#o.fields%}</ul>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-add-content-field">
    <li data-input-type="{%=o.input%}">
        <div class="thumbnail">
          <a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">
            <img src="{%=o.icon%}">
          </a>
        </div>
        <div class="meta">
            <h3><a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">{%=o.name%}</a></h3>
            {% if (o.description) { %}
              <p class="description">{%=o.description%}</p>
            {% } %}
        </div>
    </li>
</script>


<script type="text/x-tmpl" id="contentblocks-modal-layout-setting">
<p>{%=_('contentblocks.layout_setting.introduction')%}</p>
{%#o.setting_fields%}
<div class="contentblocks-save-layout_settings">
    <a href="javascript:void(0);" class="big contentblocks-field-button save-layout_settings-button">{%=_('contentblocks.save')%}</a>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-select">
<div class="contentblocks-modal-field">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <select data-name="{%=o.reference%}" id="setting-{%=o.reference%}">
        {%#o.options%}
    </select>
</div>
</script>
<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-select-option">
    <option value="{%=o.value%}" {%=o.selected%}>{%=o.display%}</option>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-radio">
<div class="contentblocks-modal-field contentblocks-setting-radio">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <input type="hidden" name="{%=o.settingInstance%}-setting-{%=o.reference%}" data-name="{%=o.reference%}" value="{%=o.value%}" />
    <div class="contentblocks-options">
    {%#o.options%}
    </div>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-checkbox">
<div class="contentblocks-modal-field contentblocks-setting-checkbox">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <input type="hidden" name="{%=o.settingInstance%}-setting-{%=o.reference%}" data-name="{%=o.reference%}" value="{%=o.value%}" />
    <div class="contentblocks-options">
      {%#o.options%}
    </div>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-image">
<div class="contentblocks-modal-field contentblocks-setting-image"
    id="{%=o.settingInstance%}-fld-image-{%=o.reference%}"
    data-setting-key="{%=o.reference%}"
    data-instance-id="{%=o.settingInstance%}"
    data-thumbnail-size="{%=o.image_thumbnail_size%}"
    data-image-directory="{%=o.image_directory%}"
    data-image-source="{%=o.image_source%}">
    <label class="field-label" for="{%=o.settingInstance%}-setting-{%=o.reference%}">{%=o.title%}</label>

    <div class="contentblocks-loader"></div>

    <div class="contentblocks-field contentblocks-field-image contentblocks-drop-target">
        <input type="hidden" class="url" data-name="{%=o.reference%}" value="{%=o.value%}" />
        <input type="hidden" class="size" />
        <input type="hidden" class="width" />
        <input type="hidden" class="height" />
        <input type="hidden" class="extension" />
        <div class="contentblocks-field-actions">
            <a href="javascript:void(0);" class="contentblocks-field-delete-image">&times; {%=_('contentblocks.delete_image')%}</a>
        </div>

        <div class="contentblocks-field-image-upload">
            <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-image-choose">{%=_('contentblocks.choose')%}</a>
            <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-upload">{%=_('contentblocks.upload')%}</a>
            <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-image-url">{%=_('contentblocks.from_url')%}</a>
            {%=_('contentblocks.image.or_drop_image')%}
            <input type="file" id="{%=o.settingInstance%}-fld-image-{%=o.reference%}-upload" class="contentblocks-field-upload-field">
        </div>
        <div class="contentblocks-field-image-uploading">
            <div class="upload-progress">
                <div class="bar"></div>
            </div>
        </div>
        <div class="contentblocks-field-image-preview">
            <img class="contentblocks-field-image-preview-img" />
        </div>
    </div>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-radio-option">
    <label class="value-label"><input type="radio" name="{%=o.settingInstance%}-setting-{%=o.reference%}" value="{%=o.value%}" {%=o.checked%}> {%=o.display%}</label>
</script>
<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-checkbox-option">
    <label class="value-label"><input type="checkbox" name="{%=o.settingInstance%}-setting-{%=o.reference%}" value="{%=o.value%}" {%=o.checked%}> {%=o.display%}</label>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-textfield">
<div class="contentblocks-modal-field">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <input type="text" data-name="{%=o.reference%}" id="setting-{%=o.reference%}" value="{%=o.value%}">
</div>
</script>
<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-link">
<div class="contentblocks-modal-field contentblocks-modal-field-link">
    <label for="setting-{%=o.reference%}">{%=o.title%}</label>
    <div class="contentblocks-setting-link">
        <input type="text" class="linkfield" data-name="{%=o.reference%}" data-limit-to-current-context="{%=o.limit_to_current_context%}" id="setting-{%=o.reference%}" value="{%=o.value%}" placeholder="{%=_('contentblocks.link.placeholder')%}">
    </div>
</div>
</script>
<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-textarea">
<div class="contentblocks-modal-field">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <textarea data-name="{%=o.reference%}" id="setting-{%=o.reference%}">{%=o.value%}</textarea>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-layout-setting-richtext">
<div class="contentblocks-modal-field">
    <label class="field-label" for="setting-{%=o.reference%}">{%=o.title%}</label>
    <div class="contentblocks-modal-layout-setting-richtext-container prevent-drag">
        <textarea class="contentblocks-setting-richtext" data-name="{%=o.reference%}" id="{%=o.settingInstance%}-setting-{%=o.reference%}">{%=o.value%}</textarea>
    </div>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-tinyrte-link">
<div class="contentblocks-modal-field contentblocks-modal-field-link">
    <label class="field-label">{%=o.title%}</label>
    <div class="contentblocks-setting-link">
        <input type="text" id="tinyrte-link" class="linkfield" value="{%=o.value%}" placeholder="{%=_('contentblocks.link.placeholder')%}">
    </div>
</div>
<div class="contentblocks-modal-actions">
    <a href="javascript:void(0);" class="big contentblocks-field-button save-button">{%=_('contentblocks.save')%}</a>
</div>
</script>

<!--

<script type="text/x-tmpl" id="contentblocks-modal-add-content">
<p>{%=_('contentblocks.add_content.introduction')%}</p>
<div class="contentblocks-add-field-categories">
    {%#o.category_html%}
</div>
</script>

-->

<script type="text/x-tmpl" id="contentblocks-modal-add-layout">
<p>{%=_('contentblocks.add_layout.introduction')%}</p>
<div class="contentblocks-modal-field"><input type="text" class="contentblocks-modal-filter" placeholder="{%=_('contentblocks.search_layouts_templates')%}" /></div>
{% if (o.hasTemplates) { %}
    <h2>{%=_('contentblocks.templates')%}</h2>

    <div class="contentblocks-add-template-categories">
        {%#o.category_template_html%}
    </div>

    {% if (o.hasLayouts) { %}
        <h2>{%=_('contentblocks.layouts')%}</h2>
    {% } %}
{% } %}
{% if (o.hasLayouts) { %}
    <div class="contentblocks-add-layout-categories">
        {%#o.category_layout_html%}
    </div>
{% } %}
</script>

<script type="text/x-tmpl" id="contentblocks-modal-switch-layout-selector">
<p>{%=_('contentblocks.switch_layout.chooser.introduction')%}</p>
<div class="contentblocks-modal-field"><input type="text" class="contentblocks-modal-filter" placeholder="{%=_('contentblocks.search_layouts_templates')%}" /></div>
{% if (o.hasTemplates) { %}
    <h2>{%=_('contentblocks.templates')%}</h2>

    <div class="contentblocks-add-template-categories">
        {%#o.category_template_html%}
    </div>

    {% if (o.hasLayouts) { %}
        <h2>{%=_('contentblocks.layouts')%}</h2>
    {% } %}
{% } %}
{% if (o.hasLayouts) { %}
    <div class="contentblocks-add-layout-categories">
        {%#o.category_layout_html%}
    </div>
{% } %}
</script>


<script type="text/x-tmpl" id="contentblocks-modal-add-layout-category">
<div class="contentblocks-add-{%=o.layout_type%}-category  contentblocks-add-{%=o.layout_type%}-category-{%=o.category_id%}">
    {% if (o.category_name) { %}
    <h3 class="contentblocks-category-title">{%=o.category_name%}</h3>
    {% } %}

    {% if (o.category_description) { %}
    <p class="contentblocks-category-description">{%=o.category_description%}</p>
    {% } %}
    <ul class="contentblocks-add-{%=o.layout_type%}-list">{%#o.layouts%}</ul>
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-add-layout-option">
    <li>
        <div class="thumbnail">
            <a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">
                <img src="{%=o.icon%}">
            </a>
        </div>
        <div class="meta">
            <h3><a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">{%=o.name%}</a></h3>
            {% if (o.description) { %}
              <p class="description">{%=o.description%}</p>
            {% } %}
        </div>
    </li>
</script>
<script type="text/x-tmpl" id="contentblocks-modal-add-layout-template-option">
    <li>
        <div class="thumbnail">
            <a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">
                <img src="{%=o.icon%}">
            </a>
        </div>
        <div class="meta">
            <h3><a href="javascript:void(0);" title="{%=o.description%}" data-id="{%=o.id%}" class="tooltip">{%=o.name%}</a></h3>
            {% if (o.description) { %}
              <p class="description">{%=o.description%}</p>
            {% } %}
        </div>
    </li>
</script>

<script type="text/x-tmpl" id="contentblocks-empty-field">
    <li class="contentblocks-field-outer contentblocks-field-empty">
        <div class="contentblocks-field-wrap">
            <div class="contentblocks-add-first-content">
                
            </div>
        </div>
    </li>
</script>

<script type="text/x-tmpl" id="contentblocks-button-delete-field">
<a href="javascript:void(0);" class="contentblocks-field-delete contentblocks-field-button-destructive"><span aria-hidden>&times;</span> {%=_('contentblocks.delete')%}</a>
</script>

<script type="text/x-tmpl" id="contentblocks-button-field-settings">
<a href="javascript:void(0);" class="contentblocks-field-settings"><span class="icon icon-cog"></span></a>
</script>

<script type="text/x-tmpl" id="contentblocks-field-settings-exposed-as-field">
<div class="contentblocks-exposed-fields-wrapper contentblocks-exposed-fields-as-field-wrapper">
{%#o.exposed_fields_asField%}
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-field-settings-exposed-as-setting">
<div class="contentblocks-exposed-fields-wrapper contentblocks-exposed-fields-as-setting-wrapper">

<label><span class="icon icon-cog"></span> {%=_('contentblocks.field_settings')%}</label>
{%#o.exposed_fields_asSetting%}
</div>
</script>

<script type="text/x-tmpl" id="contentblocks-modal-field-setting">
{%#o.setting_fields%}
<div class="contentblocks-save-layout_settings">
    <a href="javascript:void(0);" class="big contentblocks-field-button save-field_settings-button">{%=_('contentblocks.save')%}</a>
</div>
</script>
