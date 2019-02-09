id: 24
source: 2
name: ResponseHeaders
category: SEDA.digital
properties: 'a:0:{}'

-----

header('X-Frame-Options: SAMEORIGIN', true);
header('Referrer-Policy: strict-origin-when-cross-origin', true);
header('X-Xss-Protection: 1; mode=block', true);
header('X-Content-Type-Options: nosniff', true);
if ($modx->getOption('server_protocol', null, 'http') === 'https') header('Strict-Transport-Security: max-age=31536000');