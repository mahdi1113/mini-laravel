<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryControllerApi extends Controller
{
    protected $category;
    protected $request;

    public function __construct() {
        // ایجاد شیء Category و Request در کانستراکتور
        $this->category = new Category();
        $this->request = new \System\Request\Request();
    }

    public function index()
    {
        // استفاده از شیء Category ایجاد شده در کانستراکتور
        $categories = $this->category->allMethod();

        jsonResponse($categories);
    }

    public function store()
    {
        // استفاده از شیء Request ایجاد شده در کانستراکتور
        $r = $this->request->all();

        // استفاده از شیء Category برای ایجاد دسته جدید
        $newCategory = $this->category->createMethod($r);

        if ($newCategory) {
            jsonResponse($newCategory);
        } else {
            header('Content-Type: application/json', true, 404);
            echo json_encode([
                'status' => 'error',
                'message' => 'Category not found.'
            ]);
        }

        exit;
    }
}
