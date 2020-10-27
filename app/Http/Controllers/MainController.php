<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $factory_repo;
    public function __construct()
    {
        $this->factory_repo = FactoryRepo::GetInstance();
    }
    public function index(Request $request){
        $this->factory_repo->GetRepoInstance('UserAuthRepository')->setSessionUserData();
        return $request->session()->get('usuario_roles');
    }
    public function second(Request $request){
        return $request;
    }
    public function vista(){
        return view();
    }
}
