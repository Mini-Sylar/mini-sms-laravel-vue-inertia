<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Group;

class ContactsController extends Controller
{
    //
    function addData(Request $req)
    {
        $contact = new Contact;
        $contact->full_name = $req->input('name');
        $contact->contact_number = $req->input('phone_number');
        $contact->created_by = $req->user()->name;
        $contact->save();
    }
    function getData()
    {
        $data = Contact::all();
        $groups  = Group::all();
        return inertia('Dashboard', ['contacts' => $data,'groups'=>$groups]);
    }

    function deleteData($id)
    {
        Contact::find($id)->delete();
    }
    function updateUser(Request $req)
    {
        //   Find user with id
        $contact = Contact::find($req->input('id'));
        $contact->full_name = $req->input('name');
        $contact->contact_number = $req->input('phone_number');
        $contact->save();
    }
}
