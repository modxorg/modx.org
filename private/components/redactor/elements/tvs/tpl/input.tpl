<script>
    (function(){
        function loadRedactorJS() {
            document.write('<script src="{$assetsUrl}redactor-2.3.1.min.js"><\/script>')
        }
        try {
            if(!window.jQuery || !jQuery.fn.redactor) loadRedactorJS();
        } catch(e) {
            loadRedactorJS();
        }
    })();
</script>
{$pluginFiles}
{$langFile}
<textarea id="tv{$tv->id}" class="red-richtext" name="tv{$tv->id}" tvtype="{$tv->type}">{$tv->get('value')|escape}</textarea>

<script type="text/javascript">
    var $redTv = $redTv || ((typeof($red) != 'undefined') ? $red : jQuery);
    $redTv(document).ready(function($) {
        var init = false;
        MODx.on('ready', function(){
            if(init) return;
            var tv{$tv->id}Options = {$params_json};
            tv{$tv->id}Options._keyTriggered = false;
            tv{$tv->id}Options._name = "resource" + tv{$tv->id}Options.resourceID + "_tv{$tv->id}";
            tv{$tv->id}Options.changeCallback = function(obj,event) {
                if(!tv{$tv->id}Options._keyTriggered) MODx.fireResourceFormChange();
                tv{$tv->id}Options._keyTriggered = true;
            };
            tv{$tv->id}Options.modalCallback = function(){
                $redTv('.typeahead').each(function(){
                    $redTv(this).typeahead({
                        name: 'resources-oss',
                        prefetch: {
                            url: '{$assetsUrl}connector.php?action=resources/prefetch',
                            ttl: {$params.prefetch_ttl}
                        },
                        remote: {
                            url: '{$assetsUrl}connector.php?action=resources/search&query=%TERM%',
                            wildcard: '%TERM%'
                        },
                        template: [{literal}
                            '<p class="resource-id">#{{id}}</p>',
                            '<p class="resource-name">{{& pagetitle}}</p>',
                            '<p class="resource-introtext">{{& introtext}}</p>'
                            {/literal}].join(''),
                        valueKey: 'id',
                        limit: 15,
                        engine: Hogan
                    });
                });
            };

            $redTv('#tv{$tv->id}').redactor(tv{$tv->id}Options);
            if(typeof CodeMirror !== "undefined" && tv{$tv->id}Options.codemirror) {
                var codeMirrorOpts = $.parseJSON(tv{$tv->id}Options.codemirrorJSON);
                codeMirrorOpts.firstLineNumber = parseInt(codeMirrorOpts.firstLineNumber); // seems silly but necessary without JSON_NUMERIC_CHECK
                codeMirrorOpts.indentUnit = parseInt(codeMirrorOpts.indentUnit);
                codeMirrorOpts.tabSize = parseInt(codeMirrorOpts.tabSize);
                codeMirrorOpts.undoDepth = parseInt(codeMirrorOpts.undoDepth);
                codeMirrorOpts.mode = codeMirrorOpts.mode || 'text/html';
                codeMirrorOpts.autoCloseTags = (codeMirrorOpts.autoCloseTags !== undefined) ? codeMirrorOpts.autoCloseTags : true;
                var editor = CodeMirror.fromTextArea($redTv('#tv{$tv->id}')[0], codeMirrorOpts);
                editor.on('change',function(cm,cmChangeObject){
                    $redTv('#tv{$tv->id}').val(cm.getValue());
                });
            }

            Ext.getCmp('modx-panel-resource').on('success', function() {
                tv{$tv->id}Options._keyTriggered = false;
            });


            /** Setup jQuery's ajax to pass the necessary headers */
            $redTv.ajaxSetup({
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                        xhr.setRequestHeader('Powered-By','Redactor in MODX Revolution');
                    }
                }
            });

            Ext.getCmp('modx-panel-resource').on('success', function() {
                tv{$tv->id}Options._keyTriggered = false;
            });
            init = true;
        });
    });
</script>
