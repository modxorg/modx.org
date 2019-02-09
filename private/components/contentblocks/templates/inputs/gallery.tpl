<div class="contentblocks-loader"></div>

<div class="contentblocks-field contentblocks-field-gallery contentblocks-field-gallery_with_title contentblocks-drop-target">
    <input type="hidden" class="url" />
    <input type="hidden" class="size" />
    <input type="hidden" class="extension" />
    <div class="contentblocks-field-actions"></div>

    <label>{%=o.name%}</label>
    <div class="contentblocks-field-gallery-upload" >
        <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-gallery-choose">{%=_('contentblocks.choose')%}</a>
        <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-upload">{%=_('contentblocks.upload')%}</a>
        <a href="javascript:void(0);" class="big contentblocks-field-button contentblocks-field-gallery-url">{%=_('contentblocks.from_url')%}</a>
        {%=_('contentblocks.image.or_drop_images')%}
        <input type="file" id="{%=o.generated_id%}-upload" class="contentblocks-field-upload-field" multiple>
    </div>

    <div class="contentblocks-field-gallery-list prevent-drag">
        <ul class="gallery-image-holder"></ul>
    </div>
</div>
