<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\PostCategory;
use CodeHelper;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = PostCategory::paginate(10);
        return view('backend.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        $request->request->add(['category_slug' => CodeHelper::slug($request->category_name)]);
        $category = PostCategory::create($request->all());
        if($category){
            $request->session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('backend.category.index');
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
        $category = PostCategory::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, $id)
    {
        $request->request->add(['category_slug' => CodeHelper::slug($request->category_name)]);
        $category = PostCategory::find($id)->update($request->all());
        if($category){
            $request->session()->flash('success', 'Data berhasil di update');
            return redirect()->route('backend.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = PostCategory::findOrFail($id);
        if($category){
            PostCategory::find($id)->delete();
            $request->session()->flash('success', 'Data berhasil di hapus');
            return redirect()->route('backend.category.index');
        }
    }
}
