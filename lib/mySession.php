<?php

class mySession
{

    public static function init()
    {
        if (! isset($_SESSION)) {
            session_start();
        }
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        self::init();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkLogin()
    {
        self::init(); // Here i stat this session with init method
        if (self::get("adminlogin") == true) {
            header("Location:dashboard.php");
        }
    }

    public static function checksession()
    {
        if (self::get("adminlogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }

    public static function destroy()
    {
       // echo "i think problem is here";
        session_destroy();
        header("Location:login.php");
    }
}


