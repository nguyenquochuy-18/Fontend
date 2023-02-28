<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ContacController extends Controller
{
    public function getContact()
    {
        return view('contact');
    }
    public function saveContact(Request $request)
    {
//        $data = $request->except('_token');
//        $data['update_at'] = $data['created_at'] = Carbon::now();
//        Contact::insert($data);

        $contact = new Contact();
        $contact->c_name = $request->c_name;
        $contact->c_email = $request->c_email;
        $contact->c_title = $request->c_title;
        $contact->c_content = $request->c_content;
        $contact->save();
        return redirect()->back();
    }
}
