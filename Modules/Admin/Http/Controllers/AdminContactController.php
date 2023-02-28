<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin::contact.index',compact('contacts'));
    }
    public function update($id)
    {
        $contact = Contact::find($id);
        $contact->c_status = $contact->c_status ? 0 : 1;
        $contact->save();
        return redirect()->back()->with('success','Cập nhật thành công');
    }

}
