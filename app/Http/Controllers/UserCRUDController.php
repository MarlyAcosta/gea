<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserCRUDController extends Controller
{
    private $factory;
    private array $reposInstances;
    public function __construct()
    {
        $this->factory = FactoryRepo::GetInstance();
    }
    /**
     * @param Request La petición del usuario
     * @return view[usuarios_roles] los usuarios del sistema con sus respectivos roles
     */
    public function index(Request $request){
        $usuarios_roles = $this->factory::GetRepoInstance('UserRepository')->getAllUsersWithRoles();
        return view('accesos.index')->with(compact('usuarios_roles'));
    }
    public function edit(UserEditRequest $request){
        $usuario = new User;
        $this->factory::GetRepoInstance('UserRepository')->update($usuario, $request);
        return back();
    }

    //para actualizar el estado de un usuario
    //is_active= true:false;
    public function toggleUserStatus(Request $request){
        $usuario = new User;
        $this->factory::GetRepoInstance('UserRepository')->update($usuario, $request);
        return back();
    }
    //crea un usuario, sin permisos ni roles
    public function createUser(UserCreateRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $usuario = new User($data);

        $this->factory::GetRepoInstance('UserRepository')->create($usuario);
    }
}
