(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.table = function(dom, data) {
        var input = {
            table: false,
            handsontable: false
        };

        input.init = function() {
            this.table = dom.find('.contentblocks-field-table-instance');

            // Prepare some options
            var opts = {
                startRows: 3,
                minSpareRows: 1,
                minSpareCols: 1,
                startCols: 4,
                stretchH: 'all',
                manualColumnMove: true,
                enterBeginsEditing: false,
                contextMenu: true,
                autoWrapCol: true,
                nativeScrollbars: false,

                afterChange: function() {
                    ContentBlocks.fireChange();
                },

                afterCreateRow: ContentBlocks.fixColumnHeights,
                afterRemoveRow: ContentBlocks.fixColumnHeights
            };

            // Got values?
            if (data.value) opts.data = data.value;

            // instantiate handsontable
            this.table.handsontable(opts);

            // store a reference to the HandsonTable
            this.handsontable = this.table.handsontable('getInstance');
            // listen to dragsort to re-render (fixes widths etc)
            dom.on('contentblocks:field_dragged', function() {
                input.handsontable.render();
            });
        };

        input.getData = function() {
            var tableData = this.handsontable.getData();
            return {
                value: tableData
            }
        };

        return input;
    };
})(vcJquery, ContentBlocks);
