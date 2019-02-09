(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.list = function(dom, data) {
        var input = {
            itemId: 0,
            rootList: false
        };

        input.init = function() {
            if ($.isArray(data.items)) {
                input.rootList = dom.find('ul');
                $.each(data.items, function(idx, item) {
                    input.addRecursiveItem(input.rootList, item);
                });
            }
            else {
                input.addItem(dom.find('.contentblocks-field-list-outer'), {value: ''});
            }
            dom.find('ul, ol').sortable({
                items: 'li',
                connectWith: '.contentblocks-field-list-outer ul, .contentblocks-field-list-outer ol',
                forceHelperSize: true,
                forcePlaceholderSizeType: true,
                placeholder: 'ui-sortable-list-placeholder',
                tolerance: 'pointer',
                cursor: 'move',
                cancel: 'input,textarea,button,select,option',
                handle: '.contentblocks-field-list-move',
                update: function(event, ui) {
                    ui.item.trigger('contentblocks:field_dragged');
                    ContentBlocks.fixColumnHeights();
                    ContentBlocks.fireChange();
                },

                start: function(event, ui) {
                    ui.placeholder.height(ui.item.height());
                }
            });
        };

        input.addRecursiveItem = function(target, item) {
            var id = this.addItem(target, {value: item.value});
            if (item.items && item.items.length) {
                $.each(item.items, function(idx, subItem) {
                    input.addRecursiveItem(target.find('#'+id).find('ul').first(), subItem);
                });
            }
        };

        input.addItem = function(list, values, autoFocus, position) {
            input.itemId++;
            values = values || {value: ''};
            values.id = 'contentblocks-list-item' + input.itemId;
            position = (position || (position === 0)) ? position : 'last';

            var newItem = tmpl('contentblocks-field-list-item', values);
            if (position === 'last') {
                list.append(newItem);
            }
            else {
                list.children('li').eq(position).after(newItem);

            }

            var item = list.find('#' + values.id),
                textInput = item.find('input');

            // Handle keys properly with the list items
            textInput.on('keydown', function(e) {
                var key = e.which || e.keyCode,
                    $this = $(this),
                    $list = $this.closest('li'),
                    val = $this.val();
                // Enter
                // Add a new list item at this level.
                if (key == 13) {
                    input.addItem($this.closest('ul'), {}, true, $list.index());
                }
                // Backspace
                // If the field is empty, remove the list item.
                else if (key == 8) {
                    if (val == '') {
                        // Prevent navigation from hitting backspace
                        e.preventDefault();
                        if (input.rootList.find('li').length > 1) {
                            // Trigger a keydown event for the up key to move up an item
                            var kde = jQuery.Event('keydown', {which: 38});
                            textInput.trigger(kde);

                            // Remove the item
                            $this.closest('li').remove();
                        }
                    }
                }
                // Tab (w/ + w/o shift)
                // Used to indent/outdent the list item.
                // If indent/outdent is not available (can't go deeper or lower), it just focuses next/prev.
                else if (key == 9) {
                    e.preventDefault();
                    var parentList = null,
                        focus = false;
                    if (e.shiftKey) {
                        // Get the new parent list
                        parentList = $this.closest('ul').closest('li');
                        // Check if we're still in the list field
                        var withinFld = parentList.closest('.contentblocks-field-list-outer');
                        if (parentList && (withinFld.length > 0)) {
                            // We move all next siblings to the current nest
                            $list.nextAll().appendTo($list.find('ul').first());
                            // Move the list up a parent
                            $list.insertAfter(parentList);
                            focus = true;
                        }
                    }
                    else {
                        // Get the previous list item & nest list
                        var prevItem = $list.prev(),
                            prevItemList = prevItem.find('ul').first();

                        if (prevItemList.length) {
                            $list.appendTo(prevItemList);
                            focus = true;
                        }

                    }

                    if (focus) {
                        var ti = $list.find('input');
                        if (ti.hasClass('tinyrte-replaced')) {
                            ti.show();
                            ti.siblings('.tinyrte-container').hide();
                        }
                        ti.focus();
                    }
                }
                // up arrow
                // Move up in the list in a natural order
                else if (key == 38) {
                    var prev = null,
                        previousSameLvl = $list.prev();
                    if (previousSameLvl.length) {
                        var previousDeeperLvl = previousSameLvl.find('li').last();
                        if (previousDeeperLvl.length) prev = previousDeeperLvl;
                        else prev = previousSameLvl;
                    }
                    else {
                        var previousUpperLvl = $list.closest('ul').closest('li'),
                            valid = previousUpperLvl.closest('.contentblocks-field-list-outer').length;
                        if (previousUpperLvl.length && valid) {
                            prev = previousUpperLvl;
                        }
                    }

                    if (prev) {
                        prev.find('input').first().focus();
                    }
                }
                // down arrow
                // Move down in the list in a natural order
                else if (key == 40) {
                    var next = null,
                        nextDeeperLvl = $list.find('li').first(),
                        nextSameLvl = $list.next();

                    if (nextDeeperLvl.length) {
                        next = nextDeeperLvl;
                    }
                    else if (nextSameLvl.length) {
                        next = nextSameLvl;
                    }
                    else {
                        var nextUpperLvl = $list.closest('ul').closest('li').next(),
                            nextUpperLvlValid = nextUpperLvl.closest('.contentblocks-field-list-outer').length;
                        if (nextUpperLvl.length && nextUpperLvlValid) {
                            next = nextUpperLvl;
                        }
                    }

                    if (next) {
                        next.find('input').first().focus();
                    }
                }

            });

            // Add a list
            item.find('.contentblocks-field-list-add').on('click', function() {
                var nest = $(this).closest('li').find('.contentblocks-field-list-nested'),
                    nestedList = nest.find('ul > li'),
                    btn = $(this);

                if (nestedList.length > 0) {
                    nestedList.remove();
                    btn.text('»');
                }
                else {
                    input.addItem(nest.find('ul'), {}, true);
                    btn.text('«')
                }
                ContentBlocks.fireChange();
            });
            item.find('.contentblocks-field-list-delete').on('click', function() {
                $(this).closest('li').remove();
                ContentBlocks.fireChange();
                ContentBlocks.fixColumnHeights();
            });

            if (autoFocus) {
                textInput.focus();
            }
            ContentBlocks.fixColumnHeights();

            // Add a tiny RTE to the input
            if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                ContentBlocks.addTinyRte(textInput);
            }
            return values.id;
        };

        input.getData = function () {
            var outer = dom.find('.contentblocks-field-list-outer'),
                items = [];

            outer.children('li').each(function(idx, li) {
                var item = $(li);
                items.push({
                    value: item.find('input').first().val(),
                    items: input.getNested(item)
                });

            });
            return {
                items: items
            };
        },

        input.getNested = function(item) {
            var items = [];
            item.find('ul').first().children('li').each(function(idx, li) {
                var nestedItem = $(li);
                items.push({
                    value: nestedItem.find('input').first().val(),
                    items: input.getNested(nestedItem)
                })
            });
            return items;
        };

        return input;
    };

    ContentBlocks.fieldTypes.ordered_list = function(dom, data) {
        return ContentBlocks.fieldTypes.list(dom, data);
    };
})(vcJquery, ContentBlocks);
