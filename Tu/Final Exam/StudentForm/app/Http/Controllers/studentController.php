<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infomation ;

class studentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255|min:3|unique:infomations',
                'email'=> 'required|max:255|min:3|unique:infomations',
                'telephone' => 'required|max:255|min:3|unique:infomations',

            ]
        );

        $info = new Infomation();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->telephone = $request->telephone;
        $info->feedback = $request->feedback;
        $info->save();
        $status = 1;
        if ( ! $info->save())
        {
           $status = 0;
        }

        $request->session()->flash('success', 'Infomations was updated!');
        return view('notice')->with([
            'status' => $status
        ]);

    }
    public  function index(){
        return redirect()->route('feedback.index');
    }


}
