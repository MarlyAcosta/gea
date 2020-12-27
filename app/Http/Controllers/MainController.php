<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use Illuminate\Http\Request;


/**
 * Por el MainController pasan los roles y la asignación de datos para todos los usuarios
 */
class MainController extends Controller
{
    protected $factory_repo;
    public function __construct()
    {
        $this->factory_repo = FactoryRepo::GetInstance();
    }
    public function index(Request $request){
        $this->factory_repo->GetRepoInstance('UserAuthRepository')->setSessionUserData();
        $roles = collect(json_decode(session('usuario_roles')));
        //Si tiene más de 1 rol asignado
        if(count($roles) > 1){
            return redirect()->route('');
        }
        //Si tiene 1 rol
        return redirect()->route('');
    }
    public function second(Request $request){
        return $request;
    }
    public function vista(){
        return view();
    }
}
