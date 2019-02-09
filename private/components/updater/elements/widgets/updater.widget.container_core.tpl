<div
        id="[[+updater.id:default=`updater_widget`]]"
        class="row core [[+updater.state]] [[+updater.isImportant]] [[+updater.security.available:is=`1`:then=`security`:else=``]]"
        title="[[+updater.error]]"
        data-errno="[[+updater.errno]]"
        data-lookuptime="[[+updater.lookupTime]]"
        >


    <div class="symbol" >
        <i class="icon icon-fw icon-[[+updater.icon]] icon-3x" id="updater-core-symbol"></i>
        <span class="area">[[+updater.area]]</span>
    </div>
    <div class="meta">[[+updater.meta]]</div>
    <div class="text">
        <h3>[[+updater.title]]</h3>
        <div class="message-container">
            <div class="row">
                <div class="message">
                    [[+updater.message:is=``:then=`
                        [[+updater.update:is=``:then=`
                        `:else=`
                            <div class="candidates">[[+updater.updateCandidates]]</div>
                            <p>[[%updater.changelog_text? &namespace=`updater` &topic=`widget`]] <a href="[[+updater.notes]]" target="new">[[%updater.changelog? &namespace=`updater` &topic=`widget`]]</a>.</p>
                        `]]
                    `:else=`
                        [[+updater.message]]
                    `]]
                </div>
                <div class="updater-actions">
                    [[+updater.showButtons:is=`1`:then=`
                        <a id="updater-button-[[+updater.button_id]]"
                           href="[[+updater.button_href]]"
                           title="[[+updater.button_tooltip]]"
                           data-url="[[+updater.url]]"
                           class="button x-btn x-btn-small x-btn-icon-small-left primary-button x-btn-noicon">
                            [[+updater.buttontext]]
                        </a>
                    `:else=``]]
                </div>
            </div>
        </div>
    </div>
    <!-- inject the button scripts -->
    <!--<script type="text/javascript">
        [[+updater.buttonscript]]
    </script>
    -->
    <!--<script type="text/javascript" src="[[+updater.buttonscriptUrl]]"></script> -->
</div>