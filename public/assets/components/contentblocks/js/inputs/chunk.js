(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.chunk = function(dom, data) {
        var input = {
            preview: dom.find('.chunkOutput'),
            propList: dom.find('.contentblocks-properties-list'),
            dynamicPreview: true,
            fieldWrapper: dom.closest('.contentblocks-field-outer')
        };

        input.init = function() {
            if (!data.properties || !data.properties.chunk || data.properties.chunk < 1) {
                input.preview.html('<p>' + _('contentblocks.chunk.no_chunk_set') + '</p>');
                return;
            }

            if (data.properties.custom_preview && data.properties.custom_preview.length > 1) {
                input.dynamicPreview = false;
                input.preview.html(data.properties.custom_preview);
            }
            else {
                dom.addClass('contentblocks-field-loading');
                var resourcePanel = (window.Ext && Ext.getCmp) ? Ext.getCmp('modx-panel-resource') : null;
                if (resourcePanel) {
                    resourcePanel.on('success', function(o) {
                        input.loadPreview(false, input.getPreviewData());
                    });
                }
            }

            // Watch for changes in input types on the entire field
            input.fieldWrapper.on('input change', 'input, textarea, select', ContentBlocks.utilities.debounce(function() {
                ContentBlocks.fireChange();
                if (input.dynamicPreview) {
                    input.loadPreview(false, input.getPreviewData());
                }
            }, 300));

            // Load the preview now
            input.loadPreview(true, input.getPreviewData(true));
        };

        input.getPreviewData = function(loadProperties) {
            loadProperties = loadProperties || false;
            var previewData = $.extend({
                settings: Ext.decode(input.fieldWrapper.data('settings')) || {}
            }, input.getData());
            if (loadProperties) {
                previewData.chunk_properties = data.chunk_properties;
            }
            return previewData;
        };
        
        input.loadPreview = function(loadProperties, dataValues) {
            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connector_url,
                type: "POST",
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                data: {
                    action: 'content/chunk/get',
                    id: data.properties.chunk,
                    field: data.field,
                    resource: ContentBlocksResource && ContentBlocksResource.id ? ContentBlocksResource.id : 0,
                    data: dataValues
                },
                context: this,
                success: function(result) {
                    if (!result.success) {
                        input.preview.html(result.message);
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        if (input.dynamicPreview) {
                            var content = result.object.preview;
                            content = content.replace(/(<\s*\/?\s*)script(\s*([^>]*)?\s*>)/gi ,'$1jscript$2');
                            dom.find('.chunkOutput').html(content);
                        }

                        if (loadProperties && result.object.properties) {
                            this.loadProperties(result.object.properties);
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });
        };

        input.getData = function() {
            var properties = {};

            input.propList.find('li').each(function(idx, li) {
                var $li = $(li),
                    ip = $li.find('input,select'),
                    key = ip.data('name');
                properties[key] = ip.val();
            });
            return {
                chunk_properties: properties
            };
        };

        input.loadProperties = function(props) {
            input.propList.empty().hide();
            if (props) {
                $.each(props, function(key, property) {
                    var val = (data.chunk_properties && data.chunk_properties[key]) ? data.chunk_properties[key] : property.value;

                    property.id = 'contentblocks-chunk-property-' + key + '-' + data.generated_id;
                    property.key = key;
                    property.value = val;
                    property.name = _(property.name) ? _(property.name) : property.name;

                    switch (property.type) {
                        default:
                            input.propList.append(tmpl('contentblocks-field-chunk-property', property));
                            break;
                    }
                });
                input.propList.show();
                ContentBlocks.fixColumnHeights();
            }
        };

        return input;
    }
})(vcJquery, ContentBlocks);
