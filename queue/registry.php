<?php
/**
 * registry.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/11/20
 */
namespace Queue;
final class Registry
{
    static private $store = array();

    /**
     *
     *
     * @param string $key
     *
     * @return    mixed
     */
    public static function get($key)
    {
        return (isset(self::$store[$key]) ? self::$store[$key] : null);
    }

    /**
     *
     *
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        self::$store[$key] = $value;
    }

    /**
     *
     *
     * @param string $key
     *
     * @return    bool
     */
    public static function has($key)
    {
        return isset(self::$store[$key]);
    }
}