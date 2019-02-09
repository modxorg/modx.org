/*
 *  TinyRTE - v0.5.0
 *  TinyRTE is a real tiny editor, meant to provide rich text editing features on single inputs.
 *  Developed by the modmore team <hello@modmore.com>
 *
 *  It is loosely based on Yellow Text, by Stefan Vermaas: https://github.com/stefanvermaas/yellow-text
 */
;(function ($, window, document, undefined) {

    // Create an empty noop function as a placeholder
    function noob() {
    }

    // Create the defaults once
    var pluginName = "TinyRTE",
        defaults = {
            width: "100%",
            height: "300px",
            containerClass: "tinyrte-container",
            hiddenInputClass: "tinyrte-replaced",
            buttonsClass: "tinyrte-buttons",
            iFrameClass: "tinyrte-iframe",
            cleanOnSubmit: true,
            defaultFont: "Helvetica Neue, Helvetica, arial, sans-serif",
            defaultFontSize: "1em",
            defaultFontColor: "#000000",
            defaultActions: ["bold", "underline", "italic", "strikethrough", "align-left", "align-center", "align-right", "unordered-list", "ordered-list", "link", "image"],
            lazyInit: false,

            // Define the callback options
            isContentChanged: noob,
            addLinkCallback: function(callback, currentValue) { callback(prompt('Enter Link')); }
        };

    // The actual plugin constructor
    function TinyRTE(element, options) {
        // Define some default plugin options
        this.element = element;
        this.options = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;

        // Initialize the whole plugin
        this.initialize();
    }

    /**
     * Extend the plugin prototype
     */
    TinyRTE.prototype = {
        rendered: false,

        /**
         * Initializing the plugin
         */
        initialize: function () {
            var trte = this;
            // Initialize when the element is clicked/focused
            if (this.options.lazyInit) {
                $(this.element).on('focus click', function () {
                    trte._init.bind(trte)();
                });
            }
            else {
                this._init();
            }
        },

        _init: function() {
            // Only once
            if (this.rendered) {
                return;
            }
            this.rendered = true;

            // Render the plugin
            this.render();

            // Grap the content and put it in the iframe
            this.setContentToEditor(this.getContentFromTextarea());

            // Listen to events and react on them
            this.events();
        },

        /**
         * Getting and setting content
         */

        // Set new content in the editor
        setContentToEditor: function (content) {
            $(this.editor).contents().find("body").append(content);
            return content;
        },

        // Set new content in the textarea
        setContentToTextarea: function (content) {
            $(this.element).val(content);
            return content;
        },

        // Get content from the textarea
        getContentFromTextarea: function () {
            return $(this.element).val();
        },

        // Get content from the editor
        getContentFromEditor: function () {
            return $(this.editor).contents().find("body").html();
        },

        /**
         * Render the plugin
         */
        render: function () {
            // Get the styles for the element, used for ensuring exact same styling in the iframe
            var $el = $(this.element),
                el = $el.get(0),
                elStyles = (window.getComputedStyle) ? window.getComputedStyle(el) : false,
                outerStyles = ["border", "border-radius", "box-shadow", "border-top-width", "border-right-width", "border-bottom-width", "border-left-width", "border-top-style", "border-right-style", "border-bottom-style", "border-left-style", "border-top-color", "border-right-color", "border-bottom-color", "border-left-color"],
                innerStyles = ["background-color", "background-image", "font-family", "font-size", "font-style", "font-weight", "padding-bottom", "padding-left", "padding-top", "padding-right", "direction", "height", "text-align", "text-decoration", "text-shadow", "word-spacing"],
                outerStylesCss = [],
                innerStylesCss = [];

            if (elStyles) {
                // Outer styles (applied to the iframe)
                $.each(outerStyles, function (key, property) {
                    var v = elStyles[property] ? elStyles[property] : null;
                    if (v !== null) {
                        outerStylesCss.push(property + ":" + v + ";");
                    }
                });

                // Inner styles (applied to the iframe body)
                $.each(innerStyles, function (key, property) {
                    var v = elStyles[property] ? elStyles[property] : null;
                    if (v !== null) {
                        innerStylesCss.push(property + ":" + v + ";");
                    }
                });
            }
            else {
                if (console) console.error("TinyRTE only supports IE9 and up");
            }

            window.rteEl = $el;
            outerStylesCss.push("width: 100%;");
            outerStylesCss = outerStylesCss.join("");

            innerStylesCss.push("overflow: hidden;");
            innerStylesCss = innerStylesCss.join("");

            var setFocus = false;
            if ($(this.element).is(":focus")) {
                $(this.element).blur();
                setFocus = true;
            }

            // Hide the current text field
            $(this.element).addClass(this.options.hiddenInputClass).hide();

            // Create a container which will hold our text editor
            this.container = $("<div />").addClass(this.options.containerClass);

            // Add the container after the element where we bind this plugin too
            $(this.element).after(this.container);

            // Create the iFrame and append to the previously created container
            this.editor = $("<iframe />").addClass(this.options.iFrameClass).attr('style', outerStylesCss).css({
                "height": $el.outerHeight() + 1
            }).appendTo(this.container).get(0);

            // Make the editor work across browsers
            this.editor.contentWindow.document.open();
            this.editor.contentWindow.document.close();
            this.editor.contentWindow.document.designMode = "on";

            // Trigger events on the basic input when they occur on the editor
            var input = $(this.element),
                editor = $(this.editor).contents().find('body'),
                editorFrame = $(this.editor),
                height = 0;
            editor.on('blur change click contextmenu copy cut dblclick keydown keypress keyup paste resize select textinput unload', function(e) {
                input.trigger(e);
                // Reset the inner height, so we can get the natural height
                editor.css('height', 'auto');
                height = editor.outerHeight();
                // Update the inner and outer height
                editor.css('height', height + 'px');
                editorFrame.css('height', height + 'px');
            });

            // Add styling to the iframe
            var iFrameCSS = "<style type=\"text/css\">* {box-sizing: border-box;} body {border: 0; margin: 0; padding: 0; "+ innerStylesCss + "}</style>";
            $( this.editor ).contents().find("head").append(iFrameCSS);

            // Build the button container
            var zIndex = $el.css("z-index");
            if (zIndex === "auto") {
                zIndex = 0;
            }
            zIndex++;
            this.buttons = $("<div />").addClass(this.options.buttonsClass).css("z-index", zIndex).prependTo(this.container);

            // Render the buttons
            this.createButtons();

            setTimeout(function() {
                editor.trigger('blur');
            }, 30);

            if (setFocus) {
                setTimeout(function() {
                    editor.focus();
                }, 30);
            }
        },

        createButtons: function () {

            // Loop through all the buttons
            for (var i = 0; i < this.options.defaultActions.length; i++) {

                // Create a variable to store the object in
                var button;

                // Get the right value
                switch (this.options.defaultActions[i]) {
                    case "bold" :
                        button = { content: "b", command: "bold" };
                        break;
                    case "underline" :
                        button = { content: "u", command: "underline" };
                        break;
                    case "italic" :
                        button = { content: "i", command: "italic" };
                        break;
                    case "strikethrough" :
                        button = { content: "s", command: "strikethrough" };
                        break;
                    case "align-left" :
                        button = { content: "left", command: "JustifyLeft" };
                        break;
                    case "align-center" :
                        button = { content: "center", command: "JustifyCenter" };
                        break;
                    case "align-right" :
                        button = { content: "right", command: "JustifyRight" };
                        break;
                    case "unordered-list" :
                        button = { content: "ul", command: "InsertUnorderedList" };
                        break;
                    case "ordered-list" :
                        button = { content: "ol", command: "InsertOrderedList" };
                        break;
                    case "image" :
                        button = { content: "img", command: "image" };
                        break;
                    case "link" :
                        button = { content: "link", command: "link" };
                        break;
                    case "unlink" :
                        button = { content: "unlink", command: "unlink" };
                        break;
                    default :
                        button = { content: "", command: "" };
                }

                // Build the buttons and add before the container
                $("<a />").addClass(button.command).text(button.content).data("command", button.command).appendTo(this.buttons);
            }
        },

        /**
         * Listen to events
         */
        events: function () {

            var that = this,
                editor = $(this.editor).contents(),
                container = this.container;

            // Bind to the click event on the buttons
            $(container).find("." + this.options.buttonsClass + " a").on("click", function (e) {

                // Grap the command and react on event
                var command = $(this).data("command");
                that.buttonClicked(e, command);
            });

            // Bind to the keydown event while typing
            editor.find("body").on("keydown", function (e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                }

                // Look for the control or command key
                if (e.ctrlKey || e.metaKey) {
                    if (e.keyCode != 83) { // cmd/ctrl+s
                        that.shortkey(e, this);
                    }
                    else {
                        e.preventDefault();
                        $('#modx-abtn-save').click()
                    }
                }
            });

            // Handle paste
            editor.find("body").on("paste", function (e) {
                if (that.inPasteHandler) { return; }
                that.inPasteHandler = true;
                try {
                    var clip = e.originalEvent.clipboardData || window.clipboardData;
                    var text = clip.getData("text");
                    var temp = document.createElement("div");
                    temp.innerHTML = text;
                    text = temp.textContent.replace(/\r?\n|\r/g, "");
                    that.runCMD("insertText", text);
                    e.preventDefault();
                } catch (e) {
                    if (console) { console.error('could not run paste cleanup', e); }
                }
                that.inPasteHandler = false;
            });

            // Bind the keyup event, to check for changes
            editor.find("body").on("keyup", function () {

                // Check or the text is changed
                var editorContents = $(that.editor).contents().find("body").html(),
                    hiddenElementContents = $(that.element).val(),
                    changed = (editorContents !== hiddenElementContents);

                // Call the callback
                that.options.isContentChanged(changed);

                if (changed) {
                    that.cleanTheCode();
                    that.setContentToTextarea(that.getContentFromEditor());
                }
            });

            // Bind to the submit event of the form
            $(this.element).parents("form").on("submit", function () {

                // First clean the code
                that.cleanTheCode();

                // Put the content back in the textfield
                that.setContentToTextarea(that.getContentFromEditor());
            });

            var hideAgain = null;
            editor.find("body").on("focus input", function() {
                container.addClass("tinyrte-has-focus");
                if (hideAgain) {
                    clearTimeout(hideAgain);
                }
                hideAgain = setTimeout(function() {
                    container.removeClass("tinyrte-has-focus");
                }, 5000);

            }).on("blur", function() {
                if (hideAgain) {
                    clearTimeout(hideAgain);
                }
                container.removeClass("tinyrte-has-focus");
            });

            // Catch the load event so we can rebuild the editor when it is broken because of a dom move
            var iframe = $(this.editor),
                input = $(this.element),
                options = this.options;
            setTimeout(function() {
                iframe.on('load', function() {
                    setTimeout(function() {
                        input.show();
                        input.siblings('.tinyrte-container').remove();
                        input.TinyRTE(options);
                    }, 50);
                });
            }, 500);
        },

        /**
         *
         * buttonClicked
         * =========================================
         * This function reacts on the fact that a
         * button is clicked. Based on the button an
         * action will be triggered
         */
        buttonClicked: function (e, command) {

            // Focus on the contentWindow
            this.editor.contentWindow.focus();

            // Take an other look at the command and look for the perfect action and execute it
            this.runCMD(command);

            // And focus back again on the contentWindow
            this.editor.contentWindow.focus();
        },

        /**
         * Use some short keys
         */
        shortkey: function (e) {

            // Define the key
            var key = e.which;

            // Check or we have on of the right keys
            if (key === 66 || key === 73 || key === 85) {

                // Focus on the content window
                //this.editor.contentWindow.focus();

                // Handle the action
                switch (key) {
                    case 66:
                        this.runCMD("bold");
                        break;
                    case 73:
                        this.runCMD("italic");
                        break;
                    case 85:
                        this.runCMD("underline");
                        break;
                }

                // And focus back again on the contentWindow
                //this.editor.contentWindow.focus();
            }
        },

        /**
         * Run the actual command
         */
        runCMD: function (cmd, value) {

            var execed = false;
            // Check command for special actions and run it
            if (cmd === "image") {

                var image;

                // Check for the insertImage function, this will always be true
                if (typeof this.options.setImage === "function") {
                    image = this.options.setImage.call();
                }

                // Check or a other plugin or CMS added an image to the plugin
                var url = ( typeof image !== "undefined" && image.length > 0 ) ? image : prompt("URL (example: http://www.google.com): ");

                // Insert the image in the text editor
                execed = this.editor.contentWindow.document.execCommand("InsertImage", false, url);
            } else if( cmd === "link" ) {
                var selection = this.editor.contentWindow.document.getSelection(), // get selection
                    node = selection.anchorNode,
                    currentLink = ''; // get containing node{
      
                while (node && node.nodeName !== 'A'){ // find closest link - might be self
                    node = node.parentNode;
                }
              
                if (node){ // if link found
                    var range = this.editor.contentWindow.document.createRange(); //create a new range
                    range.selectNodeContents(node); // set range to content of link
                    selection.addRange(range); // change the selection to the link
                    currentLink =  node.getAttribute('href');
                }

                var instance = this;
                this.options.addLinkCallback(function(newLink) {
                    if(newLink === '') {
                        instance.editor.contentWindow.document.execCommand("unlink", false, null);
                    }
                    else {
                        instance.editor.contentWindow.document.execCommand( "CreateLink", false, newLink);
                    }
                    // we have to do this manually here, because our return statement later on runs immediately
                    instance.cleanTheCode();
                    instance.setContentToTextarea(instance.getContentFromEditor());
                }, currentLink);
            } else if (cmd === "unlink") {
                var selection = this.editor.contentWindow.document.getSelection(), // get selection
                    node = selection.anchorNode; // get containing node
                if(selection.isCollapsed) {
                    var range = this.editor.contentWindow.document.createRange(); //create a new range
                    range.selectNodeContents(node); // set range to content of link
                    selection.addRange(range); // change the selection to the link
                }
          					
                execed = this.editor.contentWindow.document.execCommand("unlink", false, null);
            } else if (cmd === "insertText") {
                if (this.editor.contentWindow.document.queryCommandSupported('insertText')) {
                    execed = this.editor.contentWindow.document.execCommand('insertText', false, value);
                } else {
                    execed = this.editor.contentWindow.document.execCommand('paste', false, value);
                }
            } else {
                execed = this.editor.contentWindow.document.execCommand(cmd);
            }
            this.cleanTheCode();
            this.setContentToTextarea(this.getContentFromEditor());
            return execed;
        },

        /**
         * Clean the mess of the browsers
         */
        cleanTheCode: function () {
            var body = $(this.editor).contents().find("body");

            // Remove classes from br tag
           body.find("br").removeAttr("class").unwrap();

            // Remove classes from ul tag
            body.find("ul").removeAttr("class").unwrap();

            // Remove classes from ol tag
            body.find("ol").removeAttr("class").unwrap();

            // Remove spans, keeping the content
            body.find("span").contents().unwrap();
        },
        
        getSelectionBoundaryElement : function (isStart) {
            var range, sel, container;
            if (document.selection) {
                range = document.selection.createRange();
                range.collapse(isStart);
                return range.parentElement();
            } else {
                sel = window.getSelection();
                if (sel.getRangeAt) {
                    if (sel.rangeCount > 0) {
                        range = sel.getRangeAt(0);
                    }
                } else {
                    // Old WebKit
                    range = document.createRange();
                    range.setStart(sel.anchorNode, sel.anchorOffset);
                    range.setEnd(sel.focusNode, sel.focusOffset);
        
                    // Handle the case when the selection was selected backwards (from the end to the start in the document)
                    if (range.collapsed !== sel.isCollapsed) {
                        range.setStart(sel.focusNode, sel.focusOffset);
                        range.setEnd(sel.anchorNode, sel.anchorOffset);
                    }
               }
        
                if (range) {
                   container = range[isStart ? "startContainer" : "endContainer"];
        
                   // Check if the container is a text node and return its parent if so
                   return container.nodeType === 3 ? container.parentNode : container;
                }   
            }
        }

    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[ pluginName ] = function (options) {
        return this.each(function () {
            //if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new TinyRTE(this, options));
            //}
        });
    };

})(jQuery, window, document);
