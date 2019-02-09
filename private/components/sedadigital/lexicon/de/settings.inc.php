<?php

$_lang['sedadigital'] = 'SEDA.digital';
$_lang['project'] = 'Project';

$_lang['setting_project.environment'] = 'Projekt Environment';
$_lang['setting_project.environment_desc'] = 'Define on which infrastructure this instance is running on. Make sure that `production` is used for the actual client setup. Other common values are `staging` or `develop`.';

$_lang['setting_project.assets_version'] = 'Assets Version ID';
$_lang['setting_project.assets_version_desc'] = 'Is used as cachebusting string for assets loading. Assets use long-living caching headers. Increase this number always when you upload any of the frontend assets files.';

$_lang['setting_project.cachebust'] = 'Cachebusting';
$_lang['setting_project.cachebust_desc'] = 'Activate this to use a unique `assets_version` for each page load. This is helpful during development.';