<?php

namespace modmore\SiteDashClient\System;

use modmore\SiteDashClient\LoadDataInterface;

class DatabaseCheck implements LoadDataInterface {
    protected $modx;

    public function __construct(\modX $modx)
    {
        $this->modx = $modx;
    }

    public function run()
    {
        $database = $this->modx->connection->config['dbname'];
        if (!$query = $this->modx->query('SELECT * FROM information_schema.tables WHERE table_schema = ' . $this->modx->quote($database))) {
            http_response_code(503);
            echo json_encode([
                'success' => false,
                'message' => 'Could not prepare query to list tables.',
            ], JSON_PRETTY_PRINT);
            return;
        }

        $return = [
            'success' => true,
        ];
        $tables = [];

        while ($r = $query->fetch(\PDO::FETCH_ASSOC)) {
            $tables[$r['TABLE_NAME']] = [
                'engine' => $r['ENGINE'],
                'rows' => $r['TABLE_ROWS'],
                'collation' => $r['TABLE_COLLATION'],
                'status' => [],
                'columns' => [],
            ];
        }

        // Add additional information (CHECK TABLE output and collations for each columns)
        foreach ($tables as $name => $info) {
            if ($statusQuery = $this->modx->query('CHECK TABLE `' . $name . '`')) {
                $status = $statusQuery->fetchAll(\PDO::FETCH_ASSOC);
                $status = array_map(function($status) {
                    return [$status['Msg_type'] => $status['Msg_text']];
                }, $status);
                $tables[$name]['status'] = $status;
            }

            if ($columnsQuery = $this->modx->query('SHOW FULL COLUMNS FROM `' . $name . '`')) {
                $columns = $columnsQuery->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($columns as $col) {
                    if ($col['Collation'] !== null) {
                        $tables[$name]['columns'][$col['Field']] = [
                            'type' => $col['Type'],
                            'collation' => $col['Collation'],
                        ];
                    }
                }
            }
        }

        $return['tables'] = $tables;

        http_response_code(200);
        echo json_encode($return, JSON_PRETTY_PRINT);
    }
}