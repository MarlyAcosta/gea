<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreate;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $cat_repo;
    public function __construct(CategoryRepository $CatRepo)
    {
        $this->cat_repo = $CatRepo;
    }
    public function index(Request $request){
        $Categories = $this->cat_repo->getAll();
        return view('index')->with(compact('Categories'));
    }
}
