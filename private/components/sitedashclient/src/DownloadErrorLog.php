<?php

namespace modmore\SiteDashClient;

class DownloadErrorLog implements LoadDataInterface {
    protected $modx;

    public function __construct(\modX $modx)
    {
        $this->modx = $modx;
    }

    public function run()
    {
        $file = $this->modx->getOption('cache_path') . 'logs/error.log';
        if (!file_exists($file)) {
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'data' => [
                    'message' => 'Error log not found'
                ]
            ]);
            return;
        }

        http_response_code(200);
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
}