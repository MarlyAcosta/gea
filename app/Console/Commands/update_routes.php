<?php

namespace App\Console\Commands;

use App\Enums\EEncapsulamientoRutas;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use stdClass;

class update_routes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gea:update_routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza las rutas (Solo las rutas) en la tabla de la base de datos, para manejar los permisos y eso';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $app = app();
        $routes = $app->routes->getRoutes();
        foreach($routes as $r){
            $ruta = new stdClass;
            $ruta->ruta_completa = $r->uri;
            $ruta->ruta_nombre = $r->getName();
            $ruta->encapsulamiento = EEncapsulamientoRutas::getIndex(EEncapsulamientoRutas::PUBLICA)->getId();
            $ruta->verbo_http = $r->methods()[0];
            $ruta_existe = DB::table('rutas')->where('ruta_completa', $ruta->ruta_completa)->first();
            if($ruta_existe == null){
                DB::table('rutas')
                ->insert([
                    'ruta_completa' => $ruta->ruta_completa,
                    'ruta_nombre' => $ruta->ruta_nombre,
                    'encapsulamiento' => $ruta->encapsulamiento,
                    'verbo_http' => $ruta->verbo_http
                ]);
            }
        }
        echo "Rutas actualizadas en la base de datos!\n";
        try{
            Cache::forget('rutas');
            $rutas = DB::table('rutas')->get();
            Cache::forever('rutas', json_encode($rutas));
        }catch(Exception $e){
            //No se puede borrar lo que no existe en cache XD
        }
        dd(cache('rutas'));
        echo "Rutas actualizadas en la caché del servidor!\n";
        return 0;
    }
}
