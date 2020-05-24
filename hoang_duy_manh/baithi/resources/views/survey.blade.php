@extends('layouts.app')
@section('content')
@if(count($errors) > 0)
  <div class='alert alert-danger'>
     @foreach($errors->all() as $er)
     <p>{{$er}}</p>
     @endforeach
  </div>
  @endif
  <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
   <form method="post" action="{{route('survey_management.store')}}">
     <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

   @csrf
   <div class="container">
  <div class="row">
      <div class="col-md-3 text-center"><label class="text-dark">Name:</label></div>
      <div class="col-md-7">
          <input class="form-control" id="name" name="name"placeholder="Enter name" />
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-3 text-center"><label class="text-dark">Phone:</label></div>
      <div class="col-md-7">
          <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter Telephone"/>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-3 text-center"><label class="text-dark">Email:</label></div>
      <div class="col-md-7">
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"/>
      </div>
  </div>
  <div class="row mt-3">
      <div class="col-md-3 text-center"><label class="text-dark">feedback:</label></div>
      <div class="col-md-7">
          <textarea name="feedback" id="feedback" cols="30" rows="10" class="form-control"></textarea>
      </div>
  </div>
  <div class="row mt-5">
      <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Send</button>
      </div>
  </div>
</div>
@endsection
