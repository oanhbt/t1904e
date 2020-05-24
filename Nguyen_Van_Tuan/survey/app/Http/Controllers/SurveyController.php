<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SurveyController extends Controller
{
    public function feedback(Request $request){
        $request->validate(
            [
                'name' => 'required|max:255|min:3|unique:surveys',
                'email'=> 'required|max:255|min:3|unique:surveys',
                'phone' => 'required|max:255|min:3|unique:surveys',

            ]
        );
        $comment = new Survey();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->feedback = $request->feedback;
        $comment->save();
        $status = 0;
        if($comment->save()){
            $status = 1;
        }
        return view('notive')->with([
            'status'=>$status
        ]);
    
      }
}
