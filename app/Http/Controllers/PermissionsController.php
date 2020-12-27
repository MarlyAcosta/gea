<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Util\Utilities;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    protected $fR;
    public function __construct()
    {
        $this->fR = FactoryRepo::GetInstance();
    }
    public function index(Request $request){
        $permisos_roles = $this->fR::GetRepoInstance('PermissionsRepository')->getAll();
        return view('permisos.index')->with(compact('permisos_roles'));
    }

    /**
     * @param Request La petición del usuario
     * Muestra los roles que tiene un usuario asignado al perfil para que escoja a qué index dirigirse
     * @return view[permisos_roles_usuario => {}]
     */
    public function indexRolesUsuario(Request $request){
        $permisos_roles_usuario = Utilities::getAllUserRoles();
        return view('')->with(compact('permisos_roles_usuario'));
    }

}
