<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
Use App\Models\Admin;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Contact;

class HomepageController extends Controller
{
    public function index () {
        $data['posts'] = Post::Where('status' , 1)->paginate(4);
        $admin = Admin::find(1);
        $setting = Setting::find(1);
        $data['pages'] = Page::get();
        return view('Front.index' , $data ,compact('admin' , 'setting'));
    }

    public function post ($id) {
        $post = Post::FindOrFail($id);
        $data['pages'] = Page::get();
        $setting = Setting::find(1);
        return view('Front.post' , $data , compact('post' , 'setting'));
    }
    public function pages ($slug) {
        $page = Page::where('slug' , $slug)->first();
        $data['pages'] = Page::get();
        $setting = Setting::find(1);
        return view('Front.page', $data,compact('page' , 'setting'));
    }
    public function contact() {
        $data['pages'] = Page::get();
        $setting = Setting::find(1);
        return view('Front.contact' , $data , compact('setting'));
    }
    public function contactPost(Request $request) {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Başarılı Bir Şekilde Gönderildi');
    }
}
