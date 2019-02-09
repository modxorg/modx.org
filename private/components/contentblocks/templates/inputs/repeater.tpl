<div class="contentblocks-field contentblocks-field-repeater contentblocks-repeater-{%=o.properties.layout_style || 'default' %}{%=o.properties.multirow %}">
    <div class="contentblocks-field-actions"></div>

    <a class="contentblocks-collapser contentblocks-repeater-collapser contentblocks-repeater-expanded" href="javascript:void(0)">-</a>

    <label>{%=o.name%}</label>

    <div class="contentblocks-field-actions-top">
        <a class="contentblocks-repeater-add-item big contentblocks-field-button" data-target="top" href="javascript:void(0);">+ {%=_('contentblocks.repeater.add_item')%}</a>
    </div>

    <ul class="contentblocks-repeater-wrapper contentblocks-repeater-{%=o.properties.manager_columns%}-columns"></ul>

    <div class="contentblocks-field-actions-bottom">
        <a class="contentblocks-repeater-add-item big contentblocks-field-button" data-target="bottom" href="javascript:void(0);">+ {%=_('contentblocks.repeater.add_item')%}</a>
    </div>
    
</div>
