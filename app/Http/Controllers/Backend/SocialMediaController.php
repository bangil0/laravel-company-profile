<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialsmedia = SocialMedia::paginate(10);
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
            $request->session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('backend.socialmedia.index');
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
        $socialmedia = SocialMedia::findOrFail($id);
        return view('backend.socialmedia.edit', compact('socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialMediaRequest $request, $id)
    {
        $socialmedia = SocialMedia::find($id)->update($request->all());
        if($socialmedia){
            $request->session()->flash('success', 'Data berhasil di update');
            return redirect()->route('backend.socialmedia.index');
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
        $socialmedia = SocialMedia::findOrFail($id);
        if($socialmedia){
            SocialMedia::find($id)->delete();
            $request->session()->flash('success', 'Data berhasil di hapus');
            return redirect()->route('backend.socialmedia.index');
        }
    }
}
