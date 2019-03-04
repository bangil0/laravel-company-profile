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

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->contact_name    = $request->contact_name;
        $contact->contact_email   = $request->contact_email;
        $contact->contact_subject = $request->contact_subject;
        $contact->contact_message = $request->contact_message;
        $contact->save();
        
        if($contact){
            return response()->json([
                "status"  => "success",
                "message" => "Pesan telah di kirim",
                "data"    => $request->all(),
            ]);
        } else {
            return response()->json([
                "status"  => "failed",
                "message" => "Pesan gagal di kirim",
                "data"    => $request->all(),
            ]);
        }
    }
}
