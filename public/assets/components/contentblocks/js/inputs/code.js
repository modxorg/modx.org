(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.code = function(dom, data) {
        var input = {
            editor: null
        };

        ace.config.set('basePath', ContentBlocksConfig.assets_url + 'js/vendor/9cloud/ace');
        input.init = function() {
            this.editor = ace.edit(data.generated_id + '-editor');
            this.editor.setTheme('ace/theme/' + ContentBlocksConfig['code.theme']);
            this.editor.setValue(data.value || '', 1);
            this.editor.setOptions({
                minLines: 1,
                maxLines: Infinity,
                wrap: 'free',
                showPrintMargin: false
            });
            this.editor.on('input', function() {
                ContentBlocks.fireChange();
            });

            // Generate the language dropdown based on field configuration
            var lang = dom.find('.language'),
                avl = data.properties.available_languages || "html=HTML,javascript=JavaScript,css=CSS,php=PHP";

            avl = avl.split(',');
            $.each(avl, function(i, lvl) {
                lvl = lvl.split('=');
                var val = _('contentblocks.' + lvl[1]) || lvl[1];
                lang.append('<option value="' + lvl[0] + '">' + val + '</option>');
            });

            // Hide the dropdown if there's not much to choose from
            if (avl.length < 2) {
                lang.parent().hide();
            }

            // Select the language
            if (!data.lang) data.lang = data.properties.default_language || 'html';
            lang.val(data.lang);
            this.editor.getSession().setMode('ace/mode/' + data.lang);

            lang.on('change', function() {
                input.editor.getSession().setMode('ace/mode/' + $(this).val());
                ContentBlocks.fireChange();
            });
        };

        input.getData = function () {
            return {
                value: this.editor.getValue(),
                lang: dom.find('.language').val()
            };
        };

        input.confirmBeforeDelete = function() {
            var inputData = input.getData(),
                hasLang = inputData.lang != data.properties.default_language,
                hasCode = inputData.value.length > 0;

            return hasLang || hasCode;
        };

        return input;
    }
})(vcJquery, ContentBlocks);
