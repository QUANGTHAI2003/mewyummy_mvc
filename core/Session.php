<?php

namespace App\Core;
class Session
{
    static public function set($key = '', $value = '')
    {
        if (!empty($key)) {
            return $_SESSION[$key] = $value;
        }
    }

    static public function get($key = '')
    {
        if (!empty($key)) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
            return false; 
        } else {
            return $_SESSION;
        }
    }

    /*
     * delete(key) => Xoá session với key
     * delete() => Xoá hết session
     * */
    static public function delete($key = '')
    {
        if (!empty($key)) {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
        } else {
            session_destroy();
        }
    }

    /*
     * Flash Data
     * - set flash data => giống như set session
     * - get flash data => giống như get session, xoá luôn session sau khi get
     *
     * */
    static public function flash($key = '', $value = '')
    {
        $dataFlash = self::set($key, $value);
        if (empty($value)) {
            self::delete($key);
        }
        return $dataFlash;
    }

    /*
     * Check session
     * */
    static public function has($key = '')
    {
        if (!empty($key)) {
            if (isset($_SESSION[$key])) {
                return true;
            }
            return false;
        } else {
            if (isset($_SESSION)) {
                return true;
            }
            return false;
        }
    }
}