<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::get();
        return view('Back.pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    {
        $page = new Page;
        $page->name= $request->name;
        $page->content = $request->content;
        $page->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $image = Str::slug($request->name) . rand(0,100) .  '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image);
            $page->image = '/uploads/'. $image;
        }
        $page->save();
        return redirect()->route('admin.sayfalar.index');
    }
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
        $page= Page::find($id);
        return view('Back.pages.edit', compact('page'));
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
        $page = Page::find($id);
        $page->name= $request->name;
        $page->content = $request->content;
        $page->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $image = Str::slug($request->name) . rand(0,100) .  '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image);
            $page->image = '/uploads/'. $image;
        }
        $page->save();
        return redirect()->route('admin.sayfalar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Page::destroy($id);
        return  redirect()->route('admin.sayfalar.index');
    }
    public function destroy($id)
    {
        //
    }
}
