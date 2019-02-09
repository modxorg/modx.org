<div class="contentblocks-loader"></div>
<div class="contentblocks-field contentblocks-field-snippet">
    <div class="contentblocks-field-actions"></div>

    <label for="{%=o.generated_id%}-snippet">{%=o.name%}</label>
    <div class="contentblocks-field-snippet-select">
        <label for="{%=o.generated_id%}-add-property">{%=_('contentblocks.snippet.choose_snippet')%}</label>
        <select id="{%=o.generated_id%}-snippet"></select>
    </div>
    <div class="contentblocks-field-snippet-uncached">
        <label for="{%=o.generated_id%}-uncached">{%=_('contentblocks.snippet.uncached')%}</label>
        <select id="{%=o.generated_id%}-uncached" class="uncached">
            <option value="">{%=_('contentblocks.snippet.uncached_0')%}</option>
            <option value="1">{%=_('contentblocks.snippet.uncached_1')%}</option>
        </select>
    </div>
    <div class="contentblocks-field-snippet-add-property">
        <label for="{%=o.generated_id%}-add-property">{%=_('contentblocks.snippet.add_property')%}</label>
        <select id="{%=o.generated_id%}-add-property"></select>
    </div>
    <div class="contentblocks-field-snippet-properties">
        <ul class="contentblocks-properties-list"></ul>
    </div>
</div>
