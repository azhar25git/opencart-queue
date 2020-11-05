<?php
/**
 * requeue.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/8/20
 */
namespace Queue;

// Load autoload
require 'vendor/autoload.php';


class Requeue {
    /**
     * Requeue constructor.
     */
    public function __construct()
    {
        $config = new \Config();
        $settings = include dirname(__FILE__) . '/config.php';
        foreach ($settings as $key => $setting){
            $config->set($key, $setting);
        }

        \Resque_Redis::prefix($config->get('redis_prefix'));
        \Resque::setBackend($config->get('redis_backend'), $config->get('redis_db'));

    }

    /**
     * @param string $queueName
     * @param string $className
     * @param array $args
     * @param bool $trackStatus
     * @return bool|string
     */
    public function enqueue(string $queueName, string $className, array $args = [], bool $trackStatus = false)
    {
        return \Resque::enqueue($queueName, $className, $args, $trackStatus);
    }

    /**
     * @param string $queueName
     * @param array $args
     * @return int
     */
    public function dequeue(string $queueName, array $args = [])
    {
        return \Resque::dequeue($queueName, $args);
    }

    /**
     * @param string $token
     * @return Resque_Job_Status
     */
    public function trackQueue(string $token)
    {
        return new \Resque_Job_Status($token);
    }

    /**
     * @return array
     */
    public function getQueues()
    {
        return \Resque::queues();
    }

    /**
     * @return array
     */
    public function getWorkers()
    {
        return \Resque_Worker::all();
    }
}