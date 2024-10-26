<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Post;

class PostControllerApi extends Controller
{
    protected $post;
    protected $request;

    public function __construct() {
        $this->post = new Post();
        $this->request = new \System\Request\Request();
    }

    public function index()
    {
        $posts = $this->post->allMethod();

        jsonResponse($posts);
    }

    public function store()
    {
        $result = $this->request->all();
        $newPost = $this->post->createMethod($result);

        if ($newPost) {
            jsonResponse($newPost);
        } else {
            jsonResponse([
                'message' => 'Post could not be created.'
            ], 'error', 404);
        }
    }
}
