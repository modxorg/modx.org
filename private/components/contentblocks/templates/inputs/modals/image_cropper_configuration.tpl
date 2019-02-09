<li class="contentblocks-crop-configuration">
    <input type="radio" name="cropper_crop" value="{%= o.key %}" class="crop-radio" id="contentblocks-crop-{%=o.key%}">
    <label class="contentblocks-crop-preview" for="contentblocks-crop-{%=o.key%}">
        <img src="{%=o.url%}" alt="{%=_('contentblocks.crop_image.preview')%}" id="contentblocks-crop-{%=o.key%}-image">
        <p>{%= o.key %}</p>
    </label>
</li>