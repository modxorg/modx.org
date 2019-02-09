<?php

namespace modmore\SiteDashClient\Upgrade;

use modmore\SiteDashClient\LoadDataInterface;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Process;

class Backup implements LoadDataInterface {
    protected $modx;
    protected $files = [];
    protected $targetDirectory;

    public function __construct(\modX $modx)
    {
        $this->modx = $modx;

        $this->files = [
            MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php',
            MODX_MANAGER_PATH . 'config.core.php',
            MODX_CONNECTORS_PATH . 'config.core.php',
            MODX_BASE_PATH . 'config.core.php',
            MODX_BASE_PATH . 'index.php',
        ];

        $optionalFiles = [
            MODX_BASE_PATH . '.htaccess',
        ];
        foreach ($optionalFiles as $file) {
            if (file_exists($file)) {
                $this->files[] = $file;
            }
        }

        $this->targetDirectory = MODX_CORE_PATH . 'export/backup_' . date('Y-m-d-His') . '_' . rand(0,9999999) . '/';
        if (!file_exists($this->targetDirectory) && !mkdir($concurrentDirectory = $this->targetDirectory) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
    }

    public function run()
    {
        if (!function_exists('proc_open')) {
            http_response_code(503);
            echo json_encode([
                'success' => false,
                'message' => 'The proc_open() function is disabled on your server. This is required for the backup to run.',
                'directory' => str_replace(MODX_CORE_PATH, '{core_path}', $this->targetDirectory)
            ], JSON_PRETTY_PRINT);
            return;
        }

        /**
         * Include the config file to access the database information
         *
         * @var $database_type
         * @var $database_server
         * @var $database_user
         * @var $database_password
         * @var $dbase
         */
        include MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';

        $database_password = str_replace("'", '\'', $database_password);
        $password_parameter = '';
        if ($database_password !== '') {
            $password_parameter = "-p'{$database_password}'";
        }

        $targetFile = $this->targetDirectory . $dbase . '.sql';
        $finder = new ExecutableFinder();
        $mysqldump = $finder->find('mysqldump');
        if ($mysqldump === null) {
            $mysqldump = $this->modx->getOption('sitedashclient.mysqldump_binary', null, 'mysqldump', true);
        }
        $cmd = "{$mysqldump} -u{$database_user} {$password_parameter} -h {$database_server} {$dbase}";
        $cmd .= " > {$targetFile}";

        $backupProcess = new Process($cmd);


        $backupProcess->run();
        if (!$backupProcess->isSuccessful()) {
            $code = $backupProcess->getExitCode();
            if ($code === 127) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Could not find the mysqldump program on your server; please configure the sitedashclient.mysqldump_binary system setting to point to mysqldump to create backups.',
                    'binary' => $mysqldump,
                    'directory' => str_replace(MODX_CORE_PATH, '{core_path}', $this->targetDirectory),
                    'output' => $backupProcess->getErrorOutput() . ' ' . $backupProcess->getOutput(),
                ], JSON_PRETTY_PRINT);
                return;
            }

            echo json_encode([
                'success' => false,
                'message' => 'Received exit code ' . $code . ' trying to create a database backup using ' . $mysqldump,
                'output' => $backupProcess->getErrorOutput() . ' ' . $backupProcess->getOutput(),
                'return' => $code,
            ], JSON_PRETTY_PRINT);
            return;
        }

        $backupSize = filesize($targetFile);
        if ($backupSize < 150 * 1024) { // a clean install is ~ 200kb, so we ask for at least 150
            http_response_code(503);

            echo json_encode([
                'success' => false,
                'message' => 'While the backup with ' . $mysqldump . ' did not indicate an error, the mysql backup is only ' . number_format($backupSize / 1024, 0) . 'kb in size, so it probably failed.',
                'output' => $backupProcess->getOutput() . ' ' . $backupProcess->getErrorOutput(),
                'return' => $backupProcess->getExitCode(),
            ], JSON_PRETTY_PRINT);
            return;
        }

        foreach ($this->files as $source) {
            $target = $this->targetDirectory . 'files/';
            $target .= str_replace([MODX_CORE_PATH, MODX_BASE_PATH], ['core/', ''], $source);

            if (!file_exists($source)) {
                $this->modx->log(\modX::LOG_LEVEL_ERROR, '[SiteDashClient] Could not backup file '. $source . ' - it does not exist.');
                continue;
            }

            if (!$this->createDirectory(dirname($target))) {
                $this->modx->log(\modX::LOG_LEVEL_ERROR, '[SiteDashClient] Could not backup file '. $source . ' - tried creating target directory ' . $target . ' but failed.');
                continue;
            }

            if (!copy($source, $target)) {
                $this->modx->log(\modX::LOG_LEVEL_ERROR, '[SiteDashClient] Could not backup file '. $source . ' - copy failed.');
            }
        }

        http_response_code(200);
        echo json_encode([
            'success' => true,
            'directory' => str_replace(MODX_CORE_PATH, '', $this->targetDirectory),
        ], JSON_PRETTY_PRINT);
    }

    private function createDirectory($target)
    {
        if (file_exists($target) && is_dir($target)) {
            return true;
        }
        if (!mkdir($target, 0755, true) && !is_dir($target)) {
            return false;
        }
        return true;
    }
}