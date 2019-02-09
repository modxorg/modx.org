(function ($) {
    var original = $.Redactor.prototype.toolbar();
    $.Redactor.prototype.toolbar = function () {
        return $.extend({}, original, {
            observeScroll: function () {
                // Only observe scroll for visible boxes
                var boxOffset = this.$box.offset();
                if (!this.$box.is(':visible') || boxOffset.top < -9000 || boxOffset.left < -9000) {
                    return;
                }

                var scrollTop = $(this.opts.toolbarFixedTarget).scrollTop();
                var boxTop = boxOffset.top;

                // Account for the toolbarFixedTopOffset so we consider "out of the box" to be "out of view"
                boxTop = boxTop - this.opts.toolbarFixedTopOffset;

                // If the boxTop is < 0, that means the top of the .redactor-box is out of view,
                // so we need to enable the fixed toolbar
                if (boxTop < 0) {
                    this.toolbar.observeScrollEnable(scrollTop, boxTop);
                }

                else {
                    this.toolbar.observeScrollDisable();
                }
            },
            observeScrollEnable: function (scrollTop, boxTop) {
                var left = this.$box.offset().left,
                    width = this.$box.innerWidth(),
                    height = this.$box.height();

                this.$toolbar.addClass('toolbar-fixed-box');
                this.$toolbar.css({
                    position: 'fixed',
                    width: width,
                    top: this.opts.toolbarFixedTopOffset + 'px',
                    left: left
                });

                // Scrolling beyond the editor should hide the toolbar.
                var scolledBeyond = (boxTop + height) < 55;
                if (scolledBeyond) {
                    $('.redactor-dropdown-' + this.uuid + ':visible').hide();
                    if (this.$toolbar.css('visibility') !== 'hidden') {
                        this.$toolbar.css('visibility', 'hidden');
                        $('#modx-action-buttons').css('marginTop', 0);
                    }
                }
                else {
                    // make sure the toolbar is visible
                    this.$toolbar.css('visibility', 'visible');
                    var actionButtons = $('#modx-action-buttons'),
                        toolbarHeight = this.$toolbar.height();

                    // Only set the margin if it's different from what is already set to prevent tons of repaints
                    if (actionButtons.css('marginTop') !== toolbarHeight + 'px') {
                        actionButtons.css('marginTop', toolbarHeight + 'px');
                    }
                }

                this.toolbar.setDropdownsFixed();
            },
            observeScrollDisable: function () {
                // If we're setting the toolbar back to its original state, we also set the action buttons back to
                // the standard top margin.
                if (this.$toolbar.css('position') !== 'relative') {
                    $('#modx-action-buttons').css('marginTop', 0);
                }
                this.$toolbar.css({
                    position: 'relative',
                    width: 'auto',
                    top: 0,
                    left: 0,
                    visibility: 'visible'
                });

                this.toolbar.unsetDropdownsFixed();
                this.$toolbar.removeClass('toolbar-fixed-box');
            },
            setDropdownsFixed: function () {
                var top = this.$toolbar.innerHeight() + this.opts.toolbarFixedTopOffset;
                var position = 'fixed';
                $('.redactor-dropdown-' + this.uuid).each(function () {
                    $(this).css({position: position, top: top + 'px'});
                });
            },
            unsetDropdownsFixed: function () {
                var top = (this.$toolbar.innerHeight() + this.$toolbar.offset().top);
                $('.redactor-dropdown-' + this.uuid).each(function () {
                    $(this).css({position: 'absolute', top: top + 'px'});
                });
            }
        });
    };
})(jQuery);

(function ($) {
    var original = $.Redactor.prototype.image();
    $.Redactor.prototype.image = function () {
        return $.extend({}, original, {
            setFloating: function($image) { // #janky #modmore    		
                var that = this;		
    			var floating = $('#redactor-image-align').val();

    			var imageFloat = '';
    			var imageDisplay = '';
    			var imageMargin = '';
                var imageClass = '';

                if(that.opts.marginFloatLeft.indexOf('.') == 0) removeClasses(that.opts.marginFloatLeft);
                if(that.opts.marginFloatRight.indexOf('.') == 0) removeClasses(that.opts.marginFloatRight);

    			switch (floating)
    			{
    				case 'left':
    					imageFloat = 'left';
                        if(that.opts.marginFloatLeft.indexOf('.') == 0) {
                            $image.addClass(that.opts.marginFloatLeft.substring('1'))
                        } else if(that.opts.marginFloatLeft) {
                            imageMargin = that.opts.marginFloatLeft;
                        } else {
                            imageMargin = '0 ' + that.opts.imageFloatMargin + ' ' + that.opts.imageFloatMargin + ' 0';
                        }
    				break;
    				case 'right':
    					imageFloat = 'right';
                        if(that.opts.marginFloatRight.indexOf('.') == 0) {
                            $image.addClass(that.opts.marginFloatRight.substring('1'))
                        } else if(that.opts.marginFloatRight) {
                            imageMargin = that.opts.marginFloatRight;
                        } else {
                            imageMargin = '0 0 ' + that.opts.imageFloatMargin + ' ' + that.opts.imageFloatMargin;
                        }
    				break;
    				case 'center':
    					imageDisplay = 'block';
    					imageMargin = 'auto';
    				break;
    			}

    			$image.css({ 'float': imageFloat, display: imageDisplay, margin: imageMargin });
    			$image.attr('rel', $image.attr('style'));

                function removeClasses(cs) {
                    var classes = cs.split(' ');
                    for(var i = 0; i < classes.length; i++) {
                        var c = classes[i].replace('.','').trim();
                        $image.removeClass(c);
                    }
                }
            }
        });
    };
})(jQuery);