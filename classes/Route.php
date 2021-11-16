<?php

class Route {

    public static $validRoutes = array();

    public static function set($route, $function) {

        self::$validRoutes[] = $route;

        print_r(self::$validRoutes);
    }

    public static function get($route, $function) {
        if (in_array($route, self::$validRoutes)){
            echo "Yay";
        }
    }
    

}

