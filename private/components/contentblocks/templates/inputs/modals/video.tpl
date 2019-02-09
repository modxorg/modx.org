<p>{%=_('contentblocks.video.search_introduction')%}</p>

<form>
    <input type="text" class="query contentblocks-search-field" placeholder="{%=_('contentblocks.video.enter_keywords')%}">
    <input type="submit" value="{%=_('contentblocks.video.search')%}" class="big contentblocks-field-button">
</form>

<div class="contentblocks-modal-scrollable-area">
    <div class="contentblocks-search-results">
        <ul class="youtube-search-results">

        </ul>

        <p class="contentblocks-search-results-actions">
            <a href="javascript:void(0);" class="contentblocks-field-button big contentblocks-search-results-more">{%=_('contentblocks.video.load_more_results')%}</a>
        </p>
    </div>
</div>
