<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    protected $category;
    protected $request;

    public function __construct() {
        $this->category = new Category();
        $this->request = new \System\Request\Request();
    }

    public function index() {
        $categories = $this->category->allMethod();        
        view('admin.category.index', ['categories' => $categories]);
    }

    public function create() {
        view('admin.category.create');
    }

    public function store() {
        
        $result = $this->request->all();
        
        $this->category->createMethod($result);

        redirect('/category/index');
    }
}
