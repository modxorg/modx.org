<?php

class LogRotateProcessor extends modProcessor
{
    public function process()
    {
        $start = microtime(true);

        $run = $this->getProperty('run');

        // check if there is already a scheduled task
        $task = $this->getProperty('task');
        $scheduled = $this->modx->getObject('sTaskRun', array(
            'task' => $task->get('id'),
            'status' => sTaskRun::STATUS_SCHEDULED,
        ));
        if (!$scheduled instanceof sTaskRun) {
            // schedule new run of this task
            $task->schedule('tomorrow 00:00:00', array());
        }

        $logs = glob(MODX_CORE_PATH.'logs/*.log');
        $rotated = 0;
        $errors = 0;

        foreach ($logs as $log) {
            // do not rotate already rotated files
            if(preg_match("/\/[^\.]*\.log$/", $log) !== 1) continue;
            $path_parts = pathinfo($log);

            $suffix = 1;
            $timestamp = strftime('%Y%m%d', strtotime('-1 hour'));
            $rotatedFilename = $path_parts['filename'].'.'.$timestamp.'.'.$path_parts['extension'];

            while (file_exists($path_parts['dirname'].'/'.$rotatedFilename)) {
                $suffix++;
                $rotatedFilename = $path_parts['filename'].'.'.$timestamp.'-'.$suffix.'.'.$path_parts['extension'];
            }

            if (!rename($log, $path_parts['dirname'].'/'.$rotatedFilename)) {
                $errors++;
                $run->addError('Failed to rotate '.$log);
            } else {
                $rotated++;
            }
        }

        return [
            'success' => $errors === 0,
            'message' => "Rotated {$rotated} logs." . ($errors > 0 ? "Failed to rotate {$errors} logs." : '')
        ];
    }
}
