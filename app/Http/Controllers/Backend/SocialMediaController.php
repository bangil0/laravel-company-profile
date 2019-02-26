<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\SocialMediaRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\SocialMedia;

class SocialMediaController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $socialsmedia = SocialMedia::all();
        return view('backend.socialmedia.index', compact('socialsmedia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.socialmedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(SocialMediaRequest $request)
    {
        $socialmedia = SocialMedia::create($request->all());
        if($socialmedia){
            $this->flashSuccessCreate();
            return redirect()->route('backend.socialmedia.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(SocialMedia $socialmedia)
    {
        return view('backend.socialmedia.edit', compact('socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(SocialMediaRequest $request, SocialMedia $socialmedia)
    {
        $socialmedia = $socialmedia->update($request->all());

        if($socialmedia){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.socialmedia.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, SocialMedia $socialmedia)
    {
        if($socialmedia->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
