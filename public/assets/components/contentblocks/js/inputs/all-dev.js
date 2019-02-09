(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.heading = function(dom, data) {
        var input = {};

        input.init = function () {
            // Generate the heading dropdown based on field configuration
            var avl = data.properties.available_levels || "h1=heading_1,h2=heading_2,h3=heading_3,h4=heading_4,h5=heading_5,h6=heading_6",
                select = dom.find('.contentblocks-field-heading-level select');

            avl = avl.split(',');
            $.each(avl, function(i, lvl) {
                lvl = lvl.split('=');
                var val = _('contentblocks.' + lvl[1]) || lvl[1];
                select.append('<option value="' + lvl[0] + '">' + val + '</option>');
            });


            if (data.level) {
                select.val(data.level);
            }
            else {
                var def = data.properties.default_level || 'h2';
                select.val(def);
            }

            if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                var title = dom.find('#' + data.generated_id + '_input');
                ContentBlocks.addTinyRte(title);
            }
        };

        input.getData = function () {
            return {
                value: dom.find('.contentblocks-field-heading-input input').val(),
                level: dom.find('.contentblocks-field-heading-level select').val()
            };
        };

        input.confirmBeforeDelete = function() {
            var inputData = input.getData(),
                hasLevel = inputData.level != data.properties.default_level,
                hasText = inputData.value.replace(/^\s\s*/, '').replace(/\s\s*$/, '').length > 0;

            return hasLevel || hasText;
        };

        return input;
    };

    ContentBlocks.fieldTypes.textarea = function(dom, data) {
        return {
            init: function () {
                if (data.properties && ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_textarea');
                    ContentBlocks.addTinyRte(field);
                }
                else {
                    setTimeout(function() {
                        dom.find('.contentblocks-field-textarea textarea').autoGrow()
                            .on('change', ContentBlocks.fixColumnHeights);
                    }, 100);
                }
            },
            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val()
                };
            }
        };
    };

    ContentBlocks.fieldTypes.richtext = function(dom, data) {
        return {
            init: function () {
                var textarea = dom.find('.contentblocks-field-textarea textarea');
                if (MODx.loadRTE) {
                    MODx.loadRTE(textarea.attr('id'));
                    setTimeout(function() {
                        ContentBlocks.fixColumnHeights();
                    }, 100);
                }
                else {
                    setTimeout(function() {
                        textarea.autoGrow();
                    }, 100);
                }
                textarea.on('change', ContentBlocks.fixColumnHeights);
            },
            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val()
                };
            }
        }
    };

    ContentBlocks.fieldTypes.textfield = function(dom, data) {
        return {
            init: function() {
                if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_textfield');
                    ContentBlocks.addTinyRte(field);
                }
            },

            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-text input').val()
                };
            }
        }
    };

    ContentBlocks.fieldTypes.quote = function(dom, data) {
        return {
            init: function () {
                if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                    var field = dom.find('#' + data.generated_id + '_quote');
                    ContentBlocks.addTinyRte(field);
                }
                else {
                    setTimeout(function () {
                        dom.find('.contentblocks-field-textarea textarea').autoGrow().on('change', ContentBlocks.fixColumnHeights);
                    }, 100);
                }
                if (data.cite) {
                    dom.find('.contentblocks-field-text input').val(data.cite);
                }
            },

            getData: function () {
                return {
                    value: dom.find('.contentblocks-field-textarea textarea').val(),
                    cite: dom.find('.contentblocks-field-text input').val()
                };
            }
        }
    };
})(vcJquery, ContentBlocks);

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

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.table = function(dom, data) {
        var input = {
            table: false,
            handsontable: false
        };

        input.init = function() {
            this.table = dom.find('.contentblocks-field-table-instance');

            // Prepare some options
            var opts = {
                startRows: 3,
                minSpareRows: 1,
                minSpareCols: 1,
                startCols: 4,
                stretchH: 'all',
                manualColumnMove: true,
                enterBeginsEditing: false,
                contextMenu: true,
                autoWrapCol: true,
                nativeScrollbars: false,

                afterChange: function() {
                    ContentBlocks.fireChange();
                },

                afterCreateRow: ContentBlocks.fixColumnHeights,
                afterRemoveRow: ContentBlocks.fixColumnHeights
            };

            // Got values?
            if (data.value) opts.data = data.value;

            // instantiate handsontable
            this.table.handsontable(opts);

            // store a reference to the HandsonTable
            this.handsontable = this.table.handsontable('getInstance');
            // listen to dragsort to re-render (fixes widths etc)
            dom.on('contentblocks:field_dragged', function() {
                input.handsontable.render();
            });
        };

        input.getData = function() {
            var tableData = this.handsontable.getData();
            return {
                value: tableData
            }
        };

        return input;
    };
})(vcJquery, ContentBlocks);

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

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.image = function(dom, data) {
        var input = {
            fileBrowser: false,
            source: data.properties.source > 0 ? data.properties.source : ContentBlocksConfig['image.source'],
            directory: data.properties.directory
        };

        input.init = function() {
            if (data.url && data.url.length) {
                var urls = ContentBlocks.utilities.normaliseUrls(data.url);
                dom.find('.url').val(urls.cleanedSrc).change();
                dom.find('.size').val(data.size);
                dom.find('.width').val(data.width);
                dom.find('.height').val(data.height);
                dom.find('.extension').val(data.extension);
                dom.find('img').attr('src', (data.properties.thumbnail_size)
                    ? ContentBlocks.utilities.getThumbnailUrl(data.url, data.properties.thumbnail_size)
                    : urls.displaySrc);
                dom.addClass('preview');
            }

            dom.find('.contentblocks-field-delete-image').on('click', function() {
                dom.removeClass('preview');
                dom.find('.url').val('').change();
                dom.find('.size').val('');
                dom.find('.width').val('');
                dom.find('.height').val('');
                dom.find('.extension').val('');
                dom.find('img').attr('src', '');

                ContentBlocks.fixColumnHeights();
                ContentBlocks.fireChange();
            });
            dom.find('.contentblocks-field-upload').on('click', function() {
                dom.find('.contentblocks-field-upload-field').click();
            });

            dom.find('.contentblocks-field-image-choose').on('click', $.proxy(function() {
                this.chooseImage();
            }, this));
            dom.find('.contentblocks-field-image-url').on('click', $.proxy(function() {
                this.promptImage();
            }, this));

            this.initUpload();
            this.initDropReceiver();
        };

        input.initDropReceiver = function() {
            MODx.load({
                xtype: 'modx-treedrop'
                ,target: dom
                ,targetEl: dom.get(0)
                ,onInsert: function(val) {
                    input.insertFromUrl(val);
                }
            });
        };

        input.initUpload = function() {

            var id = dom.attr('id');
            dom.find('#' + id + '-upload').fileupload({
                url: ContentBlocksConfig.connectorUrl + '?action=content/image/upload',
                dataType: 'json',
                dropZone: dom,
                progressInterval: 250,
                paramName: 'file',
                pasteZone: null,

                /**
                 * Add an item to the upload queue.
                 *
                 * The item gets an image preview using the FileReader APIs if available
                 *
                 * @param e
                 * @param data
                 */
                add: function(e, data) {
                    ContentBlocks.fireChange();
                    dom.addClass('uploading');
                    data.files[0].ext = data.files[0].name.split('.').pop();
                    if (data.files[0].size < 700000 && window.FileReader) {
                        // Only if the image is smaller than ~ 700kb we want to show a preview.
                        // This is to prevent filling up the users' RAM, while providing the user
                        // with a fancy preview of what they're uploading.
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            dom.find('img').attr('src', e.target.result);
                            ContentBlocks.fixColumnHeights();
                        };
                        reader.readAsDataURL(data.files[0]);
                    }

                    setTimeout(function() {
                        data.submit();
                    }, 1000);
                },

                /**
                 * When the image has been uploaded add it to the collection.
                 *
                 */
                done: function(e, responseData) {
                    if (responseData.result.success) {
                        var record = responseData.result.object,
                            urls = ContentBlocks.utilities.normaliseUrls(record.url);
                        dom.find('.url').val(urls.cleanedSrc).change();
                        dom.find('.size').val(record.size);
                        dom.find('.width').val(record.width);
                        dom.find('.height').val(record.height);
                        dom.find('.extension').val(record.extension);
                        dom.find('img').attr('src', (data.properties.thumbnail_size)
                            ? ContentBlocks.utilities.getThumbnailUrl(record.url, data.properties.thumbnail_size)
                            : urls.displaySrc);
                        dom.addClass('preview');
                        input.loadTinyRTE();
                    }
                    else {
                        var message = _('contentblocks.upload_error', {file: responseData.files[0].filename, message: responseData.result.message});
                        if (responseData.files[0].size > 1048576*1.5) {
                            message += _('contentblocks.upload_error.file_too_big');
                        }
                        ContentBlocks.alert(message);
                        dom.find('img').attr('src','');
                    }
                    dom.removeClass('uploading');

                    setTimeout(function() {
                        ContentBlocks.fixColumnHeights(dom.parents('.contentblocks-region-content'));
                    }, 150);
                },

                fail: function(e, data) {
                    var message = _('contentblocks.upload_error', {file: data.files[0].filename, message:  data.result.message});
                    if (data.files[0].size > 1048576*1.5) {
                        message += _('contentblocks.upload_error.file_too_big');
                    }
                    ContentBlocks.alert(message);

                    dom.removeClass('uploading');
                    dom.find('img').attr('src','');

                    ContentBlocks.fixColumnHeights(dom.parents('.contentblocks-region-content'));
                },

                /**
                 * Fetch the items we want to send along in the POST. In this case,
                 * this is overridden because normally it sends the entire form = the resource.
                 * All we really want is the resource ID, which we fetch from the URL.
                 * @returns {Array}
                 */
                formData: function() {
                    var fd = [{
                        name: 'HTTP_MODAUTH',
                        value: MODx.siteId
                    },{
                        name: 'resource',
                        value: MODx.request.id || 0
                    },{
                        name: 'field',
                        value: data.id
                    }];

                    if (data.settingKey) {
                        fd.push({
                            name: 'setting_key',
                            value: data.settingKey
                        })
                    }

                    if (data.layout) {
                        fd.push({
                            name: 'layout',
                            value: data.layout
                        })
                    }
                    return fd;
                },

                /**
                 * Update progress for queue items
                 */
                progress: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10) + '%';
                    dom.find('.upload-progress .bar').width(progress);
                }
            });
        };

        input.chooseImage = function() {
            var fileBrowser = MODx.load({
                xtype: 'modx-browser',
                id: Ext.id(),
                multiple: true,
                listeners: {
                    select: function(imageData) {
                        input.chooseImageCallback(imageData);
                    }
                },
                allowedFileTypes: data.properties.file_types,
                hideFiles: true,
                title: _('contentblocks.choose_image'),
                source: input.source,
                openTo: data.properties.directory
            });
            fileBrowser.setSource(input.source);
            fileBrowser.show();
            // After showing, set the zindex to make sure it shows in front of CB modals (zindex 1020x)
            fileBrowser.win.setZIndex(10210);
        };

        input.chooseImageCallback = function(imageData) {
            var url = imageData.fullRelativeUrl;
            if (url.substr(0, 4) != 'http' && url.substr(0,1) != '/' ) {
                url = MODx.config.base_url + url;
            }
            var urls = ContentBlocks.utilities.normaliseUrls(url);
            dom.find('.url').val(urls.cleanedSrc).change();
            dom.find('.size').val(imageData.size);
            dom.find('.width').val(imageData.image_width);
            dom.find('.height').val(imageData.image_height);
            dom.find('.extension').val(imageData.ext);
            dom.find('img').attr('src', (data.properties.thumbnail_size)
                ? ContentBlocks.utilities.getThumbnailUrl(url, data.properties.thumbnail_size)
                : urls.displaySrc);
            dom.addClass('preview');
            ContentBlocks.fireChange();
            this.loadTinyRTE();
        };

        // Prompts the user to enter an image url directly.
        input.promptImage = function() {
            Ext.Msg.prompt(_('contentblocks.from_url_title'),
                _('contentblocks.from_url_prompt'),
                function(btn, url, prompt) {
                    // The user cancelled
                    if (btn !== 'ok') {
                        return;
                    }

                    input.insertFromUrl(url);
                }, this);
        };

        input.insertFromUrl = function(url) {
            if (!url || url.length < 3) {
                ContentBlocks.alert('No URL provided.');
                return;
            }

            dom.addClass('contentblocks-field-loading');
            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connector_url,
                type: "POST",
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                data: {
                    action: 'content/image/download',
                    field: data.field,
                    layout: data.layout,
                    setting_key: data.settingKey,
                    resource: ContentBlocksResource && ContentBlocksResource.id ? ContentBlocksResource.id : 0,
                    url: url
                },
                context: this,
                success: function(result) {
                    dom.removeClass('contentblocks-field-loading');
                    if (!result.success) {
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        var urls = ContentBlocks.utilities.normaliseUrls(result.object.url);

                        dom.find('.url').val(urls.cleanedSrc).change();
                        dom.find('.size').val(result.object.size);
                        dom.find('.width').val(result.object.width);
                        dom.find('.height').val(result.object.height);
                        dom.find('.extension').val(result.object.extension);
                        dom.find('img').attr('src', (data.properties.thumbnail_size)
                            ? ContentBlocks.utilities.getThumbnailUrl(urls.cleanedSrc, data.properties.thumbnail_size)
                            : urls.displaySrc);
                        dom.addClass('preview');
                        ContentBlocks.fireChange();
                        this.loadTinyRTE();
                    }
                }
            });
        };

        input.getData = function () {
            return {
                url: dom.find('.url').val(),
                size: dom.find('.size').val(),
                width: dom.find('.width').val(),
                height: dom.find('.height').val(),
                extension: dom.find('.extension').val()
            };
        };

        input.loadTinyRTE = function() { };

        return input;
    };

    ContentBlocks.fieldTypes.image_with_title = function(dom, data) {
        var input = ContentBlocks.fieldTypes.image(dom, data);

        input.init = function () {
            if (data.url && data.url.length) {
                var urls = ContentBlocks.utilities.normaliseUrls(data.url);
                dom.find('.url').val(urls.cleanedSrc).change();
                dom.find('.size').val(data.size);
                dom.find('.width').val(data.width);
                dom.find('.height').val(data.height);
                dom.find('.extension').val(data.extension);
                dom.find('img').attr('src', (data.properties.thumbnail_size)
                    ? ContentBlocks.utilities.getThumbnailUrl(data.url, data.properties.thumbnail_size)
                    : urls.displaySrc);
                dom.find('.title').val(data.title || '');
                dom.addClass('preview');
                this.loadTinyRTE();
            }

            dom.find('.contentblocks-field-delete-image').on('click', function() {
                dom.removeClass('preview');
                dom.find('.url').val('').change();
                dom.find('.size').val('');
                dom.find('.width').val('');
                dom.find('.height').val('');
                dom.find('.extension').val('');
                dom.find('.title').val('').removeClass('tinyrte-replaced');
                dom.find('img').attr('src', '');
                dom.find('.tinyrte-container').remove();

                ContentBlocks.fixColumnHeights();
                ContentBlocks.fireChange();
            });
            dom.find('.contentblocks-field-upload').on('click', function() {
                dom.find('.contentblocks-field-upload-field').click();
            });

            dom.find('.contentblocks-field-image-choose').on('click', $.proxy(function() {
                this.chooseImage();
            }, this));
            dom.find('.contentblocks-field-image-url').on('click', $.proxy(function() {
                this.promptImage();
            }, this));

            this.initUpload();
            this.initDropReceiver();
        };

        input.loadTinyRTE = function() {
            if (ContentBlocks.toBoolean(data.properties.use_tinyrte)) {
                var title = dom.find('.title');
                ContentBlocks.addTinyRte(title);
            }
        };

        input.getData = function () {
            return {
                url: dom.find('.url').val(),
                title: dom.find('.title').val(),
                size: dom.find('.size').val(),
                width: dom.find('.width').val(),
                height: dom.find('.height').val(),
                extension: dom.find('.extension').val()
            };
        };
        return input;
    };

})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.file = function(dom, data) {
        var input = {
            fileCount: 0,
            fileBrowser: false,
            source: data.properties.source > 0 ? data.properties.source : ContentBlocksConfig['image.source'],
            directory: data.properties.directory
        };

        input.init = function () {
            this.initUpload();
            dom.find('.contentblocks-field-upload').on('click', function() {
                dom.find('.contentblocks-field-upload-field').click();
            });
            dom.find('.contentblocks-field-file-choose').on('click', $.proxy(function() {
                this.chooseFile();
            }, this));

            if ($.isArray(data.files)) {
                $.each(data.files, function(idx, file) {
                    input.fileCount++;
                    file.id = data.generated_id + '-file' + input.fileCount;
                    input.addFile(file);
                });
            }
            dom.find('.file-holder').sortable({
                connectWith: '.file-holder',
                forceHelperSize: true,
                forcePlaceholderSize: true,
                placeholder: 'contentblocks-file-placeholder',
                tolerance: 'pointer',
                cursor: 'move',
                update: function() {
                    ContentBlocks.fixColumnHeights();
                    MODx.fireResourceFormChange();
                },

                start: function(event, ui) {
                    ui.placeholder.height(ui.item.height());
                }
            });
        };

        input.chooseFile = function() {
            var maxFiles = data.properties.max_files,
                numFiles = dom.find('.file-holder').find('li').length;

            if (maxFiles > 0 && numFiles >= maxFiles) {
                alert(_('contentblocks.file.max_files.reached', {max: maxFiles}));
                return false;
            }

            var fileBrowser = MODx.load({
                xtype: 'modx-browser',
                id: Ext.id(),
                multiple: true,
                listeners: {
                    select: function(fileData) {
                        input.chooseFileCallback(fileData);
                    }
                },
                allowedFileTypes: data.properties.file_types,
                hideFiles: true,
                title: _('contentblocks.file.choose_file'),
                source: input.source,
                openTo: data.properties.directory
            });
            fileBrowser.setSource(input.source);

            fileBrowser.show();
        };

        input.chooseFileCallback = function(fileData) {
            var url = fileData.fullRelativeUrl;
            if (url.substr(0, 4) != 'http' && url.substr(0,1) != '/' ) {
                url = MODx.config.base_url + url;
            }
            input.fileCount++;
            var fileId = dom.attr('id') + '-file' + input.fileCount;
            var size = fileData.size;
            var upload_date = Math.round(Date.parse(fileData.lastmod)/1000);
            var extension = fileData.ext;
            this.addFile({
                url: url,
                title: fileData.filename,
                id: fileId,
                size: size,
                upload_date: upload_date,
                extension: extension
            });
        };

        input.addFile = function(values) {
            var filename = values.url || values.title,
                holder = dom.find('.file-holder');

            values.filename = filename.split('/').pop();
            values.icon = input.getIconClass(values.extension);

            holder.append(tmpl('contentblocks-field-fileinput_file', values));
            var inserted = $('#' + values.id);

            inserted.find('.contentblocks-fileinput_file-delete').on('click', function() {
                inserted.fadeOut(function() {
                    inserted.remove();
                    ContentBlocks.fixColumnHeights();
                    MODx.fireResourceFormChange();
                });
            });
        };

        input.getIconClass = function(ext) {
            switch (ext) {
                case 'doc':
                case 'docx':
                case 'pages':
                case 'odt':
                case 'rtf':
                case 'tex':
                case 'wpd':
                case 'wps':
                    return 'word';

                case 'txt':
                case 'msg':
                case 'log':
                case 'dat':
                case 'sdf':
                    return 'text';

                case 'pps':
                case 'ppt':
                case 'pptx':
                case 'key':
                    return 'powerpoint';

                case 'csv':
                case 'xlr':
                case 'xls':
                case 'xlsx':
                    return 'excel';

                case 'pdf':
                case 'indd':
                    return 'pdf';

                case 'aif':
                case 'iff':
                case 'm3u':
                case 'm4a':
                case 'mid':
                case 'mp3':
                case 'mpa':
                case 'ra':
                case 'wav':
                case 'wma':
                    return 'audio';

                case '3g2':
                case '3gp':
                case 'asf':
                case 'asx':
                case 'avi':
                case 'flv':
                case 'm4v':
                case 'mov':
                case 'mp4':
                case 'mpg':
                case 'rm':
                case 'swf':
                case 'vob':
                case 'wmv':
                    return 'video';

                case 'bmp':
                case 'dds':
                case 'gif':
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'psd':
                case 'pspimage':
                case 'tga':
                case 'thm':
                case 'tif':
                case 'tiff':
                case 'yuv':
                case 'ai':
                case 'eps':
                case 'ps':
                case 'svg':
                    return 'image';

                case '7z':
                case 'cbr':
                case 'deb':
                case 'gz':
                case 'pkg':
                case 'rar':
                case 'rpm':
                case 'sitx':
                case 'tar':
                case 'zip':
                case 'zipx':
                    return 'zip';

                default:
                    return ext;
            }
        };

        input.initUpload = function() {
            var id = dom.attr('id'),
                maxFiles = data.properties.max_files;
            dom.find('#' + id + '-upload').fileupload({
                url: ContentBlocksConfig.connectorUrl + '?action=content/file/upload',
                dataType: 'json',
                dropZone: $('#' + id),
                progressInterval: 250,
                paramName: 'file',
                multiple: true,
                pasteZone: null,

                /**
                 * Add an item to the upload queue.
                 *
                 * @param e
                 * @param data
                 */
                add: function(e, data) {
                    // Check if we're not at the limit already
                    var numFiles = dom.find('.file-holder').find('li').length;
                    if (maxFiles > 0 && numFiles >= maxFiles) {
                        alert(_('contentblocks.file.max_files.reached', {max: maxFiles}));
                        return false;
                    }

                    input.fileCount++;
                    var fileId = id + '-file' + input.fileCount;
                    data.files[0].ext = data.files[0].name.split('.').pop();
                    // Add file to the page
                    input.addFile({
                        title: data.files[0].name,
                        url: '',
                        id: fileId,
                        size: data.files[0].size,
                        upload_date: data.files[0].upload_date,
                        extension: data.files[0].ext
                    });
                    data.domId = '#' + fileId;

                    var file = $(data.domId);
                    file.addClass('uploading');

                    setTimeout(function() {
                        data.submit();
                    }, 1000);

                    MODx.fireResourceFormChange();
                },

                /**
                 * When the file has been uploaded add it to the collection.
                 *
                 */
                done: function(e, data) {
                    var dom = $(data.domId);
                    if (data.result.success) {
                        var record = data.result.object;
                        dom.find('.url').val(record.url);
                        dom.find('.size').val(record.size);
                        dom.find('.upload_date').val(record.upload_date);
                        dom.find('.extension').val(record.extension);
                        dom.removeClass('uploading');
                    }
                    else {
                        var message = _('contentblocks.upload_error', {file: data.files[0].filename, message:  data.result.message});
                        if (data.files[0].size > MODx.config.upload_maxsize) {
                            message += _('contentblocks.upload_error.file_too_big');
                        }
                        alert(message);
                        dom.remove();
                    }

                    setTimeout(function() {
                        ContentBlocks.fixColumnHeights();
                    }, 150);
                },

                fail: function(e, data) {
                    var message = _('contentblocks.upload_error', {file: data.files[0].filename, message:  data.result.message});
                    if (data.files[0].size > MODx.config.upload_maxsize) {
                        message += _('contentblocks.upload_error.file_too_big');
                    }
                    alert(message);

                    $(data.domId).remove();
                    ContentBlocks.fixColumnHeights();
                },

                /**
                 * Fetch the items we want to send along in the POST. In this case,
                 * this is overridden because normally it sends the entire form = the resource.
                 * All we really want is the resource ID, which we fetch from the URL.
                 * @returns {Array}
                 */
                formData: function() {
                    return [{
                        name: 'HTTP_MODAUTH',
                        value: MODx.siteId
                    },{
                        name: 'resource',
                        value: MODx.request.id || 0
                    },{
                        name: 'field',
                        value: data.id
                    }];
                },

                /**
                 * Update progress for queue items
                 */
                progress: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10) + '%';
                    $(data.domId).find('.upload-progress .bar').width(progress);
                }
            }).on('fileuploaddragover', function() {
                $(this).css('background', 'red');
            });
        };

        input.getData = function () {
            var files = [];
            dom.find('.file-holder li').each(function(idx, file) {
                var $file = $(file),
                    data = {
                    url: $file.find('.url').val(),
                    title: $file.find('.title').val(),
                    size: $file.find('.size').val(),
                    upload_date: $file.find('.upload_date').val(),
                    extension: $file.find('.extension').val()
                };
                files.push(data);
            });

            return {
                files: files
            };
        };

        return input;
    };
})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.chunk = function(dom, data) {
        var input = {
            preview: dom.find('.chunkOutput'),
            propList: dom.find('.contentblocks-properties-list'),
            dynamicPreview: true,
            fieldWrapper: dom.closest('.contentblocks-field-outer')
        };

        input.init = function() {
            if (!data.properties || !data.properties.chunk || data.properties.chunk < 1) {
                input.preview.html('<p>' + _('contentblocks.chunk.no_chunk_set') + '</p>');
                return;
            }

            if (data.properties.custom_preview && data.properties.custom_preview.length > 1) {
                input.dynamicPreview = false;
                input.preview.html(data.properties.custom_preview);
            }
            else {
                dom.addClass('contentblocks-field-loading');
                var resourcePanel = (window.Ext && Ext.getCmp) ? Ext.getCmp('modx-panel-resource') : null;
                if (resourcePanel) {
                    resourcePanel.on('success', function(o) {
                        input.loadPreview(false, input.getPreviewData());
                    });
                }
            }

            // Watch for changes in input types on the entire field
            input.fieldWrapper.on('input change', 'input, textarea, select', ContentBlocks.utilities.debounce(function() {
                ContentBlocks.fireChange();
                if (input.dynamicPreview) {
                    input.loadPreview(false, input.getPreviewData());
                }
            }, 300));

            // Load the preview now
            input.loadPreview(true, input.getPreviewData(true));
        };

        input.getPreviewData = function(loadProperties) {
            loadProperties = loadProperties || false;
            var previewData = $.extend({
                settings: Ext.decode(input.fieldWrapper.data('settings')) || {}
            }, input.getData());
            if (loadProperties) {
                previewData.chunk_properties = data.chunk_properties;
            }
            return previewData;
        };
        
        input.loadPreview = function(loadProperties, dataValues) {
            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connector_url,
                type: "POST",
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                data: {
                    action: 'content/chunk/get',
                    id: data.properties.chunk,
                    field: data.field,
                    resource: ContentBlocksResource && ContentBlocksResource.id ? ContentBlocksResource.id : 0,
                    data: dataValues
                },
                context: this,
                success: function(result) {
                    if (!result.success) {
                        input.preview.html(result.message);
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        if (input.dynamicPreview) {
                            var content = result.object.preview;
                            content = content.replace(/(<\s*\/?\s*)script(\s*([^>]*)?\s*>)/gi ,'$1jscript$2');
                            dom.find('.chunkOutput').html(content);
                        }

                        if (loadProperties && result.object.properties) {
                            this.loadProperties(result.object.properties);
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });
        };

        input.getData = function() {
            var properties = {};

            input.propList.find('li').each(function(idx, li) {
                var $li = $(li),
                    ip = $li.find('input,select'),
                    key = ip.data('name');
                properties[key] = ip.val();
            });
            return {
                chunk_properties: properties
            };
        };

        input.loadProperties = function(props) {
            input.propList.empty().hide();
            if (props) {
                $.each(props, function(key, property) {
                    var val = (data.chunk_properties && data.chunk_properties[key]) ? data.chunk_properties[key] : property.value;

                    property.id = 'contentblocks-chunk-property-' + key + '-' + data.generated_id;
                    property.key = key;
                    property.value = val;
                    property.name = _(property.name) ? _(property.name) : property.name;

                    switch (property.type) {
                        default:
                            input.propList.append(tmpl('contentblocks-field-chunk-property', property));
                            break;
                    }
                });
                input.propList.show();
                ContentBlocks.fixColumnHeights();
            }
        };

        return input;
    }
})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.dropdown = function(dom, data) {
        var input = {
            fieldId: data.field,
            select: null,
            options: {}
        };

        input.init = function() {
            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-dropdown-select select');

            if (data.value) {
                var opt = $('<option></option>');
                opt.attr('value', data.value);
                opt.text(data.display ? data.display : data.value);
                this.select.append(opt);
                this.select.attr('disabled', 'disabled');
            }

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/dropdown/getlist',
                    field: input.fieldId,
                    resource: MODx.request.id || 0
                },
                context: this,
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                success: function(result) {
                    if (result.results) {
                        input.setOptions(result.results);
                        this.optionsLoaded();
                    }
                    else {
                        ContentBlocks.alert(_('contentblocks.dropdown.none_available'))
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.setOptions = function(options) {
            input.options = options;
            input.optionsLoaded();
        };

        input.optionsLoaded = function() {
            input.select.empty();
            $.each(input.options, function(idx, option) {
                var opt = $('<option></option>');
                opt.attr('value', option.value);
                opt.text(option.display);
                if (option.disabled) {
                    opt.attr('disabled', 'disabled');
                }

                input.select.append(opt);
            });

            if (!data.value) {
                data.value = data.properties.default_value;
            }

            if (data.value) {
                input.select.val(data.value);
            }

            input.select.attr('disabled', null);
        };

        input.getData = function () {
            return {
                value: input.select.val() || '',
                display: input.select.find(':selected').text()
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.snippet = function(dom, data) {
        var input = {
            fieldId: data.field,
            propertyId: 0,
            snippet: '',
            snippets: {},
            properties: {},
            hiddenProperties: {},
            select: null,
            propertiesList: null,
            propertiesSelectWrapper: null,
            propertiesSelect: null
        };

        input.init = function() {
            if (!ContentBlocks.toBoolean(data.properties.allow_uncached)) {
                dom.find('.contentblocks-field-snippet-uncached').hide();
            }
            else {
                dom.find('.uncached').val(data.uncached || '');
            }

            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-snippet-select select');
            this.propertiesList = dom.find('.contentblocks-properties-list');
            this.propertiesSelectWrapper = dom.find('.contentblocks-field-snippet-add-property');
            this.propertiesSelect = this.propertiesSelectWrapper.find('select');

            this.select.on('change', $.proxy(function() {
                this.chooseSnippet(this.select.val());
            }, this));

            this.propertiesSelect.on('change', $.proxy(function() {
                this.chooseProperty(this.propertiesSelect.val());
            }, this));

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/snippet/getlist',
                    field: input.fieldId
                },
                context: this,
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                success: function(result) {
                    if (!result.results) {
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        if (result.results && result.results.length) {
                            $.each(result.results, function(idx, val) {
                                input.snippets[val.name] = val;
                            });
                            this.snippetsLoaded();
                        }
                        else {
                            ContentBlocks.alert(_('contentblocks.snippet.none_available'))
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.snippetsLoaded = function() {
            input.select.empty();
            input.select.append('<option></option>');
            $.each(input.snippets, function(name, snip) {
                input.select.append('<option value="' + name + '">' + snip.name + '</option>');
            });

            if (!data.snippet || !data.snippet.length && input.snippets.length == 1) {
                for (var snippetName in input.snippets) break;
                data.snippet = snippetName;
            }

            if (data.snippet) {
                input.select.val(data.snippet);
                input.chooseSnippet(data.snippet);

                if (data.snippet_properties) {
                    $.each(data.snippet_properties, function(key, val) {
                        input.chooseProperty(key, val);
                    });
                }
            }

            if (input.select.find('option').length < 2) {
                input.select.hide();
            }
            else {
                input.select.show();
            }
        };

        input.chooseSnippet = function(name) {
            var s = this.snippets[name];
            if (!s) {
                if (console) console.error('Snippet ' + name + ' not found in available snippets: ', this.snippets);
                return false;
            }

            // Store for easy reference
            input.snippet = name;
            input.properties = s.properties;

            // Empty other stuff
            input.propertiesSelect.empty();
            input.propertiesList.empty();

            // Populate the select
            input.propertiesSelect.append('<option></option>');
            if (s.properties) {
                $.each(s.properties, function(key, property) {
                    input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                });
            }
            input.propertiesSelect.append('<option value="__other__">' + _('contentblocks.snippet.other_property') + '</option>');

            // Show the select
            input.propertiesSelectWrapper.show();
        };

        input.chooseProperty = function(key, val) {
            val = val || '';
            input.propertyId++;
            var property = false;

            if (key == '__other__') {
                property = {
                    name: _('contentblocks.snippet.other_property'),
                    desc_trans: _('contentblocks.snippet.other_property.desc')
                };
            }
            else {
                property = (input.properties && input.properties[key]) ? input.properties[key] : false;
            }

            // Make sure we have a valid property
            if (!property) {
                if (console) console.error('Property ' + key + ' not found for snippet ' + input.snippet);
                return;
            }

            property.id = 'contentblocks-snippet-property-' + input.propertyId;
            property.key = key;
            property.value = val;

            // Hide the property from the select
            var option = input.propertiesSelect.find('option[value=' + key + ']');
            option.remove();
            input.hiddenProperties[key] = property;

            // Add the property to the list
            input.propertiesList.append(tmpl('contentblocks-field-snippet-property', property));

            var item = input.propertiesList.find('#' + property.id);
            item.find('.contentblocks-field-snippet-delete-property').on('click', function() {
                input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                input.hiddenProperties[key] = false;
                item.remove();

                if (input.propertiesList.find('li').length < 1) input.propertiesList.hide();
            });
            item.find('input').on('keyup', function() {
                ContentBlocks.fireChange();
            });

            // Show the properties list
            input.propertiesList.show();
        };

        input.getData = function () {
            var properties = {};

            input.propertiesList.find('li').each(function(idx, li) {
                var $li = $(li),
                    ip = $li.find('input'),
                    key = ip.data('name');
                properties[key] = ip.val();
            });

            var uncached = (ContentBlocks.toBoolean(data.properties.allow_uncached)) ? dom.find('.uncached').val() : '0';
            return {
                snippet: input.snippet,
                snippet_properties: properties,
                uncached: uncached
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.chunk_selector = function(dom, data) {
        var input = {
            fieldId: data.field,
            propertyId: 0,
            chunk_selector: '',
            chunk_selectors: {},
            properties: {},
            hiddenProperties: {},
            select: null,
            propertiesList: null,
            propertiesSelectWrapper: null,
            propertiesSelect: null
        };

        input.init = function() {
            dom.addClass('contentblocks-field-loading');
            this.select = dom.find('.contentblocks-field-chunk_selector-select select');
            this.propertiesList = dom.find('.contentblocks-properties-list');
            this.propertiesSelectWrapper = dom.find('.contentblocks-field-chunk_selector-add-property');
            this.propertiesSelect = this.propertiesSelectWrapper.find('select');

            this.select.on('change', $.proxy(function() {
                this.chooseChunk(this.select.val());
            }, this));

            this.propertiesSelect.on('change', $.proxy(function() {
                this.chooseProperty(this.propertiesSelect.val());
            }, this));

            $.ajax({
                dataType: 'json',
                url: ContentBlocksConfig.connectorUrl,
                data: {
                    action: 'content/chunk_selector/getlist',
                    field: input.fieldId
                },
                context: this,
                beforeSend:function(xhr, settings){
                    if(!settings.crossDomain) {
                        xhr.setRequestHeader('modAuth',MODx.siteId);
                    }
                },
                success: function(result) {
                    if (!result.results) {
                        ContentBlocks.alert(result.message);
                    }
                    else {
                        if (result.results && result.results.length) {
                            $.each(result.results, function(idx, val) {
                                input.chunk_selectors[val.name] = val;
                            });
                            this.chunk_selectorsLoaded();
                        }
                        else {
                            ContentBlocks.alert(_('contentblocks.snippet.none_available'));
                        }
                    }
                    dom.removeClass('contentblocks-field-loading');
                }
            });

        };

        input.chunk_selectorsLoaded = function() {
            input.select.empty();
            input.select.append('<option></option>');
            $.each(input.chunk_selectors, function(name, chunk) {
              chunk.name = (chunk.description != '') ? chunk.name + ' (' + chunk.description + ')' : chunk.name;
                input.select.append('<option value="' + name + '">' + chunk.name + '</option>');
            });

            if (!data.chunk_selector || !data.chunk_selector.length && input.chunk_selectors.length == 1) {
                for (var snippetName in input.chunk_selectors) break;
                data.chunk_selector = snippetName;
            }

            if (data.chunk_selector) {
                input.select.val(data.chunk_selector);
                input.chooseChunk(data.chunk_selector);

                if (data.chunk_selector_properties) {
                    $.each(data.chunk_selector_properties, function(key, val) {
                        input.chooseProperty(key, val);
                    });
                }
            }

            if (input.select.find('option').length < 2) {
                input.select.hide();
            }
            else {
                input.select.show();
            }
        };

        input.chooseChunk = function(name) {
            var s = this.chunk_selectors[name];
            if (!s) {
                if (console) console.error('Chunk ' + name + ' not found in available chunks: ', this.chunk_selectors);
                return false;
            }

            // Store for easy reference
            input.chunk_selector = name;
            input.properties = s.properties;

            // Empty other stuff
            input.propertiesSelect.empty();
            input.propertiesList.empty();

            // Populate the select
            input.propertiesSelect.append('<option></option>');
            if (s.properties) {
                $.each(s.properties, function(key, property) {
                    input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                });
            }
            input.propertiesSelect.append('<option value="__other__">' + _('contentblocks.snippet.other_property') + '</option>');

            // Show the select
            input.propertiesSelectWrapper.show();
        };

        input.chooseProperty = function(key, val) {
            val = val || '';
            input.propertyId++;
            var property = false;

            if (key == '__other__') {
                property = {
                    name: _('contentblocks.snippet.other_property'),
                    desc_trans: _('contentblocks.snippet.other_property.desc')
                };
            }
            else {
                property = (input.properties && input.properties[key]) ? input.properties[key] : false;
            }

            // Make sure we have a valid property
            if (!property) {
                if (console) console.error('Property ' + key + ' not found for chunk_selector ' + input.chunk_selector);
                return;
            }

            property.id = 'contentblocks-chunk_selector-property-' + input.propertyId;
            property.key = key;
            property.value = val;
            property.name = _(property.name) ? _(property.name) : property.name;

            // Hide the property from the select
            var option = input.propertiesSelect.find('option[value=' + key + ']');
            option.remove();
            input.hiddenProperties[key] = property;

            // Add the property to the list
            input.propertiesList.append(tmpl('contentblocks-field-chunk_selector-property', property));

            var item = input.propertiesList.find('#' + property.id);
            item.find('.contentblocks-field-chunk-delete-property').on('click', function() {
                input.propertiesSelect.append('<option value="' + key + '">' + property.name + '</option>');
                input.hiddenProperties[key] = false;
                item.remove();

                if (input.propertiesList.find('li').length < 1) input.propertiesList.hide();
            });
            item.find('input').on('keyup', function() {
                ContentBlocks.fireChange();
            });

            // Show the properties list
            input.propertiesList.show();
        };

        input.getData = function () {
            var properties = {};

            input.propertiesList.find('li').each(function(idx, li) {
                var $li = $(li),
                    ip = $li.find('input'),
                    key = ip.data('name');
                properties[key] = ip.val();
            });

            return {
                chunk_selector: input.chunk_selector,
                chunk_selector_properties: properties
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);

(function ($, ContentBlocks) {
    ContentBlocks.fieldTypes.layout = function(dom, data) {
        var input = {};
        input.init = function() {
            var children = data.child_layouts || {},
                isRepeatLayout = false;
            if (data.properties.available_layouts) {
                dom.data('layouts', data.properties.available_layouts);
            }
            if (data.properties.available_templates) {
                dom.data('templates', data.properties.available_templates);
            }

            if(typeof window.event !== 'undefined') {
                var target = $(window.event.target);
                isRepeatLayout = target.hasClass('contentblocks-repeat-layout');
            }

            // Automatically open the add layout modal when adding a layout field
            if (!isRepeatLayout && $.isEmptyObject(children) && ContentBlocks.initialized) {
                setTimeout(function() {
                    dom.find('.contentblocks-add-layout').click();
                }, 500);
            }
            ContentBlocks.buildContents(children, dom.find('.contentblocks-layout-wrapper').first());
        };
        input.destroy = function() {
            dom.find('.contentblocks-layout').each(function(index, region) {
                var $region = $(region);
                
                // have to filter to account for nested layouts. can't use children() because .contentblocks-content is buried.
                var children = $region.find('.contentblocks-content').not($region.find('.contentblocks-layout .contentblocks-content'));
                $.each(children, function (partIndex, part) {
                
                    // have to filter to account for nested layouts. can't use children() because .contentblocks-field is buried.
                    $.each($(part).find('.contentblocks-field').not($(part).find('.contentblocks-field .contentblocks-field')), function(fieldIndex, field) {
                        ContentBlocks.deleteField(window.event, $(field), true);
                    });
                });
                ContentBlocks.deleteLayout(window.event, $region, true);
            });
        };
        input.getData = function () {
            var layouts = [];
            dom.find('.contentblocks-layout-wrapper').first().children('.contentblocks-layout').each(function(index, region) {
                var $region = $(region),
                    layoutId = $region.data('layout'),
                    parent = $(this).parent().closest('li.contentblocks-field-outer').data('field') || 0,
                    regionData = {
                        layout: layoutId,
                        content: {},
                        settings: Ext.decode($region.data('settings')) || {},
                        parent: parent
                    };

                // Custom titles per layout requires a bit of processing and ugly searching
                var title = $region.find('> .contentblocks-region-container > .contentblocks-region-container-header .contentblocks-layout-title').text(),
                    originalTitle = (ContentBlocksLayouts['_' + layoutId]) ? ContentBlocksLayouts['_' + layoutId].name : '';

                if (_(originalTitle)) {
                    originalTitle = _(originalTitle);
                }
                if (title && title.length && title !== originalTitle) {
                    regionData.title = title;
                }
                    
                var children = $region.find('.contentblocks-content').not($region.find('.contentblocks-content .contentblocks-content'));
                $.each(children, function (partIndex, part) {
                    var $part = $(part),
                        partName = $part.data('part'),
                        partFields = [];

                    $.each($part.children('li'), function (fieldIndex, field) {
                        var $field = $(field),
                            fieldId = $field.data('field'),
                            inputId = $field.attr('id'),
                            input = ContentBlocks.generatedContentFields[inputId];

                        if (input) {
                            var fieldValue = input.getData();
                            fieldValue.field = fieldId;
                            fieldValue.settings = Ext.decode($field.data('settings')) || {};
                            partFields.push(fieldValue);
                        }
                    });

                    regionData.content[partName] = partFields;
                });

                layouts.push(regionData);
            });
            return {
                child_layouts: layouts
            };
        };

        return input;
    }
})(vcJquery, ContentBlocks);
