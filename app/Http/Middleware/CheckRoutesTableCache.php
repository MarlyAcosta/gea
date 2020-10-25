<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CheckRoutesTableCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Almacena todas la info de las rutas en la BD
        $rutas = cache('rutas');
        if($rutas == null){
            $rutas_db = DB::table('rutas')->get();
            Cache::forever('rutas', json_encode($rutas_db));
            $rutas = $rutas_db;
        }
        //Almacena los accesos de los roles a ciertas rutas de la aplicación
        $rutas_roles = cache('rutas_roles');
        if($rutas_roles == null){
            $rutas_roles_db = DB::table('rutas_roles')->get();
            Cache::forever('rutas_roles', json_encode($rutas_roles_db));
            $rutas_roles = $rutas_roles_db;
        }
        //Siguiente Middleware
        return $next($request);
    }
}
