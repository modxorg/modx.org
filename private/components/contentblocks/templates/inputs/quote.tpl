<div class="contentblocks-field contentblocks-field-quote">
    <div class="contentblocks-field-actions"></div>

    <label for="{%=o.generated_id%}_quote">{%=o.name%}</label>
    <div class="contentblocks-field-textarea contentblocks-field-text-textarea">
        <textarea id="{%=o.generated_id%}_quote">{%=o.value%}</textarea>
    </div>
    <div class="contentblocks-field-text contentblocks-field-quote-cite">
        <label for="{%=o.generated_id%}_cite">{%=_('contentblocks.quote.author')%}</label>
        <input type="text" value="{%=o.cite%}" id="{%=o.generated_id%}_cite">
    </div>
</div>
