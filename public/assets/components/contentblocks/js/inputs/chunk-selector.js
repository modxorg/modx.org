(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.chunk_selector = function(dom, data) {
        var input = {
            fieldId: data.field,
            propertyId: 0,
            chunk_selector: '',
            chunk_selectors: {},
            properties: {},
            hiddenProperties: {},
            select: null,
            propertiesList: null,
            propertiesSelectWrapper: null,
            propertiesSelect: null
        };

        input.init = function() {
            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-chunk_selector-select select');
            this.propertiesList = dom.find('.contentblocks-properties-list');
            this.propertiesSelectWrapper = dom.find('.contentblocks-field-chunk_selector-add-property');
            this.propertiesSelect = this.propertiesSelectWrapper.find('select');

            this.select.on('change', $.proxy(function() {
                this.chooseChunk(this.select.val());
            }, this));

            this.propertiesSelect.on('change', $.proxy(function() {
                this.chooseProperty(this.propertiesSelect.val());
            }, this));

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/chunk_selector/getlist',
                    field: input.fieldId
                },
                context: this,
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                success: function(result) {
                    if (!result.results) {
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        if (result.results && result.results.length) {
                            $.each(result.results, function(idx, val) {
                                input.chunk_selectors[val.name] = val;
                            });
                            this.chunk_selectorsLoaded();
                        }
                        else {
                            ContentBlocks.alert(_('contentblocks.snippet.none_available'));
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.chunk_selectorsLoaded = function() {
            input.select.empty();
            input.select.append('<option></option>');
            $.each(input.chunk_selectors, function(name, chunk) {
              chunk.name = (chunk.description != '') ? chunk.name + ' (' + chunk.description + ')' : chunk.name;
                input.select.append('<option value="' + name + '">' + chunk.name + '</option>');
            });

            if (!data.chunk_selector || !data.chunk_selector.length && input.chunk_selectors.length == 1) {
                for (var snippetName in input.chunk_selectors) break;
                data.chunk_selector = snippetName;
            }

            if (data.chunk_selector) {
                input.select.val(data.chunk_selector);
                input.chooseChunk(data.chunk_selector);

                if (data.chunk_selector_properties) {
                    $.each(data.chunk_selector_properties, function(key, val) {
                        input.chooseProperty(key, val);
                    });
                }
            }

            if (input.select.find('option').length < 2) {
                input.select.hide();
            }
            else {
                input.select.show();
            }
        };

        input.chooseChunk = function(name) {
            var s = this.chunk_selectors[name];
            if (!s) {
                if (console) console.error('Chunk ' + name + ' not found in available chunks: ', this.chunk_selectors);
                return false;
            }

            // Store for easy reference
            input.chunk_selector = name;
            input.properties = s.properties;

            // Empty other stuff
            input.propertiesSelect.empty();
            input.propertiesList.empty();

            // Populate the select
            input.propertiesSelect.append('<option></option>');
            if (s.properties) {
                $.each(s.properties, function(key, property) {
                    input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                });
            }
            input.propertiesSelect.append('<option value="__other__">' + _('contentblocks.snippet.other_property') + '</option>');

            // Show the select
            input.propertiesSelectWrapper.show();
        };

        input.chooseProperty = function(key, val) {
            val = val || '';
            input.propertyId++;
            var property = false;

            if (key == '__other__') {
                property = {
                    name: _('contentblocks.snippet.other_property'),
                    desc_trans: _('contentblocks.snippet.other_property.desc')
                };
            }
            else {
                property = (input.properties && input.properties[key]) ? input.properties[key] : false;
            }

            // Make sure we have a valid property
            if (!property) {
                if (console) console.error('Property ' + key + ' not found for chunk_selector ' + input.chunk_selector);
                return;
            }

            property.id = 'contentblocks-chunk_selector-property-' + input.propertyId;
            property.key = key;
            property.value = val;
            property.name = _(property.name) ? _(property.name) : property.name;

            // Hide the property from the select
            var option = input.propertiesSelect.find('option[value=' + key + ']');
            option.remove();
            input.hiddenProperties[key] = property;

            // Add the property to the list
            input.propertiesList.append(tmpl('contentblocks-field-chunk_selector-property', property));

            var item = input.propertiesList.find('#' + property.id);
            item.find('.contentblocks-field-chunk-delete-property').on('click', function() {
                input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                input.hiddenProperties[key] = false;
                item.remove();

                if (input.propertiesList.find('li').length < 1) input.propertiesList.hide();
            });
            item.find('input').on('keyup', function() {
                ContentBlocks.fireChange();
            });

            // Show the properties list
            input.propertiesList.show();
        };

        input.getData = function () {
            var properties = {};

            input.propertiesList.find('li').each(function(idx, li) {
                var $li = $(li),
                    ip = $li.find('input'),
                    key = ip.data('name');
                properties[key] = ip.val();
            });

            return {
                chunk_selector: input.chunk_selector,
                chunk_selector_properties: properties
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
