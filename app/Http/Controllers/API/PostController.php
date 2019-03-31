<?php

namespace App\Http\Controllers\API;

use File;
use CodeHelper;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\PostCategory as Category;
use App\Post;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::paginate(10);
        return response()->json([
            'message' => 'success',
            'data' => $posts
        ]);
    }
}
