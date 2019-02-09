(function ($, ContentBlocks) {
    ContentBlocks.Cropper = function(data, options) {
        var changeCallback = function(data) { },
            configurations = splitConfig(options.configurations || ''),
            cropper = {
                imageData: JSON.parse(JSON.stringify(data)),
                resultData: JSON.parse(JSON.stringify(data.crops || {})),
                onChange: function (callback) {
                    changeCallback = callback;
                },
                activeConfiguration: {},
                activeConfigurationKey: '',
                receiveCrops: false,
                initialCrop: options.initialCrop || false
            };

        var configurationsHtml = '';
        $.each(configurations, function(key, restrictions) {
            var url = cropper.imageData.crops[key] ? cropper.imageData.crops[key].url || data.url : data.url,
                configData = {
                key: key,
                config: restrictions,
                url: ContentBlocks.utilities.normaliseUrls(url).displaySrc,
                width: 170,
                height: 115
            };

            var config = parseConfig(restrictions, data.crops),
                aspect = config.aspect || config.default_aspect || false;
            if (aspect === false) {
                aspect = data.width / data.height;
            }
            aspect = Number(aspect);
            configData.aspect = aspect;
            if (aspect > 1) {
                configData.height = configData.width / aspect;
            }
            else {
                configData.width = configData.height * aspect;
            }

            configurationsHtml += tmpl('contentblocks-field-image-cropper-configuration', configData);
        });

        var htmlData = {
            'image': data,
            'image_url': ContentBlocks.utilities.normaliseUrls(data.url),
            'configurations': configurationsHtml,
            'options': options
        };

        var html = tmpl('contentblocks-field-image-cropper', htmlData);
        ContentBlocks.openModal(_('contentblocks.crop_image'), html, {
            width: '70%',
            initCallback: function(modal, options) {
                modal.addClass('contentblocks-modal-image-cropper');

                var image = modal.find('.contentblocks-image-cropper-preview img').get(0),
                    optionsPanel = modal.find('.contentblocks-image-cropper-options'),
                    previewPanel = modal.find('.contentblocks-image-cropper-preview'),
                    cropsPanel = modal.find('.contentblocks-image-cropper-crops'),
                    cropsRadios = cropsPanel.find('input[name=cropper_crop]'),
                    cropsSaveButtons = previewPanel.find('.contentblocks-crop-save'),
                    ratiosContainer = optionsPanel.find('.cropper-aspect-ratios'),
                    ratiosInputs = ratiosContainer.find('input[type=radio]'),
                    ratioOriginalBox = ratiosContainer.find('#cropper-ratio-original-el'),
                    content = modal.find('.contentblocks-modal-content'),
                    dimensionsOrigWidth = optionsPanel.find('.dimensions-orig-width').get(0),
                    dimensionsOrigHeight = optionsPanel.find('.dimensions-orig-height').get(0),
                    dimensionsTargetCalculated = optionsPanel.find('.cropper-resize-calculated'),
                    dimensionsTargetCalculatedWidth = dimensionsTargetCalculated.find('.cropper-resize-calculated-width').get(0),
                    dimensionsTargetCalculatedHeight = dimensionsTargetCalculated.find('.cropper-resize-calculated-height').get(0),
                    dimensionsTargetForm = optionsPanel.find('.cropper-resize-image'),
                    dimensionsTargetWidth = dimensionsTargetForm.find('.dimensions-target-width'),
                    dimensionsTargetHeight = dimensionsTargetForm.find('.dimensions-target-height'),

                    cropperForm = optionsPanel.find('.cropper-crop-form'),
                    cropperX = optionsPanel.find('.cropper-crop-x').get(0),
                    cropperY = optionsPanel.find('.cropper-crop-y').get(0),
                    cropperWidth = optionsPanel.find('.cropper-crop-width').get(0),
                    cropperHeight = optionsPanel.find('.cropper-crop-height').get(0),
                    // cropperScaleX = optionsPanel.find('.cropper-crop-scale-x').get(0),
                    // cropperScaleY = optionsPanel.find('.cropper-crop-scale-y').get(0),
                    // cropperRotate = optionsPanel.find('.cropper-crop-rotate').get(0),

                    maxHeight = content.css('max-height');

                // Set the height cause flexbox would be too simple
                cropsPanel.css('height', maxHeight);
                previewPanel.css('height', maxHeight);
                optionsPanel.css('height', maxHeight);

                if (Object.keys(configurations).length === 1) {
                    cropsPanel.addClass('hidden');
                }

                // Make the original ratio look the part
                var originalRatio = cropper.imageData.width / cropper.imageData.height,
                    originalRatioWidth = 4,
                    originalRatioHeight = 4 / originalRatio;
                if (originalRatio < 1) {
                    originalRatioWidth = 4 * originalRatio;
                    originalRatioHeight = 4;
                }
                ratioOriginalBox.css('width', originalRatioWidth + 'em').css('height', originalRatioHeight + 'em');

                if (data.width > 0) {
                    dimensionsOrigWidth.innerText = data.width;
                    dimensionsOrigHeight.innerText = data.height;
                    dimensionsTargetWidth.val(data.width);
                    dimensionsTargetHeight.val(data.height);

                    // Calculated, // @todo make this aware of crop config
                    dimensionsTargetCalculatedWidth.innerText = data.width;
                    dimensionsTargetCalculatedHeight.innerText = data.height;
                }

                var instance = new Cropper(image, {
                    aspectRatio: 16 / 9, // from property
                    viewMode: 2,
                    dragMode: 'none',
                    zoomable: false,
                    toggleDragModeOnDblclick: false,

                    crop: function(e) {
                        if (!cropper.receiveCrops) {
                            // console.log('Ignoring crop because cropper.receiveCrops is false', e.detail);
                            return;
                        }
                        // console.log('Received crop event with detail', e.detail);

                        var targetWidth = false,
                            targetHeight = false;

                        // Calculated
                        if (cropper.activeConfiguration) {
                            var aspect = Number(cropper.activeConfiguration.aspect) || false;
                            targetWidth = Number(cropper.activeConfiguration.width) || false;
                            targetHeight = Number(cropper.activeConfiguration.height) || false;


                            // Grab the aspect from the target height and width if both are set
                            if (!aspect && targetHeight && targetWidth) {
                                aspect = targetWidth / targetHeight;
                            }
                            var definedAspect = aspect;
                            // Grab the aspect from the selected area
                            if (!aspect) {
                                aspect = e.detail.width / e.detail.height;
                            }

                            if (aspect) {
                                // Calculate the target height from the width + aspect we got above
                                if (targetWidth > 0 && !targetHeight) {
                                    targetHeight = targetWidth / aspect;
                                }
                                // Or calculate the width from the height + aspect
                                else if (targetHeight > 0 && !targetWidth) {
                                    targetWidth = targetHeight * aspect;
                                }
                            }

                            // console.log('Calculated values based on active configuration', cropper.activeConfiguration, {aspect: aspect, targetWidth: targetWidth, targetHeight: targetHeight});

                            // Update the text that says what the target sizes are
                            dimensionsTargetCalculatedWidth.innerText = targetWidth ? targetWidth.toFixed(0) : 'n/a';
                            dimensionsTargetCalculatedHeight.innerText = targetHeight ? targetHeight.toFixed(0) : 'n/a';
                            dimensionsTargetWidth.val(targetWidth ? targetWidth.toFixed(0) : e.detail.width.toFixed(0));
                            dimensionsTargetHeight.val(targetHeight ? targetHeight.toFixed(0) : e.detail.height.toFixed(0));

                            // Disable fields if we have a width/height, or an aspect + height/width
                            dimensionsTargetWidth.attr('disabled',
                                cropper.activeConfiguration.width ? true :
                                    definedAspect && cropper.activeConfiguration.height ? true : null);
                            dimensionsTargetHeight.attr('disabled',
                                cropper.activeConfiguration.height ? true :
                                    definedAspect && cropper.activeConfiguration.width ? true : null);
                        }

                        cropperX.value = e.detail.x.toFixed(0);
                        cropperY.value = e.detail.y.toFixed(0);
                        cropperWidth.value = e.detail.width.toFixed(0);
                        cropperHeight.value = e.detail.height.toFixed(0);
                        // cropperScaleX.value = e.detail.scaleX.toFixed(0);
                        // cropperScaleY.value = e.detail.scaleY.toFixed(0);
                        // cropperRotate.value = e.detail.rotate.toFixed(0);

                        if (!targetWidth) {
                            targetWidth = e.detail.width;
                        }
                        if (!targetHeight) {
                            targetHeight = e.detail.height;
                        }

                        cropper.resultData[cropper.activeConfigurationKey] = {
                            height: parseInt(e.detail.height),
                            rotate: e.detail.rotate,
                            // scaleX: 1,
                            // scaleY: 1,
                            width: parseInt(e.detail.width),
                            x: parseInt(e.detail.x),
                            y: parseInt(e.detail.y),
                            targetWidth: parseInt(targetWidth),
                            targetHeight: parseInt(targetHeight),
                            url: cropper.imageData.crops[cropper.activeConfigurationKey] ? cropper.imageData.crops[cropper.activeConfigurationKey].url || '' : ''
                        };

                        // Make sure save buttons show unsaved
                        cropsSaveButtons.text(_('contentblocks.cropper.save_crop'));
                    },

                    ready: function() {
                        var def = cropsRadios.first();
                        if (cropper.initialCrop && configurations[cropper.initialCrop]) {
                            def = cropsPanel.find('#contentblocks-crop-' + cropper.initialCrop);
                        }
                        def.attr('checked', 'checked').trigger('change');
                    }
                });

                cropsRadios.on('change', function(e) {
                    var prevState = cropper.imageData.crops[cropper.activeConfigurationKey] ? JSON.stringify(cropper.imageData.crops[cropper.activeConfigurationKey]) : false,
                        currentState = JSON.stringify(cropper.resultData[cropper.activeConfigurationKey]);
                    // console.log('States:', prevState, currentState);
                    if (prevState !== false && prevState !== currentState) {
                        console.log(prevState, currentState);
                        if (ContentBlocks.utilities.confirm(_('contentblocks.cropper.unsaved_crop', {cropKey: cropper.activeConfigurationKey}))) {
                            saveActiveCrop()
                        }
                        else {
                            cropper.resultData[cropper.activeConfigurationKey] = cropper.imageData.crops[cropper.activeConfigurationKey];
                        }
                    }
                    var radio = $(this),
                        cropKey = radio.val(),
                        newConfig = parseConfig(configurations[cropKey]),
                        currentVal = cropper.imageData.crops[cropKey] ? cropper.imageData.crops[cropKey] : false;

                    // console.log('Setting crop, current value:', currentVal);

                    cropper.receiveCrops = false;
                    cropper.activeConfigurationKey = cropKey;
                    cropper.activeConfiguration = newConfig;

                    instance.reset();
                    if (newConfig.default_aspect) {
                        instance.setAspectRatio(newConfig.default_aspect);
                    }

                    // Get or calculate the aspect ratio to use
                    var aspect = Number(newConfig.aspect) || false;
                    if (!aspect && newConfig.width && newConfig.height) {
                        aspect = Number(newConfig.width) / Number(newConfig.height);
                    }
                    if (!aspect) {
                        aspect = NaN;
                    }
                    instance.setAspectRatio(aspect);
                    cropper.receiveCrops = true;

                    var newCropperData = {};
                    newCropperData.x = parseInt(currentVal.x || 0);
                    newCropperData.y = parseInt(currentVal.y || 0);
                    newCropperData.width = parseInt(currentVal.width || newConfig.width);
                    newCropperData.height = parseInt(currentVal.height || newConfig.height);
                    newCropperData.rotate = parseInt(currentVal.rotate || newConfig.rotate || 0);

                    aspect ? ratiosContainer.hide() : ratiosContainer.show();

                    instance.setData(newCropperData);
                });

                dimensionsTargetForm.on('change input', function(e) {
                    dimensionsTargetForm.submit();
                });
                dimensionsTargetForm.on('submit', function(e) {
                    e.preventDefault();
                    var data = instance.getData();
                    data.width = parseInt(dimensionsTargetWidth.val());
                    data.height = parseInt(dimensionsTargetHeight.val());
                    // console.log('Set width and height from resize form', data);
                    instance.setData(data)
                });

                cropperForm.on('change input', function() {
                    cropperForm.submit();
                });
                cropperForm.on('submit', function(e) {
                    e.preventDefault();
                    var data = instance.getData();
                    data.x = parseInt(cropperX.value);
                    data.y = parseInt(cropperY.value);
                    data.width = parseInt(cropperWidth.value);
                    data.height = parseInt(cropperHeight.value);
                    // data.scaleX = parseInt(cropperScaleX.value);
                    // data.scaleY = parseInt(cropperScaleY.value);
                    // data.rotate = parseInt(cropperRotate.value);
                    // console.log('Advanced cropper form submitted', data);
                    instance.setData(data)
                });

                ratiosInputs.on('change', function() {
                    var ratio = this.value;
                    if (ratio === 'original') {
                        ratio = cropper.imageData.width / cropper.imageData.height;
                    }
                    else if (ratio === 'free') {
                        ratio = NaN;
                    }
                    instance.setAspectRatio(ratio);
                });

                cropsSaveButtons.on('click', function() {
                    var btn = $(this);
                    btn.html('<i class="icon icon-spinner icon-spin"></i>');
                    saveActiveCrop(function(success) {
                        if (success) {
                            btn.text(_('contentblocks.cropper.saved_crop'));
                        }
                        else {
                            btn.text(_('contentblocks.cropper.save_crop'));
                        }
                    });
                });
            }
        });

        function saveActiveCrop(callback) {
            callback = callback || function() { };
            cropper.imageData.crops[cropper.activeConfigurationKey] = cropper.resultData[cropper.activeConfigurationKey];

            var currentKey = cropper.activeConfigurationKey,
                url = ContentBlocks.utilities.normaliseUrls(cropper.imageData.url).displaySrc;
            $.ajax({
                url: ContentBlocksConfig.connectorUrl,
                method: 'post',
                data: {
                    action: 'content/image/crop',
                    file: url,
                    field: cropper.imageData.field,
                    resource: ContentBlocksResource && ContentBlocksResource.id ? ContentBlocksResource.id : 0,
                    crop: cropper.activeConfigurationKey,
                    x: cropper.resultData[cropper.activeConfigurationKey].x,
                    y: cropper.resultData[cropper.activeConfigurationKey].y,
                    width: cropper.resultData[cropper.activeConfigurationKey].width,
                    height: cropper.resultData[cropper.activeConfigurationKey].height,
                    target_width: cropper.resultData[cropper.activeConfigurationKey].targetWidth,
                    target_height: cropper.resultData[cropper.activeConfigurationKey].targetHeight
                },
                success: function(data) {
                    if (data.success) {
                        // Update the URL
                        cropper.imageData.crops[currentKey].url =
                            cropper.resultData[currentKey].url =
                                data.object.url;
                        $('#contentblocks-crop-' + currentKey + '-image').attr('src', data.object.url);

                        // Call the callbacks
                        changeCallback(cropper.resultData);
                        callback(true);

                        if (Object.keys(configurations).length === 1) {
                            ContentBlocks.closeModal()
                        }
                    }
                    else {
                        ContentBlocks.alert(data.message, _('error'));
                        callback(false);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                    ContentBlocks.alert(textStatus + ': ' + errorThrown);
                }
            });
        }

        function splitConfig(config) {
            var parsed = {};
            config = config.split('|');
            $.each(config, function(i, def) {
                def = def.split(':');
                parsed[def[0]] = def[1] ? def[1] : '';
            });
            return parsed;
        }

        function parseConfig(def) {
            var parsed = {};
            def = def.length > 0 ? def.split(',') : [];
            $.each(def, function (j, opt) {
                opt = opt.split('=');
                parsed[opt[0]] = opt[1] ? opt[1] : '';
            });
            return parsed;
        }

        window.cbc = cropper;
        return cropper;
    }
})(vcJquery, ContentBlocks);