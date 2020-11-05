<?php
/**
 * queue.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/11/20
 */
namespace Queue;
abstract class Queue {

    /**
     * @param $key
     * @return mixed|null
     */
    public function __get($key) {
        return Registry::get($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value) {
        Registry::set($key, $value);
    }

    /**
     * @return mixed
     */
    abstract function perform();
}