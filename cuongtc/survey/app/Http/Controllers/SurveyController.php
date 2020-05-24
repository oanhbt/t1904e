<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSurvey = Survey::paginate(3);
        return view('survey.list')->with(['allSurvey' => $allSurvey]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
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
                   'name1' => 'required|max:255|min:3',
                   'feedback1' => 'required'
                ]);
        $survey = new Survey();
        $survey->name = $request->name1;
        $survey->email = $request->email1;
        $survey->phone = $request->phone1;
        $survey->feedback = $request->feedback1;


        $survey->save();

        $request->session()->flash('success','Survey was successfull');
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
        $survey = Survey::find($id);
        return view('survey.edit')->with(['survey' => $survey]);
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
                   'name1' => 'required|max:255|min:3',
                   'feedback1' => 'required'
                ]);
        $survey = Survey::find($id);
        $survey->name = $request->name1;
        $survey->email = $request->email1;
        $survey->phone = $request->phone1;
        $survey->feedback = $request->feedback1;


        $survey->save();

        $request->session()->flash('success','Survey was updated!');
        return redirect()->route("survey_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $survey = Survey::find($id);
        $survey->delete();
        $request->session()->flash('success','Survey was deleted!');
        return redirect()->route("survey_management.index");
    }

    public function post_survey(Request $request) {

        $request->validate(
                [
                   'name' => 'required|max:255|min:3',
                   'email' => 'required',
                   'phone' => 'required|max:10',
                   'feedback' => 'required'
                ]);

        $survey = new \App\Survey();
        $survey->name = $request->name;
        $survey->email = $request->email;
        $survey->phone = $request->phone;
        $survey->feedback = $request->feedback;

        $survey->save();

        $request->session()->flash('success', 'Survey was successfull');
        return redirect('/');
    }
    public function welcome(){
        return view('welcome');
    }
}
