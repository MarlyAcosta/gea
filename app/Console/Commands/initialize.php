<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gea:initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $rutas = cache('rutas');
        if($rutas == null){
            $rutas_db = DB::table('rutas')->get();
            Cache::forever('rutas', json_encode($rutas_db));
            $rutas = $rutas_db;
        }
        echo "Rutas en caché\n";
        //Almacena los accesos de los roles a ciertas rutas de la aplicación
        $rutas_roles = cache('rutas_roles');
        if($rutas_roles == null){
            $rutas_roles_db = DB::table('rutas_roles')->get();
            Cache::forever('rutas_roles', json_encode($rutas_roles_db));
            $rutas_roles = $rutas_roles_db;
        }
        echo "Rutas-Roles en Caché\n";
        $roles = cache('roles');
        if($roles == null){
            $roles_db = DB::table('roles')->get();
            Cache::forever('roles', json_encode($roles_db));
            $roles = cache('roles');
        }
        echo "Roles en Caché\n";
        $roles_usuario = cache('usuario_roles');
        if($roles_usuario == null){
            $roles_usuario_db = DB::table('usuario_roles')->get();
            Cache::forever('usuario_roles', json_encode($roles_usuario_db));
            $roles_usuario = cache('usuario_roles');
        }
        echo "Roles-Usuario en Caché\n";
        return 0;
    }
}
