<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;

class AdminPanelController extends Controller
{
    public function index () {
        $page = Page::get();
        $post = Post::get();
        return view('Back.index' , compact('page' , 'post'));
    }
}
