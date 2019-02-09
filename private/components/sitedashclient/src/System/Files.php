<?php

namespace modmore\SiteDashClient\System;

use modmore\SiteDashClient\LoadDataInterface;

class Files implements LoadDataInterface {
    const EXCLUDES = [
        '/.git/',
        MODX_CORE_PATH . 'cache/'
    ];

    protected $modx;
    protected $params = array();

    public function __construct(\modX $modx, array $params)
    {
        $this->modx = $modx;
        $this->params = $params;
    }

    public function run()
    {
        $requestNum = array_key_exists('request', $this->params) ? (string)$this->params['request'] : 0;

        $perRequest = 10000;
        $offset = $perRequest * $requestNum;
        $limit = $perRequest;

        $hashes = $this->getHashes($offset, $limit);

        http_response_code(200);
        echo json_encode([
            'success' => true,
            'hashes' => $hashes,
        ], JSON_PRETTY_PRINT);
    }

    private function getHashes($offset, $limit)
    {
        return array_merge($this->getBaseHashes($offset, $limit), $this->getCoreHashes($offset, $limit));
    }

    private function getBaseHashes($offset, $limit)
    {
        try {
            $rii = new \LimitIterator(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(MODX_BASE_PATH)), $offset, $limit);
        }
        catch (\Exception $e) {
            return [];
        }

        return $this->parseIterator($rii);
    }

    private function getCoreHashes($offset, $limit)
    {
        // If the core is inside the webroot, the base hashes already cover it
        if (strpos(MODX_CORE_PATH, MODX_BASE_PATH) !== false) {
            return [];
        }
        try {
            $rii = new \LimitIterator(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(MODX_CORE_PATH)), $offset, $limit);
        }
        catch (\Exception $e) {
            return [];
        }

        return $this->parseIterator($rii);
    }

    private function parseIterator(\Iterator $rii)
    {
        $hashes = [];
        /** @var \SplFileInfo $file */
        foreach ($rii as $file) {
            if ($file->isDir()) {
                continue;
            }
            $path = $file->getPathname();

            // Ignore whatever matches the exludes list
            if (str_replace(self::EXCLUDES, '', $path) !== $path) {
                continue;
            }

            $cleanPath = str_replace([
                MODX_CORE_PATH,
                MODX_MANAGER_PATH,
                MODX_CONNECTORS_PATH,
                MODX_BASE_PATH
            ], [
                '{core_path}',
                '{manager_path}',
                '{connectors_path}',
                '{base_path}'
            ], $path);

            // Fetch hashes
            try {
                $hashes[$cleanPath] = [
                    'mt' => $file->getMTime(),
                    'h' => hash_file('sha256', $path),
                    's' => $file->getSize(),
                ];
            }
            catch (\Exception $e) {
//                $hashes[$cleanPath] = [
//                    'exception' => $e->getMessage(),
//                ];
            }
        }
        return $hashes;
    }
}
