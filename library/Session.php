<?php

class Session {

    public static function init() {
        session_set_cookie_params(60*24, '/', '.lipikaar.org');
        session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if (isset($_SESSION[$key]) || !empty($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function destroy() {
        session_destroy();
    }

    public static function destroya($key) {
        unset($_SESSION[$key]);
    }

    public static function forcedestroy() {
        if (isset($_SESSION)) {
            session_destroy();
        }
    }

}
