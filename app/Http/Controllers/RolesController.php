<?php

namespace App\Http\Controllers;

use App\Enums\EHttpStatus;
use App\Factories\FactoryRepo;
use App\Http\Requests\RoleCreate;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $factoryRepo;
    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }
    public function index(Request $request){
        $roles = collect(json_decode(cache('roles'), true));
        return view('roles.index')->with(compact([
            'roles'
        ]));
    }
    public function CreateRole(RoleCreate $request){
        $rol = new Rol;
        $rol->fill($request->all());
        $this->factoryRepo::GetRepoInstance('RolesRepository')->create($rol);
        return back(EHttpStatus::OK);
    }
    public function EditRole(RoleCreate $request){
        $rol = new Rol;
        $this->factoryRepo::GetRepoInstance('RolesRepository')->update($rol, $request);
        return back(EHttpStatus::OK);
    }
    public function AlternateStatus(Request $request){
        $this->factoryRepo::GetRepoInstance('RolesRepository')->alternateStatus($request->id, $request->estado);
        return back(EHttpStatus::OK);
    }
}
