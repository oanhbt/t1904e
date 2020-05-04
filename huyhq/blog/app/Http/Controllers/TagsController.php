<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsTags = Tag::all(); 
        return view('tags.tags')->with(['lsTags' => $lsTags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
                [
                   'name1' => 'required|max: 256|min:2'
                ]);
        
        $tags = new Tag();
        $tags->name = $request->name1;
        $tags->save();
        
        $request->session()->flash('success','Tag was successfull');
        return redirect()->route("tags_management.index");
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
        $tags = Tag::find($id);
        return view('tags.edit')->with(['tags'=>$tags]);
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
        $request->validate(
                [
                    'name1' => 'required|max:256|min:2'
                ]);
        
        $tags = Tag::find($id);
        $tags->name = $request->name1;
        $tags->save();
        
        $request->session()->flash('success','Tag was updated');
        return redirect()->route('tags_management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $tags = Tag::find($id);
        $tags->delete();
        $request->session()->flash('success', 'Tag was deleted');
        return redirect()->route('tags_management.index');
    }
}
