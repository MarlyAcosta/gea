<?php

namespace App\Http\Middleware;

use App\Enums\EEncapsulamientoRutas;
use App\Enums\EPermisosRutas;
use Closure;
use Exception;
use stdClass;

class CheckRolePermission
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
        //La ruta actual
        $rutaValue = $request->path();
        //La lista de rutas de la aplicación
        $rutas = collect(json_decode(cache('rutas')));
        //Los roles del usuario
        $roles = null;
        //tengo la instancia en la BD (cache) de las rutas
        $ruta = $rutas->where('ruta_completa', $rutaValue)->first();
        //Si es una ruta pública, siga derecho

        if($ruta->encapsulamiento == EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId()){
            return $next($request);
        }else{
            //Intenta acceder a una ruta protegida o privada
            try{
                //Rutas asociadas a los roles
                $rutas_roles = collect(json_decode(cache('rutas_roles')));

                //Rutas a las que puede acceder el rol
                $rutas_asequibles = [];
                //Obtiene los roles del usuario en sesión
                $roles = collect(json_decode(session()->get('usuario_roles')));
                //Itera entre roles para saber a qué rutas puede acceder (O qué acciones puede hacer en estas)
                foreach($roles as $r){
                    array_push($rutas_asequibles, $rutas_roles->where('id_rol', $r->id));
                }
                //Bandera para saber si la ruta a la que se dirige, concuerda con alguno de los permisos sobre cierta ruta
                $bandera = false;
                $ruta_accede_a = null;
                foreach($rutas_asequibles as $arr){
                    // [ {r1, r2}, {r4,r5}, {r33}]
                    $ruta_accede_a = $arr->where('id_ruta', $ruta->id)->first();
                    if($ruta_accede_a != null){
                        if($ruta_accede_a->tipo_permiso != EPermisosRutas::getIndex(EPermisosRutas::NINGUNO)->getId()){
                            $bandera = true;
                            break;
                        }
                    }
                }
                if($bandera != true){
                    //Preguntar por el rol antes de seguir navegando
                    return redirect()->route('login');
                }

                //Si el acceso falla, entonces debe autenticarse
            }catch(Exception $e){
                return redirect()->route('login');
            }
            //Si tiene permisos y todo eso, seguirá como si nada
            return $next($request);
        }
    }
}
