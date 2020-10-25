<?php

namespace App\Util;

class Utilities{
    public static function getAllRoutes(){
        return app()->routes->getRoutes();
    }
}
