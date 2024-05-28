<?php

namespace Core;

class Session
{
    /**
     * Check if a key exists in a session
     * 
     * @param string $key key to be checked
     * @return bool true if key exists, false otherwise
     */
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    /**
     * Put key - value pair into the session
     * 
     * @param string $key name of the value
     * @param string $value value stored under the given key
     */
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get value of a given key from the session
     * 
     * @param string $key name of the value
     * @param string $default default value returned if key doesn't exist
     * @return mixed value od default
     */
    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Put key - value pair into the flash part of the session
     * 
     * The flash part means that it will be deleted after next GET request
     * 
     * @param string $key name of the value
     * @param string $value value stored under the given key
     */
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /**
     * Clear the flash part of the session
     */
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    /**
     * Flush the $_SESSION
     */
    public static function flush()
    {
        $_SESSION = [];
    }

    /**
     * Destroy the session
     */
    public static function destroy()
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
