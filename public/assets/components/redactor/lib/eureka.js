if (!RedactorPlugins) var RedactorPlugins = {};

(function($) {
    RedactorPlugins.eureka = function() {
        var selectedText = null;
        return {
            init: function() {
                var that = this;
                if (!that.opts.browseFiles) return;

                that.modal.addCallback('image', this.eureka.load);
                that.modal.addCallback('file', this.eureka.loadFile);
            },
            load: function() {
                var that = this;
								//console.log(that.opts.eureka_image_browse_path,that.opts.eureka_file_browse_path);
                this.eureka.doEureka(' an Image', { // init the Eureka component
                    uid: 'redactor-media-browser_0',
                    fileUploadURL: (that.opts.eurekaUpload) ? that.opts.eurekaUploadUrl : undefined, // url to send uploads to
                    directoryRequestURL: that.opts.eurekaDirectoryUrl, // lists contents of a directory
                    directoryChildrenRequestURL: that.opts.eurekaDirectoryChildrenUrl || that.opts.eurekaDirectoryUrl, // list direct child directories of directory
                    listSourcesRequestURL: that.opts.eurekaSourcesUrl, // list of media sources
                    listSourceRequestURL: that.opts.eurekaSourceDirectoryUrl, // lists directory structure of media source
                    locale: 'en-US',
                    useWebWorkers: true,
                    webWorkersPath: that.opts.assetsUrl + 'lib/eureka/js/workers/',
                    useLocalStorage: true,
                    storagePrefix: that.opts.storagePrefix,
                    currentDirectory: that.opts.eureka_image_browse_path,
                    sortMediaSources: true,
                    confirmBeforeDelete: false,
                    allowRename: false,
                    allowDelete: false,
                    navTreeHidden: false,
                    debug: false,
                    hideImagesOnListView: (that.opts.eurekaHideImagesOnListView == undefined) ? true : that.opts.eurekaHideImagesOnListView,
                    enlargeFocusRows:(that.opts.enlargeFocusRows !== undefined) ? that.opts.enlargeFocusRows : true
                }, function(e) {
                    var img = document.createElement('img');
                    img.setAttribute('src', e.detail.src);

                    img.setAttribute('data-redactor-inserted-image', true);

                    that.image.insert({
                        filelink: e.detail.src
                    });
                    that.image.onDrop();

                    that.modal.close();
                });
            },
            loadFile: function() {
                var that = this,
                    directoryChildrenUrl = that.opts.eurekaDirectoryChildrenUrl || that.opts.eurekaDirectoryUrl;

                this.eureka.doEureka(' a File', { // init the Eureka component
                    uid: 'redactor-media-browser_0',
                    fileUploadURL: (that.opts.eurekaUpload) ? that.opts.eurekaUploadUrl : undefined, // url to send uploads to
                    directoryRequestURL: that.opts.eurekaDirectoryUrl + '&type=file', // lists contents of a directory
                    directoryChildrenRequestURL: directoryChildrenUrl + '&type=file', // list direct child directories of directory
                    listSourcesRequestURL: that.opts.eurekaSourcesUrl, // list of media sources
                    listSourceRequestURL: that.opts.eurekaSourceDirectoryUrl, // lists directory structure of media source
                    locale: 'en-US',
                    useWebWorkers: true,
                    webWorkersPath: that.opts.assetsUrl + 'lib/eureka/js/workers/',
                    useLocalStorage: true,
                    storagePrefix: 'file_' + that.opts.storagePrefix,
										currentDirectory: that.opts.eureka_file_browse_path,
                    sortMediaSources: true,
                    confirmBeforeDelete: false,
                    allowRename: false,
                    allowDelete: false,
                    showDimensionsColumn: false,
                    navTreeHidden: true,
                    debug: false,
                    hideImagesOnListView: (that.opts.eurekaHideImagesOnListView == undefined) ? true : that.opts.eurekaHideImagesOnListView,
                    enlargeFocusRows:(that.opts.enlargeFocusRows !== undefined) ? that.opts.enlargeFocusRows : true
                }, function(e) {
                    that.file.insert('<a href="' + e.detail.src + '">' + ((selectedText) ? selectedText : e.detail.filename) + '</a>');
                    selectedText = null;
                    that.modal.close();
                });
            },
            doEureka: function(chooseFile, eurekaOpts, foundIt) {
                var that = this;

                selectedText = that.selection.getText();

                var $modal = that.modal.getModal();
                $modal.prepend($('div#redactor-modal-tabber'));

                that.modal.createTabber($modal);
                that.modal.addTab('upload', 'Upload', 'active');
                that.modal.addTab('browse', 'Browse' + ((that.opts.eurekaUpload) ? ' & Upload' : ''));

                try {
                    if (Modernizr && Modernizr !== undefined && Modernizr.flexbox == false) {
                        $modal.closest('#redactor-modal').css('overflow-y', 'auto');
                    }
                } catch (e) {}


                $modal.closest('#redactor-modal').children('header').attr('rel', 'redactor-tab1').clone().empty().append(function() {
                    var h2 = $('<h2>');
                    h2.text('Choose' + ((!that.opts.eurekaUpload) ? chooseFile : ' or ')).append(function() {
                        if (!that.opts.eurekaUpload) return null;
                        var a = $('<a>');
                        a.text('Upload ' + chooseFile);
                        a.addClass('upload-media');
                        a.on('click', function(e) {
                            e.preventDefault();
                            $('#redactor-media-browser_0__upload-input').click();
                        });
                        return a;
                    });
                    return h2;
                }).append(function() {
                    var p = $('<p>');
                    p.text('You are browsing ').append(function() {
                        var code = $('<code>');
                        code.text('/');
                        code.addClass('browsing-path');
                        return code;
                    }).addClass('eureka__you-are-browsing').append(' in the ').append(function() {
                        var a = $('<a>');
                        a.text('Filesystem');
                        a.addClass('media-source');
                        a.addClass('subtle');
                        a.attr('href', MODx.config.manager_url + "?a=source/update&id=1");
                        a.attr('target', '_blank');
                        return a;
                    }).append(' Media Source.');
                    return p;
                }).attr('rel', 'redactor-tab2').hide().insertAfter($modal.closest('#redactor-modal').children('header').first());


                var $eurekaDOM = $('<div id="redactor-media-browser_0" data-style="overflow: auto; height: 300px;" class="view-a eureka">');
                $modal.append($eurekaDOM);

                var $muckboot = new MuckBoot({ // paint the DOM
                    id: 'redactor-media-browser_0',
                    showDropArea: true,
                    upload: (that.opts.eurekaUpload) ? true : false,
                    createDir: (that.opts.eurekaUpload) ? true : false,
										hideImagesOnListView: (that.opts.eurekaHideImagesOnListView == undefined) ? true : that.opts.eurekaHideImagesOnListView,
                    allowFullScreen: (that.opts.eurekaAllowFullScreen == undefined) ? true : that.opts.eurekaAllowFullScreen
                });

                //$('#redactor-media-browser_0 .view-btns').detach().appendTo('#redactor-media-browser_0 .eureka__topbar-nav > header');
                //$('#redactor-media-browser_0 .eureka__topbar-nav__select').detach().prependTo('#redactor-media-browser_0__mediacontent-current-source');

                $eurekaDOM = $('#redactor-media-browser_0').parent();

                var $eureka = new Eureka(eurekaOpts);

                if (eurekaOpts.fileUploadURL == undefined) {
                    $('#redactor-media-browser_0').find('.pathbrowser > footer').css({
                        borderTop: 'none'
                    });
                }

                $('#redactor-modal').addClass('insert-image'); //expanded

                $('#redactor-modal > footer').hide().append($('<div id="eureka-modal-footer">').hide().html('<p><i>' + ((that.opts.eurekaUpload) ? '<span class="hideable"><a class="upload-media" href="#">Upload</a> new images or <a class="search-link" href="#">Filter Results</a> any time.</span>' : '<span class="hideable">Filter Results any time.</span>') + '<span class="hideable"> Level up with <a href="https://github.com/jpdevries/eureka#keyboard-shortcuts" target="_blank">Keyboard&nbsp;Shortcuts</a>.<br></span><small><a href="https://github.com/jpdevries/Eureka" target="_blank" class="shy"><span class="hideable">Eureka is on Github<br></span><i class="fa fa-github icon icon-github"></i></a></small></p>'));
                $('#redactor-modal .upload-media').on('click', function(e) {
                    e.preventDefault();
                    $('#redactor-media-browser_0__upload-input').click(); //#janky?
                });
                $('#redactor-modal .search-link').on('click', function(e) {
                    e.preventDefault();
                    $('#redactor-media-browser_0__filter-images').focus(); //#janky?
                });

                $eurekaDOM = document.getElementById('redactor-media-browser_0');

                // listen for when a media item has been chosen. this is where the magic happens, folks
                $eurekaDOM.addEventListener(EurekaModel.EurekaFoundIt, foundIt);

                $eurekaDOM.addEventListener(EurekaModel.EurekaDirectoryChanged, function(e) {
                    $('#redactor-modal .browsing-path').text((e.detail.currentDirectory) ? e.detail.currentDirectory : '/');
                });

                $eurekaDOM.addEventListener(EurekaModel.EurekaMediaSourceChange, function(e) {
                    $('#redactor-modal .media-source').text(e.detail.currentMediaSource.getTitle()).attr('href', MODx.config.manager_url + "?a=source/update&id=" + e.detail.currentMediaSource.getID());
                    $('#redactor-modal .browsing-path').text((e.detail.currentDirectory) ? e.detail.currentDirectory : '/');
                });

                $eurekaDOM.addEventListener(EurekaModel.EurekaCanceled, function(e) {
                    that.modal.close();
                });

                $('#redactor-modal-image-droparea, #redactor-modal-file-upload-box').wrap('<div id="redactor-tabupload" class="redactor-tab redactor-tabupload" />');
                $modal.find('.eureka-wrapper').hide().addClass('redactor-tab redactor-tabbrowse').attr('id', 'redactor-tabbrowse');

                $('#redactor-modal-tabber a').click(function(e) {
                    $('#redactor-modal').removeClass('expanded eureka-modal');
                    $('#eureka-modal-footer').hide();
                });

                $('#redactor-modal-tabber a[rel="tabbrowse"]').click(function(e) {
                    $('#redactor-modal').addClass('expanded eureka-modal');
                    $('#eureka-modal-footer').show();
                });
                /*$('#redactor-modal-tabber a').click(function(e){
                    var tab = parseInt($('#redactor-modal-tabber a').index($(this))) + 1;
                    if(tab > 1) {
                        $('#redactor-modal').addClass('expanded eureka-modal');
                        $('#redactor-modal > footer').show();
                    } else {
                        $('#redactor-modal').removeClass('expanded eureka-modal');
                        $('#redactor-modal > footer').hide();
                    }
                    $modal.find('.redactor_tab').hide();
                    $(document.getElementById('redactor_tab' + tab)).show();

                    $modal.closest('#redactor-modal').children('header').hide();
                    $modal.closest('#redactor-modal').children('header[rel="' + 'redactor_tab' + tab + '"]').show();
                });*/
            }
        };
    };
})(jQuery);
