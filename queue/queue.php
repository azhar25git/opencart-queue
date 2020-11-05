<?php
/**
 * queue.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/11/20
 */
namespace Queue;
abstract class Queue {

    public function __get($key) {
        return Registry::get($key);
    }

    public function __set($key, $value) {
        Registry::set($key, $value);
    }

    abstract function perform();
}