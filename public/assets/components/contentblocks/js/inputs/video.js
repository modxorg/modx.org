(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.video = function(dom, data) {
        var input = {
            apiInserted: false,
            apiLoaded: false
        };

        input.init = function() {
            if (data.value) {
                this.selectVideo(data.value);
            }
            // Backwards compat for < 0.2.1, will be removed in 1.0.
            if (data.video_id) {
                this.selectVideo(data.video_id)
            }

            dom.find('.contentblocks-field-delete-video').on('click', function(e) {
                e.preventDefault();

                dom.find('.video_id').val('');
                dom.find('.contentblocks-field-video-preview').empty();
                dom.removeClass('hasVideo');
                ContentBlocks.fireChange();
            });

            dom.find('.contentblocks-field-video-link').on('change', function () {
                var url = $(this).val();
                // http://stackoverflow.com/a/9102270/1277345
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
                if (match && match[2].length==11){
                    $(this).val('');
                    input.selectVideo(match[2]);
                    ContentBlocks.fireChange();
                }
            }).on('keyup', function() {
                var fld = $(this);
                setTimeout(function() {
                    fld.trigger('change');
                }, 100);
            });

            dom.find('.contentblocks-field-video-choose').on('click', function(e) {
                e.preventDefault();

                var html = tmpl('contentblocks-modal-video', {});
                ContentBlocks.openModal('Choose Video', html, {
                    initCallback: function(modal, options) {
                        modal.addClass('contentblocks-modal-video');

                        var maxHeight = modal.find('.contentblocks-modal-content').css('maxHeight').slice(0, -2);
                        maxHeight = maxHeight - 85;
                        modal.find('.contentblocks-modal-scrollable-area').css('maxHeight', maxHeight + 'px');

                        var form = modal.find('form'),
                            field = form.find('.query');

                        input.resultsHolder = modal.find('.youtube-search-results');
                        input.moreBtn = modal.find('.contentblocks-search-results-more');
                        input.moreBtn.hide();

                        // Listen for choosing a video (@todo make accessible, yuck!)
                        input.resultsHolder.on('click', 'a', function(e) {
                            if (e.ctrlKey || e.metaKey) {
                                return true;
                            }
                            e.preventDefault();
                            var vidId = $(this).data('video_id');
                            if (vidId != '') {
                                input.selectVideo(vidId);
                                ContentBlocks.closeModal();
                                ContentBlocks.fireChange();
                            }
                            return false;
                        });

                        form.on('submit', function(e) {
                            e.preventDefault();

                            var q = field.val();

                            input.loadResults(q, true);
                        });

                        // Load more results
                        input.moreBtn.on('click', function() {
                            var q = field.val(),
                                nextPageToken = input.moreBtn.data('token');

                            input.loadResults(q, false, nextPageToken);
                        });
                    }
                });
            });
        };

        input.loadResults = function(term, replaceAll, nextPageToken) {
            $.ajax({
                url: 'https://www.googleapis.com/youtube/v3/search',
                data: {
                    q: term,
                    part: 'id,snippet',
                    maxResults: 12,
                    type: 'video',
                    videoEmbeddable: true,
                    key: 'AIzaSyB0dw388ateBJGR-wIGxPTWtJUmDx55gKw',
                    pageToken: nextPageToken || ''
                }
            })
            .done(function(respData, textStatus, jqXHR) {
                // Generate HTML for the video items
                var html = [];
                $.each(respData.items, function(idx, video) {
                    video.snippet.publishedAt = new Date(video.snippet.publishedAt).format(MODx.config.manager_date_format);
                    html.push(tmpl('contentblocks-field-video-item', video));
                });
                html = html.join('');

                // Replace or append the results
                if (replaceAll) {
                    input.resultsHolder.html(html);
                }
                else {
                    input.resultsHolder.append(html);
                }

                // Keep track of the nextPageToken for pagination
                if (respData.nextPageToken) {
                    input.moreBtn.data('token', respData.nextPageToken).show();
                }
                else {
                    input.moreBtn.data('token', '').hide();
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                var message = _('contentblocks.video.api_error', {message: jqXHR.responseJSON.error.message, code: jqXHR.responseJSON.error.code});
                input.resultsHolder.html('<p class="error">' + message + '</p>');
                input.moreBtn.hide();
            })
        };

        input.selectVideo = function(vidId) {
            dom.addClass('hasVideo');
            dom.find('.video_id').val(vidId);

            var preview = dom.find('.contentblocks-field-video-preview');
            preview.html('<iframe class="youtube-player" src="https://www.youtube.com/embed/'+vidId+'?rel=0" frameborder="0">');
        };

        input.getData = function () {
            return {
                value: dom.find('.video_id').val()
            };
        };
        return input;
    };
})(vcJquery, ContentBlocks);
