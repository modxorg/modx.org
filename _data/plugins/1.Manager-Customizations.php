id: 1
name: 'Manager Customizations'
properties: 'a:0:{}'

-----

$environment = $modx->getOption('project.environment', null, 'production');

switch($environment) {
    case "production":
        $primarycolor = '#ce0000';
        $fontcolor = '#fff';
    break;
    case "staging":
        $primarycolor = '#efc600';
        $fontcolor = '#fff';
    break;
    default: // local/develop
        $primarycolor = '#0087C1';
        $fontcolor = '#fff';
    break;
}

$modx->regClientStartupHTMLBlock('
    <style>
        #modx-container {
          background: #eaeaea;
        }
        #modx-header {
            background: '.$primarycolor.' !important;
        }
        #modx-navbar {
            background: linear-gradient(to right,rgba(0,0,2,0.3) 0%,rgba(255,255,255,0.1) 26%,rgba(0,0,0,0.1) 60%,rgba(255,255,255,0.1) 95%,rgba(0,0,0,0.2) 100%) !important;
        }
        #modx-navbar .top:after {
            border-top-color: '.$fontcolor.';
        }
        #modx-navbar a {
            color: '.$fontcolor.';
        }
        #modx-topnav li {
            border-right: 1px solid rgba(0,0,0,0.25);
        }
        #modx-navbar li.top:hover {
            background: rgba(0,0,0,0.45)
        }
        #modx-navbar ul.modx-subnav li {
            background: '.$primarycolor.';
        }
        #modx-navbar ul.modx-subnav li a {
            background: rgba(0,0,0,0.4);
            color: '.$fontcolor.';
        }
        #modx-navbar ul.modx-subnav li a:hover {
            background: rgba(0,0,0,0.3);
            color: '.$fontcolor.';
        }
        #modx-navbar ul.modx-subnav li a span {
            color: '.$fontcolor.';
            opacity: 0.9;
        }
        
        /* hide help buttons */
        #modx-navbar #limenu-about {
            display: none;
        }
        #modx-action-buttons #modx-abtn-help {
            display: none !important;
        }

        
/*
        #modx-navbar #modx-home-dashboard {
            width: 84px;
            margin-left: 14px;
            margin-right: 7px;
            background-image: url(/assets/templates/web/logo.svg),none;
            background-size: 100%;
        }
*/
        
        #modx-site-info {
            padding: 13px 15px 0 7px!important;
            width: auto;
            min-width: 173px;
        }
        
        #modx-site-info .full_appname {
            display: none;
        }
        
        #site_name:after {
            content: "'.ucfirst($environment).' Server";
            display: block;
            color: #fff;
            font-style: normal;
            font-weight: bold;
        }
        
        #modx-manager-search .x-form-field-wrap {
            background: rgba(0,0,0,0.2);
        }
        #modx-navbar #modx-manager-search .x-form-text {
            color: '.$fontcolor.';
        }
        
        /* other styles of manager */
        .x-tab-strip li {
            color: '.$primarycolor.';
        }
        .x-tab-strip li.x-tab-strip-active {
            color: '.$primarycolor.';
            -webkit-box-shadow: 0 -3px 0 '.$primarycolor.', -1px 0 0 transparent;
            box-shadow: 0 -3px 0 '.$primarycolor.', -1px 0 0 transparent;
        }
        .panel-desc {
            background-color: #E4E9EE;
            /* border-bottom: 1px solid #E8E5E5 !important; */
        }
        
        /* hide seopro keywords */
        .seopro-counter-keywords {
            display: none !important;
        }
        #x-form-el-seopro-keywords, label[for="seopro-keywords"].x-form-item-label, label[for="pagetitle"].desc-under {
            display: none !important;
        }
        
        /* Hide seoTab title in tab */
        #seo-tab #modx-resource-vtabs-header-title {
            display: none;
        }
        
        /* improve #modx-page-settings tab */
        #modx-page-settings-left {
            width: 100% !important;
            margin-bottom: 1em;
        }
        #modx-page-settings-right {
            margin-left: 0;
        }
        #modx-page-settings-right .x-fieldset {
            border: none;
            margin: 0;
        }
        #modx-page-settings-right .x-fieldset .x-fieldset-bwrap .x-fieldset-body {
            padding: 0;
        }
        
        .modx-browser-fullview img[src*=".png"]
        .modx-browser-thumb img[src*=".png"],
        .modx-browser-detail-thumb img[src*=".png"],
        .modx-tv-image-preview img[src*=".png"],
        .contentblocks-field-image-preview img[src*=".png"],
        .contentblocks-field-gallery-image-view img[src*=".png"] {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAF0lEQVR4AWP4DwVnoGCgBGAMmMQACQAA9CflgZrq8LsAAAAASUVORK5CYII=) 0 0 !important;
        }
    </style>
');


// For non-admins only:
if (!$modx->user->isMember('Administrator')) {
$modx->regClientStartupHTMLBlock('
    <style>
        /* hide toolbar in element tree */
        #modx-tree-element .x-toolbar {
            display: none;
        }
    </style>
');
}