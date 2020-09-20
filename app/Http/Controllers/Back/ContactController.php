<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index (){
        $data['contacts'] = Contact::get();
        return view('Back.contact' , $data);
    }
    public function delete ($id) {
        Contact::destroy($id);
        return redirect()->route('admin.contact');
    }
    public function contactRead ($id) {
        $contact = Contact::find($id);
        return view('Back.contactRead' , compact('contact'));
    }
    public function contactPost($id , Request $request) {
        $contact = Contact::find($id);
        $contact->status = $request->status;
        $contact->save();
        return redirect()->route('admin.contact');
    }
}
