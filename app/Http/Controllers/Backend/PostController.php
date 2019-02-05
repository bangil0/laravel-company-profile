<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\PostCategory as Category;
use CodeHelper;
use File;

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
            $file_name = Post::upload($request->file('file'));
            $request->request->add(['post_image' => $file_name]);
        }

        $request->request->add(['post_slug' => CodeHelper::slug($request->post_name)]);
        $post = Post::create($request->all());
        if($post){
            $request->session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post     = Post::findOrFail($id);
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
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

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
            $request->session()->flash('success', 'Data berhasil di update');
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post){
            Post::find($id)->delete();
            $request->session()->flash('success', 'Data berhasil di hapus');
            return redirect()->route('backend.post.index');
        }
    }
}
