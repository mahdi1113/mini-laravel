<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{

    public function index(){
        view('app.index');
    }

    public function create(){
        echo "create method in HomeController";
        view('app.create');
    }
    public function store(){
        echo "store method in HomeController";
    }
    public function edit($id){
        echo "edit method in HomeController";
    }
    public function update($id){
        echo "update method in HomeController";
    }
    public function destroy($id){
        echo "destroy method in HomeController";
    }

}