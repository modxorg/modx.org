<li id="{%=o.id%}" class="contentblocks-field-fileinput_file">
    <input type="hidden" class="url" value="{%=o.url%}">
    <input type="hidden" class="size" value="{%=o.size%}">
    <input type="hidden" class="extension" value="{%=o.extension%}">
    <input type="hidden" class="upload_date" value="{%=o.upload_date%}">
    <div class="contentblocks-field-fileinput_file-view">
        <span class="file-title">
            <i class="icon icon-file-{%=o.icon%}-o"></i>
            {%=o.filename%}
        </span>
        <a class="contentblocks-field-button contentblocks-fileinput_file-delete" href="javascript:void(0);" title="{%=_('contentblocks.delete')%}">&times; {%=_('contentblocks.delete')%}</a>
    </div>
    <input type="text" class="title" value="{%=o.title%}" placeholder="{%=_('contentblocks.title')%}">
    <div class="contentblocks-field-fileinput_file-uploading">
        <div class="upload-progress">
            <div class="bar"></div>
        </div>
    </div>
</li>
