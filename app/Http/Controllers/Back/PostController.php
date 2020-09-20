<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::OrderBy('id' , 'DESC')->get();
        return view('Back.posts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->name= $request->name;
        $post->content = $request->content;
        $post->status = $request->status;
        if ($request->hasFile('image')) {
            $image = Str::slug($request->name) . rand(0,100) .  '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image);
            $post->image = '/uploads/'. $image;
        }
        $post->save();
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('Back.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->name= $request->name;
        $post->content = $request->content;
        $post->status = $request->status;
        if ($request->hasFile('image')) {
            $image = Str::slug($request->name) . rand(0,100) .  '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image);
            $post->image = '/uploads/'. $image;
        }
        $post->save();
        return redirect()->route('admin.makaleler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id) {
        Post::destroy($id);
        return redirect()->route('admin.makaleler.index');
    }

    public function destroy($id)
    {
        //
    }
}
