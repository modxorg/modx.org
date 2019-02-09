(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.dropdown = function(dom, data) {
        var input = {
            fieldId: data.field,
            select: null,
            options: {}
        };

        input.init = function() {
            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-dropdown-select select');

            if (data.value) {
                var opt = $('<option></option>');
                opt.attr('value', data.value);
                opt.text(data.display ? data.display : data.value);
                this.select.append(opt);
                this.select.attr('disabled', 'disabled');
            }

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/dropdown/getlist',
                    field: input.fieldId,
                    resource: MODx.request.id || 0
                },
                context: this,
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                success: function(result) {
                    if (result.results) {
                        input.setOptions(result.results);
                        this.optionsLoaded();
                    }
                    else {
                        ContentBlocks.alert(_('contentblocks.dropdown.none_available'))
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.setOptions = function(options) {
            input.options = options;
            input.optionsLoaded();
        };

        input.optionsLoaded = function() {
            input.select.empty();
            $.each(input.options, function(idx, option) {
                var opt = $('<option></option>');
                opt.attr('value', option.value);
                opt.text(option.display);
                if (option.disabled) {
                    opt.attr('disabled', 'disabled');
                }

                input.select.append(opt);
            });

            if (!data.value) {
                data.value = data.properties.default_value;
            }

            if (data.value) {
                input.select.val(data.value);
            }

            input.select.attr('disabled', null);
        };

        input.getData = function () {
            return {
                value: input.select.val() || '',
                display: input.select.find(':selected').text()
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
