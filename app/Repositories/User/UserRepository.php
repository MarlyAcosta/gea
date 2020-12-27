<?php

namespace App\Repositories\User;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class UserRepository extends BaseRepository{
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
        return new User();
    }

    /**
     * @return array contiene por row un usuario y los roles del mismo
     */
    public function getAllUsersWithRoles(){

        $roles = DB::table('users')
        ->join('usuario_roles', 'usuario_roles.id_user', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'usuario_roles.id_roles')
        ->select('roles.*', 'usuario_roles.id_user as id_user')
        ->get();
        $usuarios = DB::table('users')->get();
        $retorno = [];
        foreach($usuarios as $u){
            $row = new stdClass;
            $row->usuario = $u;
            $row->roles = $roles->where('id_user', $u->id);
            array_push($retorno, $row);
        }
        return $retorno;
    }
}
