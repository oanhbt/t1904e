@extends('layouts.app');

@section('content')
<div class="container">

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $er)
        <p>{{$er}}</p>
        @endforeach
    </div>


    @endif

    <form method="post" action="{{route('survey_management.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Name"/>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email1" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone1" placeholder="Enter Phone Number"/>
        </div>

        <div class="form-group">
            <label for="feedback">Feedback</label>
            <textarea rows="6" cols="150" name="feedback1"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
