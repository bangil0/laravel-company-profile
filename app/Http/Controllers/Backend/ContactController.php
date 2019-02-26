<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Crudable;
use App\Contact;

class ContactController extends Controller
{

    use Crudable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.contact.create');
    }

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
            $this->flashSuccessCreate();
            return redirect()->route('backend.contact.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Contact $contact)
    {
        return view('backend.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact = $contact->update($request->all());

        if($contact){
            $this->flashSuccessUpdate();
            return redirect()->route('backend.contact.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, Contact $contact)
    {
        if($contact->delete()){
            $this->flashSuccessDelete();
            return redirect()->back();
        }
    }
}
