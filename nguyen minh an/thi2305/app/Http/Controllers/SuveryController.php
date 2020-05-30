<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SuveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $lsSurvey=Survey::all();
        return view ('survey')->with(['lsSurvey'=>$lsSurvey]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

          'name' => 'required|max:255|min:3|unique:surveys'
        ]
      );

      $survey = new Survey();
      $survey->name = $request->name;
      $survey->email = $request->email;
      $survey->tel = $request->tel;
      $survey->feedback = $request->feedback;
      $survey->save();

      $request->session()->flash('success', 'successful!');
      return redirect()->route("survey_management.index");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
