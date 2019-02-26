<?php

namespace App\Http\Controllers\Backend;

use CodeHelper;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\Page;

class PageController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pages = Page::all();
        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PageRequest $request)
    {
        $request->request->add(['page_slug' => CodeHelper::slug($request->page_name)]);
        $page = Page::create($request->all());
        if($page){
            $this->flashSuccessCreate();
            return redirect()->route('backend.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Page $page)
    {
        return view('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PageRequest $request, Page $page)
    {
        $request->request->add(['page_slug' => CodeHelper::slug($request->page_name)]);
        $page = $page->update($request->all());

        if($page){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.page.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, Page $page)
    {
        if($page->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
