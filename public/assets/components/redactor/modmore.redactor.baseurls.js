if (!RedactorPlugins) var RedactorPlugins = {};

(function($)
{
    /**
     * The baseurls plugin is used to make sure images inserted into the MODX manager are loaded properly.
     *
     * The problem is that images need to have an absolute url (/modx/assets/foo) in the manager, however keeping
     * the absolute url in the content results in portability issues when moving to a set up with a different base url.
     * Previously this could be mitigated by using iframe mode, but that was removed in Redactor 10 (v2 for MODX).
     *
     * This plugin resolves the problem by keeping images in the editor instance absolute (baseUrl + image url), but
     * stripping out the baseUrl on sync, so that source mode and the content in the front-end have relative urls.
     *
     * @returns {{init: Function, restoreImageSrc: Function, updateImageSrc: Function}}
     */
    RedactorPlugins.baseurls = function()
    {
        return {
            /**
             * Initiate the plugin; update image sources before images get rendered, and set up the callbacks.
             */
            init: function() {
                // Grab existing images in the content, and make sure their src attribute is set correctly
                var images = this.$editor.find('img');
                this.baseurls.updateImageSrc(images);

                // The syncBefore callback is called whenever there's a change, and it writes clean html to the textarea
                // so we hook into that to restore image src attributes to the right form
                this.opts.syncBeforeCallback = this.baseurls.restoreImageSrc;

                // When an image is uploaded, we have to make sure the src is set correctly
                var that = this;
                this.opts.imageUploadCallback = function(image, json) {
                    that.baseurls.updateImageSrc($(image));
                };
                this.opts.visualCallback = function() {
                    var imgs = that.$editor.find('img');
                    that.baseurls.updateImageSrc(imgs);
                }
            },

            /**
             * Callback triggered beforeSync.
             *
             * Strips out the baseUrl from the image src attribute, based on the clean-src attribute set
             * by the updateImageSrc method.
             *
             * @param html
             * @returns {*}
             */
            restoreImageSrc: function(html) {
                var $html = $(html);

                $html.find('img').each(function(i, image) {
                    var $image = $(image),
                        cleanSrc = $image.attr('clean-src');

                    if (cleanSrc) {
                        $image.attr('src', cleanSrc);
                        $image.removeAttr('clean-src');
                    }
                });

                return $('<div />').append($html).html();
            },

            /**
             * Goes over the images passed to it, to rewrite the src attribute if necessary.
             *
             * @param images
             */
            updateImageSrc: function(images) {
                var baseUrl = MODx.config.base_url,
                    siteUrl = MODx.config.site_url,
                    mode = this.opts.baseurlsMode || 'relative';

                if (mode === 'off' || this.utils.isEmpty(mode)) {
                    return;
                }

                images.each(function(i, image) {
                    var $image = $(image),
                        imageSrc = $image.attr('src') || '',
                        hasBaseUrl = (imageSrc.substr(0, baseUrl.length) === baseUrl);

                    if ((imageSrc.substr(0, 4) === 'http') || (imageSrc.substr(0, 2) === '//')) {
                        if (imageSrc.substr(0, siteUrl.length) === siteUrl) {
                            imageSrc = imageSrc.substr(siteUrl.length);
                            hasBaseUrl = false;
                        }
                        else {
                            return;
                        }
                    }

                    var displaySrc = imageSrc,
                        cleanedSrc = imageSrc;

                    switch (mode) {
                        case 'full':
                            if (!hasBaseUrl) {
                                displaySrc = cleanedSrc = siteUrl + imageSrc;
                            } else {
                                cleanedSrc = siteUrl + imageSrc.substr(baseUrl.length);
                            }
                            break;

                        case 'absolute':
                            if (!hasBaseUrl) {
                                displaySrc = baseUrl + imageSrc;
                                cleanedSrc = baseUrl + imageSrc;
                            }
                            break;

                        case 'root-relative':
                            if (!hasBaseUrl) {
                                displaySrc = '/' + imageSrc;
                                displaySrc = displaySrc.replace(/\/\/+/g, '/');
                            }
                            else {
                                cleanedSrc = '/' + imageSrc.substr(baseUrl.length);
                                cleanedSrc = cleanedSrc.replace(/\/\/+/g, '/');
                            }
                            break;

                        case 'relative':
                        default:
                            if (!hasBaseUrl) {
                                displaySrc = baseUrl + imageSrc;
                            } else {
                                cleanedSrc = imageSrc.substr(baseUrl.length);
                            }
                            break;
                    }
                    if (displaySrc !== imageSrc) {
                        $image.attr('src', displaySrc);
                    }
                    if (cleanedSrc !== displaySrc) {
                        $image.attr('clean-src', cleanedSrc);
                    }
                });
            }
        };
    };
})(jQuery);

