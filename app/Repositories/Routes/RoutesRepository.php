<?php

namespace App\Repositories\Routes;

use App\Models\Ruta;
use App\Repositories\BaseRepository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoutesRepository extends BaseRepository{
    private static $instance;
    private function __construct(){

    }
    public static function GetInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getModel()
    {
        return new Ruta();
    }
    /**
     * actualiza una ruta, recibe un modelo de la misma y la info (id y encapsulamiento)
     * @param array $data
     */
    public function updateEncapsulamiento($data){
        DB::table('rutas')
        ->where('id', $data['id'])
        ->update([
            'encapsulamiento' => $data['encapsulamiento']
        ]);
        $rutas = collect(json_decode(cache('rutas')));
        foreach($rutas as $r){
            if($r->id == $data['id']){
                $r->encapsulamiento = $data['encapsulamiento'];
                break;
            }
        }
        Cache::forget('rutas');
        Cache::forever('rutas', json_encode($rutas));
        return true;
    }
}
