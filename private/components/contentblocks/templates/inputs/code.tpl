<div class="contentblocks-field contentblocks-field-code">
    <div class="contentblocks-field-actions"></div>

    <label>{%=o.name%}</label>
    <div class="contentblocks-field-code-area prevent-drag">
        <div id="{%=o.generated_id%}-editor"></div>
    </div>
    <div class="contentblocks-field-code-language">
        <label for="{%=o.generated_id%}-language">{%=_('contentblocks.code.language')%}</label>
        <select class="language" id="{%=o.generated_id%}-language"></select>
    </div>
</div>
