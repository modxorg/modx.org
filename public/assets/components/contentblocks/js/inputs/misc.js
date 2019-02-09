(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.hr = function(dom, data) {
        var input = {};

        input.getData = function () {
            return {
                value: 1
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
