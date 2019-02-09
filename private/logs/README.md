# Logs

Files in the `/private/logs` folder will be ignored in the repository.

## Log rotate

There is a Processor-based MODX Scheduler task located in `/private/components/sedadigital/processors/scheduler/logrotate.class.php` which can be used to do a daily log rotation. You just need to add the task and activate it.
