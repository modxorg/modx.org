(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.layout = function(dom, data) {
        var input = {};
        input.init = function() {
            var children = data.child_layouts || {},
                isRepeatLayout = false;
            if (data.properties.available_layouts) {
                dom.data('layouts', data.properties.available_layouts);
            }
            if (data.properties.available_templates) {
                dom.data('templates', data.properties.available_templates);
            }

            if(typeof window.event !== 'undefined') {
                var target = $(window.event.target);
                isRepeatLayout = target.hasClass('contentblocks-repeat-layout');
            }

            // Automatically open the add layout modal when adding a layout field
            if (!isRepeatLayout && $.isEmptyObject(children) && ContentBlocks.initialized) {
                setTimeout(function() {
                    dom.find('.contentblocks-add-layout').click();
                }, 500);
            }
            ContentBlocks.buildContents(children, dom.find('.contentblocks-layout-wrapper').first());
        };
        input.destroy = function() {
            dom.find('.contentblocks-layout').each(function(index, region) {
                var $region = $(region);
                
                // have to filter to account for nested layouts. can't use children() because .contentblocks-content is buried.
                var children = $region.find('.contentblocks-content').not($region.find('.contentblocks-layout .contentblocks-content'));
                $.each(children, function (partIndex, part) {
                
                    // have to filter to account for nested layouts. can't use children() because .contentblocks-field is buried.
                    $.each($(part).find('.contentblocks-field').not($(part).find('.contentblocks-field .contentblocks-field')), function(fieldIndex, field) {
                        ContentBlocks.deleteField(window.event, $(field), true);
                    });
                });
                ContentBlocks.deleteLayout(window.event, $region, true);
            });
        };
        input.getData = function () {
            var layouts = [];
            dom.find('.contentblocks-layout-wrapper').first().children('.contentblocks-layout').each(function(index, region) {
                var $region = $(region),
                    layoutId = $region.data('layout'),
                    parent = $(this).parent().closest('li.contentblocks-field-outer').data('field') || 0,
                    regionData = {
                        layout: layoutId,
                        content: {},
                        settings: Ext.decode($region.data('settings')) || {},
                        parent: parent
                    };

                // Custom titles per layout requires a bit of processing and ugly searching
                var title = $region.find('> .contentblocks-region-container > .contentblocks-region-container-header .contentblocks-layout-title').text(),
                    originalTitle = (ContentBlocksLayouts['_' + layoutId]) ? ContentBlocksLayouts['_' + layoutId].name : '';

                if (_(originalTitle)) {
                    originalTitle = _(originalTitle);
                }
                if (title && title.length && title !== originalTitle) {
                    regionData.title = title;
                }
                    
                var children = $region.find('.contentblocks-content').not($region.find('.contentblocks-content .contentblocks-content'));
                $.each(children, function (partIndex, part) {
                    var $part = $(part),
                        partName = $part.data('part'),
                        partFields = [];

                    $.each($part.children('li'), function (fieldIndex, field) {
                        var $field = $(field),
                            fieldId = $field.data('field'),
                            inputId = $field.attr('id'),
                            input = ContentBlocks.generatedContentFields[inputId];

                        if (input) {
                            var fieldValue = input.getData();
                            fieldValue.field = fieldId;
                            fieldValue.settings = Ext.decode($field.data('settings')) || {};
                            partFields.push(fieldValue);
                        }
                    });

                    regionData.content[partName] = partFields;
                });

                layouts.push(regionData);
            });
            return {
                child_layouts: layouts
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
