<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
{
    //
    function addData(Request $req)
    {
        $contact = new Group;
        $contact->full_name = $req->input('name');
        $contact->contact_number = $req->input('phone_number');
        $contact->created_by = $req->user()->name;
        $contact->save();
    }
    function getData()
    {
        $data = Group::all();
        return inertia('Dashboard', ['contacts' => $data]);
    }

    function deleteData($id)
    {
        Group::find($id)->delete();
    }
    function updateUser(Request $req)
    {
        //   Find user with id
        $contact = Group::find($req->input('id'));
        $contact->full_name = $req->input('name');
        $contact->contact_number = $req->input('phone_number');
        $contact->save();
    }
}
