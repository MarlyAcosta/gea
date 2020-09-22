<?php

namespace App\Http\Controllers;

use App\Factories\FactoryRepo;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $factory_repo;
    public function __construct()
    {
        $this->factory_repo = FactoryRepo::GetInstance();
    }
    /**
     * 
     */
    public function index(Request $request){
        $Categories = $this->factory_repo::GetRepoInstance('CategoryRepository')->getAll();
        return view('index')->with(compact('Categories'));
    }
}
