(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.snippet = function(dom, data) {
        var input = {
            fieldId: data.field,
            propertyId: 0,
            snippet: '',
            snippets: {},
            properties: {},
            hiddenProperties: {},
            select: null,
            propertiesList: null,
            propertiesSelectWrapper: null,
            propertiesSelect: null
        };

        input.init = function() {
            if (!ContentBlocks.toBoolean(data.properties.allow_uncached)) {
                dom.find('.contentblocks-field-snippet-uncached').hide();
            }
            else {
                dom.find('.uncached').val(data.uncached || '');
            }

            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-snippet-select select');
            this.propertiesList = dom.find('.contentblocks-properties-list');
            this.propertiesSelectWrapper = dom.find('.contentblocks-field-snippet-add-property');
            this.propertiesSelect = this.propertiesSelectWrapper.find('select');

            this.select.on('change', $.proxy(function() {
                this.chooseSnippet(this.select.val());
            }, this));

            this.propertiesSelect.on('change', $.proxy(function() {
                this.chooseProperty(this.propertiesSelect.val());
            }, this));

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/snippet/getlist',
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
                                input.snippets[val.name] = val;
                            });
                            this.snippetsLoaded();
                        }
                        else {
                            ContentBlocks.alert(_('contentblocks.snippet.none_available'))
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.snippetsLoaded = function() {
            input.select.empty();
            input.select.append('<option></option>');
            $.each(input.snippets, function(name, snip) {
                input.select.append('<option value="' + name + '">' + snip.name + '</option>');
            });

            if (!data.snippet || !data.snippet.length && input.snippets.length == 1) {
                for (var snippetName in input.snippets) break;
                data.snippet = snippetName;
            }

            if (data.snippet) {
                input.select.val(data.snippet);
                input.chooseSnippet(data.snippet);

                if (data.snippet_properties) {
                    $.each(data.snippet_properties, function(key, val) {
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

        input.chooseSnippet = function(name) {
            var s = this.snippets[name];
            if (!s) {
                if (console) console.error('Snippet ' + name + ' not found in available snippets: ', this.snippets);
                return false;
            }

            // Store for easy reference
            input.snippet = name;
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
                if (console) console.error('Property ' + key + ' not found for snippet ' + input.snippet);
                return;
            }

            property.id = 'contentblocks-snippet-property-' + input.propertyId;
            property.key = key;
            property.value = val;

            // Hide the property from the select
            var option = input.propertiesSelect.find('option[value=' + key + ']');
            option.remove();
            input.hiddenProperties[key] = property;

            // Add the property to the list
            input.propertiesList.append(tmpl('contentblocks-field-snippet-property', property));

            var item = input.propertiesList.find('#' + property.id);
            item.find('.contentblocks-field-snippet-delete-property').on('click', function() {
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

            var uncached = (ContentBlocks.toBoolean(data.properties.allow_uncached)) ? dom.find('.uncached').val() : '0';
            return {
                snippet: input.snippet,
                snippet_properties: properties,
                uncached: uncached
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
