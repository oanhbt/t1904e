@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Survey Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="survey_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Feedback</th>
        <th>Action</th>

        @foreach($allStudent as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->tel}}</td>
            <td>{{$student->feedback}}</td> 
            <td>
                <a class="button" href="{{route('survey_management.edit',$student->id)}}">Edit</a>
                <form method="POST" action="{{ route('survey_management.destroy', $student->id) }}" onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$allStudent->links()}}
</div>

@endsection