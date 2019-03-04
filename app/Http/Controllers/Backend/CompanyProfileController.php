<?php

namespace App\Http\Controllers\Backend;

use File;
use CodeHelper;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyProfileRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\CompanyProfile as Profile;


class CompanyProfileController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $profile = Profile::first();
        return view('backend.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view("backend.profile.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(CompanyProfileRequest $request, $id)
    {
        $profile = Profile::find($id);

        if($request->has('file')){
            $file_name = Profile::upload($request);
            $request->request->add(['company_logo' => $file_name]);
        }

        $profile = Profile::updateOrCreate(["id"  => $id], [
                                "company_name"    => $request->company_name,
                                "company_phone"   => $request->company_phone,
                                "company_address" => $request->company_address,
                                "company_email"   => $request->company_email,
                                "company_logo"    => !empty($request->company_logo) ? $request->company_logo : $profile->company_logo,
                            ]);

        if($profile){
            $this->flashSuccessCreate();
            return redirect()->back();
        }
    }
}
