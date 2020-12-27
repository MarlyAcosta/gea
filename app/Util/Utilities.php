<?php

namespace App\Util;

class Utilities{
    public static function getAllRoutes(){
        return app()->routes->getRoutes();
    }
    public static function getAllUserRoles(){
        $roles_usuario = collect(json_decode(session('usuario_roles')));
        return $roles_usuario;
    }
}
