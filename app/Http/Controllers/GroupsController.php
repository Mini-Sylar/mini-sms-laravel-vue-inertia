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
        $contact->group_name = $req->input('group_name');
        $contact->contact_number = $req->input('phone_numbers');
        $contact->created_by = $req->user()->name;
        $contact->save();
    }

    function deleteData($id)
    {
        Group::find($id)->delete();
    }
    function updateUser(Request $req)
    {
        //   Find user with id
        $contact = Group::find($req->input('id'));
        $contact->group_name = $req->input('group_name');
        $contact->contact_number = $req->input('phone_numbers');
        $contact->save();
    }
}
