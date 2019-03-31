<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->all());   
        if($contact){
            return response()->json([
                "status"  => "success",
                "message" => "Pesan telah di kirim",
                "data"    => $request->all(),
            ]);
        } else {
            return response()->json([
                "status"  => "failed",
                "message" => $validator->failed(),
                "data"    => $request->all(),
            ]);
        }
    }
}
