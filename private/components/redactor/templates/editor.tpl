<script type="text/javascript">
    if (!RedactorPlugins) var RedactorPlugins = {};
</script>
<script src="[[+assetsUrl]]redactor-2.3.1.min.js"></script>
[[+plugin_files]]
[[+langFile:notempty=`<script type="text/javascript" src="[[+langFile]]"></script>`]]
<script type="text/javascript">
    var $red = (typeof($red) != 'undefined') ? $red : $.noConflict();
    $red(document).ready(function($) {
        var redactorOptions = [[+optionsJson]];
        redactorOptions._name = 'redactor_content_' + redactorOptions.resourceID + '_';
        redactorOptions._keyTriggered = false;
        redactorOptions.changeCallback = MODx.fireResourceFormChange ? function(html) {
            if(!redactorOptions._keyTriggered) MODx.fireResourceFormChange();
            redactorOptions._keyTriggered = true;
        } : null;

        redactorOptions.toolbarFixedTarget = '#modx-content > .x-panel-bwrap > .x-panel-body';
        redactorOptions.imageUploadErrorCallback = function(json) {
            alert(json.error);
        };
        redactorOptions.dropdownShownCallback = function(opts) {
            if (this.$toolbar.hasClass('toolbar-fixed-box')) {
                var top = this.$toolbar.innerHeight() + this.opts.toolbarFixedTopOffset;
                $(opts.dropdown).css({
                    position: 'fixed',
                    top: top + 'px'
                });
            }
        };
        redactorOptions.modalCallback = function() {
            $('.typeahead').each(function(){
                $(this).typeahead({
                    name: 'resources-oss',
                    prefetch: {
                        url: '[[+assetsUrl]]connector.php?action=resources/prefetch',
                        ttl: [[+prefetch_ttl]]
                    },
                    remote: {
                        url: '[[+assetsUrl]]connector.php?action=resources/search&query=%TERM%',
                        wildcard: '%TERM%'
                    },
                    template: [
                        '<p class="resource-id">#{{id}}</p>',
                        '<p class="resource-name">{{& pagetitle}}</p>',
                        '<p class="resource-introtext">{{& introtext}}</p>'
                    ].join(''),
                    valueKey: 'id',
                    limit: 15,
                    engine: Hogan
                });
            });

            var redactorInsertLinkBtn = $('#redactor_insert_link_btn');
            $('.redactor_link_text').on('keyup', function(e) {
                ($(this).val()) ? redactorInsertLinkBtn.removeAttr('disabled') : redactorInsertLinkBtn.attr('disabled','disabled');
            }).trigger('keyup');
        };

        if (!MODx.loadRTE) {
            MODx.loadRTE = function(elements) {
                if ($.isArray(elements)) {
                    var tmpElements = [];
                    $.each(elements, function(idx, value) {
                        tmpElements.push('#'+value);
                    });
                    elements = tmpElements;
                    elements = elements.join(',');
                }
                // Web/symlinks and static resources call MODx.loadRTE with a false parameter
                // in which case we still want to enhance rich text TVs with Redactor
                else if (elements === false) {
                    elements = '.modx-richtext';
                }
                else {
                    elements = '#'+elements;
                }

                if (elements.indexOf('#ta') > -1) {
                    elements += ', .modx-richtext';
                }
                $(elements).each(function(){
                    var element = this;
                    $(element).redactor(redactorOptions);
                    if(typeof CodeMirror !== "undefined" && redactorOptions.codemirror) {
                        var codeMirrorOpts = $.parseJSON(redactorOptions.codemirrorJSON);
                        codeMirrorOpts.firstLineNumber = parseInt(codeMirrorOpts.firstLineNumber); // seems silly but necessary without JSON_NUMERIC_CHECK
                        codeMirrorOpts.indentUnit = parseInt(codeMirrorOpts.indentUnit);
                        codeMirrorOpts.tabSize = parseInt(codeMirrorOpts.tabSize);
                        codeMirrorOpts.undoDepth = parseInt(codeMirrorOpts.undoDepth);
                        codeMirrorOpts.mode = codeMirrorOpts.mode || 'text/html';
                        codeMirrorOpts.autoCloseTags = (codeMirrorOpts.autoCloseTags !== undefined) ? codeMirrorOpts.autoCloseTags : true;
                        var editor = CodeMirror.fromTextArea($(element)[0], codeMirrorOpts);
                        //editor.setOption('theme','cobalt');
                        editor.on('change',function(cm,cmChangeObject){
                            $($(element)[0]).val(cm.getValue());
                        });
                    }
                });
                
                
            };
        }

        /** Setup jQuery's ajax to pass the necessary headers */
        Ext.onReady(function(){
            setTimeout(function() {
                $.ajaxSetup({
                    beforeSend:function(xhr, settings){
                        if(!settings.crossDomain) {
                            xhr.setRequestHeader('modAuth',MODx.siteId);
                            xhr.setRequestHeader('Powered-By','Redactor in MODX Revolution');    
                        }
                    }
                });

                var panel = Ext.getCmp('modx-panel-resource');
                if (panel) {
                    panel.on('success', function () {
                        redactorOptions._keyTriggered = false;
                    });
                }
            }, 500);
        });
    });
</script>
