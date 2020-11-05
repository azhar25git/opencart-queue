<?php
/**
 * events.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/21/20
 */
namespace Queue;
class Events{
    /**
     * @throws \Exception
     */
    public static function wakeup(){
        $db = Registry::get('db');
        if (!$db->connected()){
            $config = Registry::get('config');
            Registry::set('db', new \DB($config->get('db_engine'), $config->get('db_hostname'), $config->get('db_username'), $config->get('db_password'), $config->get('db_database'), $config->get('db_port')));
        }
    }

    /**
     * @throws \Exception
     */
    public static function beforePerform(){
        self::wakeup();
    }

    /**
     * @throws \Exception
     */
    public static function afterPerform(){
        self::wakeup();
    }
}