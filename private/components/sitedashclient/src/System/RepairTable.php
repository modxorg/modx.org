<?php

namespace modmore\SiteDashClient\System;

use modmore\SiteDashClient\LoadDataInterface;

class RepairTable implements LoadDataInterface {
    protected $modx;
    protected $params = array();

    public function __construct(\modX $modx, array $params)
    {
        $this->modx = $modx;
        $this->params = $params;
    }

    public function run()
    {
        $class = array_key_exists('class', $this->params) ? (string)$this->params['class'] : false;

        // Transform a class name into a table name
        $name = $this->modx->getTableName($class);
        if (!$name) {
            // .. or use the class as if it were the table name
            $name = '`' . str_replace('`', '``', $class) . '`';
        }

        if ($statusQuery = $this->modx->query('REPAIR TABLE ' . $name)) {
            $results = $statusQuery->fetchAll(\PDO::FETCH_ASSOC);
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'results' => $results,
            ], JSON_PRETTY_PRINT);

            return;
        }

        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Error preparing repair table query for ' . $name,
        ], JSON_PRETTY_PRINT);
    }
}
