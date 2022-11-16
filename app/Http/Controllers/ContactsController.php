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
        return inertia('Dashboard', ['contacts' => $data, 'groups' => $groups]);
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

    function sendMessage(Request $req)
    {
        // create array from comma seperated values
        $contacts = rtrim($req->contactsBody, ',');
        $contacts = explode(',', $contacts);
        $message  = $req->message;
        // remove last value in contacts array
        $url = env('MNOTIFY_QUICK_SMS') . '?key=' . env('MNOTIFY_API_KEY');
        $data = [
            'recipient' => $contacts,
            'sender' => env('MNOTIFY_SENDER_ID'),
            'message' => $message,
            'is_schedule' => 'false',
            'schedule_date' => ''
        ];
        // Send Message Here
        $ch = curl_init();
        $headers = array();
        $headers[] = "Content-Type: application/json";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        $result = json_decode($result, TRUE);
        curl_close($ch);
        // // Update Analytics
        // $analytics = analytic::where('user_name', session('user'))->first()->increment('number_of_messages_sent');
        // return back()->with('success', 'Message sent successfully');
    }
}
