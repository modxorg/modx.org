(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.link = function (dom, data) {
        var input = {};
        
        input.init = function() {
            ContentBlocks.initializeLinkField(dom.find('input[id].linkfield'), data);
        };

        input.getData = function () {
            var $link = dom.find('input[id].linkfield');
            return {
                link: $link.val(),
                linkType: ContentBlocks.getLinkFieldDataType($link.val())
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
