if (!RedactorPlugins) var RedactorPlugins = {};

(function($)
{
    var advAttrib = {title:'', id:'', classNames:''};
	RedactorPlugins.modmore = function()
	{
		return {
			init: function()
			{
				this.modal.addCallback('link', $.proxy(this.modmore.load, this));
                //this.modal.addCallback('imageEdit', $.proxy(this.modmore.imageEdit, this));
                this.$element.on('imageEditCallback', $.proxy(this.modmore.imageEdit, this)); // #janky requires redactor hack for multiple callback support
			},
            imageEdit: function(e,data) {
                var that = this;
                var img = $(data);

                //$('#redactor-image-title').addClass('typeahead');

                //that.modmore.initTypeahead();

                if(this.opts.advAttrib) {
                    that.modmore.inputListeners();

                    $('#redactor_link_title').val(img.attr('title'));
                    $('#redactor_link_url_class').val(img.attr('class'));
                    $('#redactor_link_url_id').val(img.attr('id'));

                    that.image.buttonSave.on('click',function(){
                        if(advAttrib.id)    img.attr('id',advAttrib.id);
                        if(advAttrib.title) img.attr('title',advAttrib.title);
                        if(advAttrib.classNames) img.attr('class',advAttrib.classNames);
                    });
                }
            },
            insertLink: function($node) {
                if(!$node) return;

                if(advAttrib.id) $node.attr('id',advAttrib.id);
                if(advAttrib.title) $node.attr('title',advAttrib.title);
                if(advAttrib.classNames) $node.attr('class',advAttrib.classNames);
            },
            initTypeahead:function(){
                var that = this;

                $('.typeahead').each(function(){
                     $(this).typeahead({
                         name: 'resources-oss',
                         prefetch: {
                             url: that.opts.assetsUrl + 'connector.php?action=resources/prefetch',
                             ttl: (that.opts.prefetch_ttl) ? that.opts.prefetch_ttl : 86400000
                         },
                         remote: {
                             url: that.opts.assetsUrl + 'connector.php?action=resources/search&query=%TERM%',
                             wildcard: '%TERM%'
                         },
                         template: [
                             '<p class="resource-id" title="{{context_key}} context">#{{id}}</p>',
                             '<p class="resource-name">{{& pagetitle}}</p>',
                             '<p class="resource-introtext">{{& introtext}}</p>'
                         ].join(''),
                         valueKey: 'id',
                         limit: 15,
                         engine: Hogan
                     });
                });
            },
            inputListeners: function(){
                $('#redactor-modal-body > section').append([
                    $(document.createElement('div')).addClass('redactor_link_adv').html([
                        $(document.createElement('hr')),
                        $(document.createElement('div')).html([
                            $(document.createElement('label')).attr('for','').text(this.opts.curLang.linkTitle || 'Title'),
                            $(document.createElement('input')).attr('type','text').addClass('redactor_input redactor_link_title').attr('id','redactor_link_title')
                        ]),
                        $(document.createElement('div')).html([
                            $(document.createElement('label')).attr('for','').text(this.opts.curLang.classNames || 'Class'),
                            $(document.createElement('input')).attr('type','text').addClass('redactor_input redactor_link_class').attr('id','redactor_link_url_class')
                        ]),
                        $(document.createElement('div')).html([
                            $(document.createElement('label')).attr('for','').text(this.opts.curLang.idLabel || 'ID'),
                            $(document.createElement('input')).attr('type','text').addClass('redactor_input').attr('id','redactor_link_url_id')
                        ])
                    ])
                ]).find('#redactor_link_title').on('change keyup',function(e){
                    advAttrib.title = $(this).val();
                }).end().find('#redactor_link_url_class').on('change keyup',function(e){
                    advAttrib.classNames = $(this).val();
                }).end().find('#redactor_link_url_id').on('change keyup',function(e){
                    advAttrib.id = $(this).val();
                });
            },
			load: function()
			{
                var that = this;

                $('#redactor-modal-body > section').wrapInner('<div id="redactor_tab1" class="redactor_tab">');

                var $tabNav = $('<div id="redactor_tabs">');
                $tabNav.html(
                      '<a href="#" class="redactor_tabs_act">URL</a>'
                    + '<a href="#">' + (this.opts.curLang.resource || 'Resource') + '</a>' // #janky
                ).after('<input type="hidden" id="redactor_tab_selected" value="1">');

                var $tab1 = $('#redactor_tab1');
                var $tab2 = $('<div id="redactor_tab2" class="redactor_tab" style="display:none">');
                var $tab3 = $('<div id="redactor_tab3" class="redactor_tab" style="display:none">');
                var $tab4 = $('<div id="redactor_tab4" class="redactor_tab" style="display:none">');

                $tab2.html(
                    '<label>' + (this.opts.curLang.resource || 'Resource') + '</label>' +
                    '<input type="text" class="redactor_input typeahead" id="redactor_link_resource" placeholder="' + (this.opts.curLang.resource_placeholder || '') + '">' +
                    '<label>' + (this.opts.curLang.hash || 'Hash') + '</label>' +
                    '<input type="text" class="redactor_input" id="redactor_link_hash" placeholder="' + (this.opts.curLang.hash_placeholder || '') + '">'
                );

                $tab3.html(
                      '<label>Mail To</label>'
                    + '<div class="redactor_link_mailto_wrapper">'
                        + '<input type="email" id="redactor_link_mailto" class="redactor_input" />'
                        + '<div class="red-tool"><i class="fa fa-chevron-down icon icon-chevron-down"></i></div>'
                        + '<div class="adv" style="display:none">'
                            + '<div class="cc-bcc">'
                              + '<div class="cc"><label>CC</label><div><input type="email" id="redactor_link_mailto_cc" class="redactor_input" /></div></div>'
                              + '<div class="bcc"><label>BCC</label><div><input type="email" id="redactor_link_mailto_bcc" class="redactor_input" /></div></div>'
                            + '</div>'
                            + '<label>Subject</label>'
                            + '<input type="text" id="redactor_link_mailto_subject" class="redactor_input" />'
                            + '<label>Body</label>'
                            + '<textarea type="text" id="redactor_link_mailto_body" rows="3" class="redactor_input" ></textarea>'
                        + '</div>'
                      + '</div>'
                );

                $tab3.find('.red-tool').on('click',function(e){
                    if($(this).find('i').hasClass('icon-chevron-up')) {
                        $(this).siblings('.adv').hide();
                        $(this).find('i').removeClass('icon-chevron-up').addClass('icon-chevron-down').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                    } else {
                        $(this).siblings('.adv').show();
                        $(this).find('i').removeClass('icon-chevron-down').addClass('icon-chevron-up').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                    }
                });

                $tab4.html(
                      '<label>' + this.opts.curLang.anchor + '</label>'
                    + '<input type="text" class="redactor_input" id="redactor_link_anchor"  />'
                );

                $('#redactor-modal-body > section').prepend($tabNav);

                var $tabs = $tab1.wrap('<div class="tabs">').parent();

                $tabs.append($tab2);
                if(this.opts.linkEmail)  {
                    $tabNav.append('<a href="#" class="email">Email</a>');
                    $tabs.append($tab3);
                }
                if(this.opts.linkAnchor) {
                    var anchorTab = $('<a href="#">').html(this.opts.curLang.anchor);
                    $tabNav.append(anchorTab);
                    $tabs.append($tab4);

                    anchorTab.click(function(e){
                      updateLinkAnchorField();
                    });

                    $('#redactor-link-url').bind('input',function(e){
                      updateLinkAnchorField();
                    });

                    $('#redactor_link_anchor').bind('input',function(e){
                      var anchor = $(this).val().replace('#',''),
                      link = $('#redactor-link-url').val(),
                      indexOf = link.lastIndexOf('#');
                      if(indexOf > -1) link = link.substring(0,indexOf);
                      link += '#' + anchor;
                      $('#redactor-link-url').val(link);
                    });

                    function updateLinkAnchorField() {
                      var fragments = $('#redactor-link-url').val().split('#');
                      if(fragments[1]) $('#redactor_link_anchor').val(fragments[1]);
                    }
                }

                $('#redactor_link_resource').bind('input',function(e){
                    that.link.url = '[[~' + $(this).val() + ']]';
                }).bind('typeahead:selected', function(obj, datum, name) {
                    that.link.$inputUrl.val('[[~' + datum.id + ']]');
                    if(!that.link.$inputText.val()) that.link.$inputText.val(datum.pagetitle);
                    that.link.$inputUrl.removeClass('redactor-input-error').trigger('keyup');
                });

                function addMailToQueryParams() {
                    var subjectInput = $('#redactor_link_mailto_subject');
                    var bodyTextArea = $('#redactor_link_mailto_body');
                    var ccInput = $('#redactor_link_mailto_cc');
                    var bccInput = $('#redactor_link_mailto_bcc');

                    var params = {};
                    function encodeQueryData(data) {
                       var ret = [];
                       for (var d in data)
                          ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
                       return ret.join("&");
                    }
                    if(subjectInput.val()) params.subject = subjectInput.val();
                    if(bodyTextArea.val()) params.body = bodyTextArea.val();
                    if(ccInput.val()) params.cc = ccInput.val();
                    if(bccInput.val()) params.bcc = bccInput.val();

                    if(!$.isEmptyObject(params)) {
                        that.link.url += '?' + encodeQueryData(params);
                    }

                    that.link.$inputUrl.val(that.link.url);
                }

                $('#redactor_link_mailto').bind('input',function(e){
                    that.link.url = 'mailto:' + $(this).val();
                    addMailToQueryParams();
                });

                $('#redactor_link_mailto_subject, #redactor_link_mailto_body, #redactor_link_mailto_cc, #redactor_link_mailto_bcc').bind('input',function(e){
                    that.link.url = 'mailto:' + $('#redactor_link_mailto').val();
                    addMailToQueryParams();
                });

                $tabs.children('.redactor_tab').each(function(i,s){
                    $(this).attr('id','redactor_tab' + (i+1).toString());
                })

                $('#redactor-link-blank').parent().attr('id','redactor-link-open-in-new-tab');
                $tabs.append(
                    $('<div id="redactor-link-bottom-opts" class="redactor_tab">').append([
                        $('#redactor-link-url-text').prev('label').detach(),
                        $('#redactor-link-url-text').detach(),
                        $('#redactor-link-open-in-new-tab').detach()
                    ])
                );

                that.modmore.initTypeahead();

                assignTabListeners(this,$tabNav);

                $tabNav.find('a:not(.email)').on('click',function(e){
                    $('#redactor-link-open-in-new-tab').show();
                });
                $tabNav.find('a.email').on('click',function(e){
                    $('#redactor-link-open-in-new-tab').hide();
                });

                if(that.opts.advAttrib) {
    				this.selection.get();
    				this.link.getData();

                    that.modmore.inputListeners();

                    var $el = $(that.selection.getCurrent()).closest('a', that.$editor[0]);
                    if ($el.length !== 0 && $el[0].tagName === 'A') {
                        $('#redactor_link_title').val($el.attr('title'));
                        $('#redactor_link_url_class').val($el.attr('class'));
                        $('#redactor_link_url_id').val($el.attr('id'));
                    }

                    that.$element.on("insertedLinkCallback",function(data){
                        that.selection.get();
                        that.link.getData();

                        that.modmore.insertLink(that.link.$node);
                    });

                    that.$element.on("modalOpenedCallback",function(data){
                        that.link.buttonInsert.on('click',function(e){
                            that.modmore.insertLink(that.link.$node);
                        });
                    });
                }

			}
		};
	};
})(jQuery);
