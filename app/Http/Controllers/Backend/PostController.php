<?php

namespace App\Http\Controllers\Backend;

use File;
use CodeHelper;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\PostCategory as Category;
use App\Post;


class PostController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $category = Category::dropDownCategory();
        return view("backend.post.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PostRequest $request)
    {
        if($request->has('file')){
            $file_name = Post::upload($request);
            $request->request->add(['post_image' => $file_name]);
        }

        $request->request->add(['post_slug' => CodeHelper::slug($request->post_name)]);
        $post = Post::create($request->all());
        if($post){
            $this->flashSuccessCreate();
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {
        $category = Category::dropDownCategory();
        return view('backend.post.edit', compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PostRequest $request, Post $post)
    {
        if($request->has('file')){
            
            // delete file
            if(is_file(Post::IMAGE_PATH.$post->post_image))
                unlink(Post::IMAGE_PATH.$post->post_image);

            $file_name = Post::upload($request);
            $request->request->add(['post_image' => $file_name]);
        }

        $request->request->add(['post_slug' => CodeHelper::slug($request->post_name)]);
        $post->update($request->all());

        if($post){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, Post $post)
    {
        if(is_file(Post::IMAGE_PATH.$post->post_image))
            unlink(Post::IMAGE_PATH.$post->post_image);

        if($post->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
