<div class="contentblocks-image-cropper">
    <div class="contentblocks-image-cropper-crops">

        <ul class="contentblocks-crops-list">
            {%#o.configurations%}
        </ul>

    </div>
    <div class="contentblocks-image-cropper-preview">
        <button class="contentblocks-crop-save">{%=_('contentblocks.cropper.save_crop')%}</button>
        <img src="{%=o.image_url.displaySrc%}" alt="{%=_('contentblocks.crop_image.preview')%}">
    </div>
    <div class="contentblocks-image-cropper-options">

        <h3>{%=_('contentblocks.cropper.resize_opts')%}</h3>
        <p>{%=_('contentblocks.cropper.resize_original')%}: <span class="dimensions-orig-width"></span>&nbsp;&times;&nbsp;<span class="dimensions-orig-height"></span>px</p>
        <div class="cropper-resize-calculated" style="display: none;">
            <p>Scaled to <span class="cropper-resize-calculated-width"></span>&nbsp;&times;&nbsp;<span class="cropper-resize-calculated-height"></span>px</p>
        </div>
        <form class="cropper-resize-image">
            <input type="number" class="dimensions-target-width" title="{%=_('contentblocks.cropper.resize_width')%}">
            &nbsp;&times;&nbsp;
            <input type="number" class="dimensions-target-height" title="{%=_('contentblocks.cropper.resize_height')%}">
            <!--<button type="submit" class="contentblocks-field-button">Apply</button>-->
        </form>

        <div class="cropper-aspect-ratios">
            <h3>{%=_('contentblocks.cropper.aspect_ratio')%}</h3>

            <ul class="cropper-ratios">
                <li>
                    <input type="radio" name="ratio" value="free" id="cropper-ratio-free" checked>
                    <label for="cropper-ratio-free">
                        <div class="cropper-ratio" style="width: 4em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.free')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="original" id="cropper-ratio-original">
                    <label for="cropper-ratio-original">
                        <div class="cropper-ratio" id="cropper-ratio-original-el" style="width: 4em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.original')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="1" id="cropper-ratio-1">
                    <label for="cropper-ratio-1">
                        <div class="cropper-ratio" style="width: 4em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.1_1')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="1.33" id="cropper-ratio-1.33">
                    <label for="cropper-ratio-1.33">
                        <div class="cropper-ratio" style="width: 4em; height: 3.16em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.4_3')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="1.5" id="cropper-ratio-1.5">
                    <label for="cropper-ratio-1.5">
                        <div class="cropper-ratio" style="width: 4em; height: 2.66em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.3_2')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="1.77" id="cropper-ratio-1.77">
                    <label for="cropper-ratio-1.77">
                        <div class="cropper-ratio" style="width: 4em; height: 2.26em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.16_9')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="0.75" id="cropper-ratio-0.75">
                    <label for="cropper-ratio-0.75">
                        <div class="cropper-ratio" style="width: 3.16em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.3_4')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="0.66" id="cropper-ratio-0.66">
                    <label for="cropper-ratio-0.66">
                        <div class="cropper-ratio" style="width: 2.66em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.2_3')%}
                    </label>
                </li>
                <li>
                    <input type="radio" name="ratio" value="0.56" id="cropper-ratio-0.56">
                    <label for="cropper-ratio-0.56">
                        <div class="cropper-ratio" style="width: 2.26em; height: 4em;"></div>
                        {%=_('contentblocks.cropper.aspect_ratio.9_16')%}
                    </label>
                </li>
            </ul>
        </div>

        <input type="checkbox" id="contentblocks-image-cropper-advanced-toggle">
        <h3><label for="contentblocks-image-cropper-advanced-toggle">{%=_('contentblocks.cropper.advanced')%}</label></h3>
        <div class="contentblocks-image-cropper-advanced">
            <form class="cropper-crop-form">
                <div class="cropper-crop-form-field">
                    <label for="cropper-crop-x">{%=_('contentblocks.cropper.advanced.x')%}</label>
                    <input type="number" class="cropper-crop-x" id="cropper-crop-x">
                </div>
                <div class="cropper-crop-form-field">
                    <label for="cropper-crop-y">{%=_('contentblocks.cropper.advanced.y')%}</label>
                    <input type="number" class="cropper-crop-y" id="cropper-crop-y">
                </div>
                <div class="cropper-crop-form-field">
                    <label for="cropper-crop-width">{%=_('contentblocks.cropper.advanced.width')%}</label>
                    <input type="number" class="cropper-crop-width" id="cropper-crop-width">
                </div>
                <div class="cropper-crop-form-field">
                    <label for="cropper-crop-height">{%=_('contentblocks.cropper.advanced.height')%}</label>
                    <input type="number" class="cropper-crop-height" id="cropper-crop-height">
                </div>
                <!--<div class="cropper-crop-form-field">
                    <label for="cropper-crop-rotate">Rotate</label>
                    <input type="number" class="cropper-crop-rotate" id="cropper-crop-rotate">
                </div>-->
            </form>
        </div>
    </div>
</div>
