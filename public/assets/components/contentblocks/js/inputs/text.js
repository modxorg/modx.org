(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.heading = function(dom, data) {
        var input = {};

        input.init = function () {
            // Generate the heading dropdown based on field configuration
            var avl = data.properties.available_levels || "h1=heading_1,h2=heading_2,h3=heading_3,h4=heading_4,h5=heading_5,h6=heading_6",
                select = dom.find('.contentblocks-field-heading-level select');

            avl = avl.split(',');
            $.each(avl, function(i, lvl) {
                lvl = lvl.split('=');
                var val = _('contentblocks.' + lvl[1]) || lvl[1];
                select.append('<option value="' + lvl[0] + '">' + val + '</option>');
            });


            if (data.level) {
                select.val(data.level);
            }
            else {
                var def = data.properties.default_level || 'h2';
                select.val(def);
            }

            if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                var title = dom.find('#' + data.generated_id + '_input');
                ContentBlocks.addTinyRte(title);
            }
        };

        input.getData = function () {
            return {
                value: dom.find('.contentblocks-field-heading-input input').val(),
                level: dom.find('.contentblocks-field-heading-level select').val()
            };
        };

        input.confirmBeforeDelete = function() {
            var inputData = input.getData(),
                hasLevel = inputData.level != data.properties.default_level,
                hasText = inputData.value.replace(/^\s\s*/, '').replace(/\s\s*$/, '').length > 0;

            return hasLevel || hasText;
        };

        return input;
    };

    ContentBlocks.fieldTypes.textarea = function(dom, data) {
        return {
            init: function () {
                if (data.properties && ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_textarea');
                    ContentBlocks.addTinyRte(field);
                }
                else {
                    setTimeout(function() {
                        dom.find('.contentblocks-field-textarea textarea').autoGrow()
                            .on('change', ContentBlocks.fixColumnHeights);
                    }, 100);
                }
            },
            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val()
                };
            }
        };
    };

    ContentBlocks.fieldTypes.richtext = function(dom, data) {
        return {
            init: function () {
                var textarea = dom.find('.contentblocks-field-textarea textarea');
                if (MODx.loadRTE) {
                    MODx.loadRTE(textarea.attr('id'));
                    setTimeout(function() {
                        ContentBlocks.fixColumnHeights();
                    }, 100);
                }
                else {
                    setTimeout(function() {
                        textarea.autoGrow();
                    }, 100);
                }
                textarea.on('change', ContentBlocks.fixColumnHeights);
            },
            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val()
                };
            }
        }
    };

    ContentBlocks.fieldTypes.textfield = function(dom, data) {
        return {
            init: function() {
                if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_textfield');
                    ContentBlocks.addTinyRte(field);
                }
            },

            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-text input').val()
                };
            }
        }
    };

    ContentBlocks.fieldTypes.quote = function(dom, data) {
        return {
            init: function () {
                if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_quote');
                    ContentBlocks.addTinyRte(field);
                }
                else {
                    setTimeout(function () {
                        dom.find('.contentblocks-field-textarea textarea').autoGrow().on('change', ContentBlocks.fixColumnHeights);
                    }, 100);
                }
                if (data.cite) {
                    dom.find('.contentblocks-field-text input').val(data.cite);
                }
            },

            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val(),
                    cite: dom.find('.contentblocks-field-text input').val()
                };
            }
        }
    };
})(vcJquery, ContentBlocks);
