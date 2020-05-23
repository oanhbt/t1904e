<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allStudent = Student::paginate(6);
        return view('student.list')->with(['allStudent' => $allStudent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
        $student = new Student();
        $student->name = $request->name1;
        $student->email = $request->email1;
        $student->tel = $request->tel1;
        $student->feedback = $request->feedback1;


        $student->save();

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
        $student = Student::find($id);
        return view('student.edit')->with(['student' => $student]);
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
        $student = Student::find($id);
        $student->name = $request->name1;
        $student->email = $request->email1;
        $student->tel = $request->tel1;
        $student->feedback = $request->feedback1;


        $student->save();

        $request->session()->flash('success','Survey was successfull');
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
        $student = Student::find($id);
        $student->delete();
        $request->session()->flash('success','Survey was deleted');
        return redirect()->route("survey_management.index");
    }

    public function post_survey(Request $request) {

        $request->validate(
                [
                   'name' => 'required|max:255|min:3',
                   'email' => 'required',
                   'feedback' => 'required'
                ]);

        $student = new \App\Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->feedback = $request->feedback;

        $student->save();

        $request->session()->flash('success', 'Survey was successfull');
        return redirect('/');
    }
    public function welcome(){
        return view('welcome');
    }
}
