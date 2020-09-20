<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index() {
        return view('Back.AdminAuth.index');
    }
    public function indexPost (Request $request) {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return  redirect()->route('admin.panel');
        }else {
            return redirect()-> route('admin.giris')->withErrors('hatalı şifre yada email');
        }
    }
    public function indexLogout () {
        Auth::logout();
        return redirect()->route('admin.giris');
    }
}
