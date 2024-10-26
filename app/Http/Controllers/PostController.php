<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use System\Request\Request;

class PostController extends Controller
{
    protected $post;
    protected $category;
    protected $request;

    public function __construct() {
        // ایجاد تمامی اشیاء مورد نیاز در سازنده
        $this->post = new Post();
        $this->category = new Category();
        $this->request = new Request();
    }

    public function index() {
        $posts = $this->post->allMethod();
        view('admin.post.index', ['posts' => $posts]);
    }

    public function create() {
        $categories = $this->category->allMethod(); 
        view('admin.post.create', ['categories' => $categories]);
    }

    public function store() {
        $r = $this->request->all();
        $this->post->createMethod($r);

        redirect('/post/index');
    }
}
