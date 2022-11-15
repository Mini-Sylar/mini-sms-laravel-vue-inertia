<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    //
    function addData(Request $req)
    {
        $contact = new Contact;
        $contact->full_name = $req->input('name');
        $contact->contact_number = $req->input('phone_number');
        // get current user from inertia
        $contact->created_by = $req->user()->name;
        $contact->save();
        // return back();
    }
    function getData()
    {
        $data = Contact::all();
        return inertia('Dashboard', ['contacts' => $data]);
    }

    function deleteData($id)
    {
        Contact::find($id)->delete();
    }
    function updateUser($id)
    {
      

    }
}
