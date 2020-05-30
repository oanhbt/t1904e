@extends('layouts.app')

@section('content')

<div class="container">

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
     <div class="form-group">
       <label for="name">Name</label>
       <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
     </div>
     <div class="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
     </div>
     <div class="form-group">
       <label for="tel">Telephone</label>
       <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter Telephone">
     </div>
     <div class="form-group">
       <label for="feedback">Feedback</label>
       <textarea name="feedback" id="feedback" cols="30" rows="10" class="form-control"></textarea>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>

   </form>
 </div>

@endsection
