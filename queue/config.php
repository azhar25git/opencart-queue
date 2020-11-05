<?php
/**
 * config.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 11/6/20
 */

//Queue setting
return [
    'redis_backend' => 'localhost:6379',
    'redis_db' => 10,
    'redis_prefix' => 'opencart_',
    'queue_count' => 1,
    'queue_interval' => 50,
    'queue_worker' => '*',
    'queue_vverbose' => 1,
    'queue_logging' => 1,
];