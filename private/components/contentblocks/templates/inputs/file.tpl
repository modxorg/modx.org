<div class="contentblocks-field contentblocks-field-fileinput contentblocks-drop-target">
    <input type="hidden" class="url" />
    <input type="hidden" class="size" />
    <input type="hidden" class="extension" />
    <div class="contentblocks-field-actions"></div>

    <label>{%=o.name%}</label>
    <div class="contentblocks-field-file-upload" >
        <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-file-choose">{%=_('contentblocks.choose')%}</a>
        <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-upload">{%=_('contentblocks.upload')%}</a>
        {%=_('contentblocks.fileinput.file.or_drop_files')%}
        <input type="file" id="{%=o.generated_id%}-upload" class="contentblocks-field-upload-field" multiple>
    </div>

    <div class="contentblocks-field-file-list prevent-drag">
        <ul class="file-holder"></ul>
    </div>
</div>
