<div
        id="[[+updater.id:default=`updater_widget`]]"
        class="row [[+updater.state]] [[+updater.isImportant]]"
        title="[[+updater.error]]"
        data-errno="[[+updater.errno]]"
        data-lookuptime="[[+updater.lookupTime]]"
        >

    <div class="symbol" >
        <i class="icon icon-fw icon-[[+updater.icon]] icon-3x"  id="updater-package-symbol" ></i>
        <span class="area">[[+updater.area]]</span>
    </div>
    <div class="meta">[[+updater.meta]]</div>
    <div class="text">
        <h3>[[+updater.title]]</h3>
        <div class="message-container">
            <div class="row">
                <div class="message">
                    [[+updater.message:is=``:then=`
                        <div class="versions">[[+updater.current]]
                        [[-+updater.update:is=``:then=`
                        `:else=`
                            &nbsp;<i class='icon icon-long-arrow-right icon-fw'></i>&nbsp;[[+updater.update]]</div>
                            <div class="candidates">[[+updater.updateCandidates]]</div>
                            <div>(<a href="[[+updater.notes]]" target="new">[[%updater.changelog? &namespace=`updater` &topic=`widget`]]</a>)</div>
                        `]]
                        </div>
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