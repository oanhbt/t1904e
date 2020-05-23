@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $er)
        <p>{{$er}}</p>
        @endforeach
    </div>

    @endif
    
    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <h3 text-align="center">Please Fillout Feedback</h3>
    <form action="{{asset('post_survey')}}" class="p-5 bg-light" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="name">Telephone Number</label>
            <input type="text" class="form-control" id="tel" name="tel">
        </div>
        <div class="form-group">
            <label for="message">Feedback *</label>
            <textarea name="feedback" id="feedback" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Post Survey" class="btn btn-primary">
        </div>
    </form>
</div>

@endsection