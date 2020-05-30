<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsCate = Category::all();
        return view('category.list')->with(['lsCategory'=>$lsCate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');

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
          //truong name ko dc null (required), max 255 ki tu va min 3 ki tu
          //name la duy nhat trong categories (unique)
          'name' => 'required|max:255|min:3|unique:categories'
        ]
      );

      $cate = new Category();
      $cate->name = $request->name; //name 1 trung voi ten trong table con name 2 trung view
      $cate->save();

      $request->session()->flash('success', 'Category was successful!');
      return redirect()->route("cate_management.index");
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
        $cate = Category::find($id);
        return view('category.edit')->with(['cate_'=>$cate]);
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
          //truong name ko dc null (required), max 255 ki tu va min 3 ki tu
          //name la duy nhat trong categories (unique)
          'name' => 'required|max:255|min:3|unique:categories'
        ]
      );

      $cate = Category::find($id);
      $cate->name = $request->name; //name 1 trung voi ten trong table con name 2 trung view
      $cate->save();

      $request->session()->flash('success', 'Category was updated!');
      return redirect()->route("cate_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $cate = Category::find($id);
        $cate->delete();
        $request->session()->flash('success', 'Category was deleted!');
        return redirect()->route("cate_management.index");
    }

    public function post_survey(Request $request){
      $comment = new \App\Survey();
      $comment->post_id = $request->post_id;
      $comment->name = $request->name;
      $comment->email = $request->email;
      $comment->contents = $request->message;
      $comment->status = 1;
      $comment->save();

      return redirect()->back();

    }
}
