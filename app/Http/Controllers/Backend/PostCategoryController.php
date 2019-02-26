<?php

namespace App\Http\Controllers\Backend;

use CodeHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\Http\Requests\PostCategoryRequest;
use App\PostCategory;

class PostCategoryController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categorys = PostCategory::all();
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
            $this->flashSuccessCreate();
            return redirect()->route('backend.category.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(PostCategory $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PostCategoryRequest $request, PostCategory $category)
    {
        $request->request->add(['category_slug' => CodeHelper::slug($request->category_name)]);
        $category = $category->update($request->all());

        if($category){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, PostCategory $category)
    {
        if($category->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
