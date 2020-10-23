<?php

namespace App\Repositories\User;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserAuthRepository extends BaseRepository{
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
        return new Category();
    }
    public function setSessionUserData(){
        $this->setRolesToUser();
    }
    private function setRolesToUser(){
        $user_id = Auth::id();
        $roles = DB::table('users')
        ->join('usuario_roles', 'usuario_roles.id_user', 'users.id')
        ->join('roles', 'roles.id', 'usuario_roles.id_rol')
        ->where('usuario_roles.id_user', $user_id)
        ->select('roles.id', 'roles.descripcion', 'roles.nombre')
        ->get();
        Session::put('usuario_roles', json_encode($roles));
    }
}
