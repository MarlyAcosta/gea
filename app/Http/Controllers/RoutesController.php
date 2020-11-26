<?php

namespace App\Http\Controllers;

use App\Enums\EHttpStatus;
use App\Factories\FactoryRepo;
use App\Models\Ruta;
use App\Repositories\Routes\RoutesRepository;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    protected $res = ['status' => EHttpStatus::OK];
    protected $factoryRepo;
    public function __construct()
    {
        $this->factoryRepo = FactoryRepo::GetInstance();
    }
    public function index(Request $request){
        $rutas = $this->factoryRepo::getRepoInstance('RoutesRepository')->getAll();
        return view('routes.index')->with(compact([
            'rutas'
        ]));
    }
    public function cambiarEncapsulamientoRuta(Request $request){
        //$ruta = new Ruta();
        $data = $request->all();
        $this->factoryRepo::getRepoInstance('RoutesRepository')->updateEncapsulamiento($data);
        return response()->json($this->res);
    }

}
