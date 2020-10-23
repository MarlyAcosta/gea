<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CheckRoleTablesCache
{
    /**
     * Verifica la existencia de las tablas Roles y Usuario_Roles en el servidor
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = cache('roles');
        if($roles == null){
            $roles_db = DB::table('roles')->get();
            Cache::forever('roles', $roles_db);
            $roles = cache('roles');
        }
        $roles_usuario = cache('usuario_roles');
        if($roles_usuario == null){
            $roles_usuario_db = DB::table('usuario_roles')->get();
            Cache::forever('usuario_roles', $roles_usuario_db);
            $roles_usuario = cache('usuario_roles');
        }
        return $next($request);
    }
}
