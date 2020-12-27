<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use App\Http\Requests\UserEditRequest;
use App\User;
use Illuminate\Http\Request;

class UserCRUDController extends Controller
{
    private $factory;
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
    public function toggleUserStatus(Request $request){

    }
}
