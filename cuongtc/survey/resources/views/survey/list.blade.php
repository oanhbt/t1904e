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
        <th>Phone</th>
        <th>Feedback</th>
        <th>Action</th>

        @foreach($allSurvey as $survey)
        <tr>
            <td>{{$survey->id}}</td>
            <td>{{$survey->name}}</td>
            <td>{{$survey->email}}</td>
            <td>{{$survey->phone}}</td>
            <td>{{$survey->feedback}}</td>
            <td>
                <a class="button" href="{{route('survey_management.edit',$survey->id)}}">Edit</a>
                <form method="POST" action="{{ route('survey_management.destroy', $survey->id) }}" onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$allSurvey->links()}}
</div>

@endsection
