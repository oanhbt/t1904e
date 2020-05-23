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
   <!-- <div class="form-group">
       <label for="email">Email</label>
       <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
     </div>
     <div class="form-group">
        <label for="name">Name</label>
       <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
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

     </div> -->

     <div class="container">
    <div class="row">
        <div class="col-md-3 text-center"><label class="text-dark">Name:</label></div>
        <div class="col-md-7">
            <input class="form-control" id="name" name="name" placeholder="Enter name" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Phone:</label></div>
        <div class="col-md-7">
            <input class="form-control"  id="tel" name="tel" placeholder="Enter phone number" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Email:</label></div>
        <div class="col-md-7">
            <input class="form-control" id="email" name="email" placeholder="Enter email" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center"><label class="text-dark">Feedd Back:</label></div>
        <div class="col-md-7">
            <textarea class="form-control"name="feedback" id="feedback" placeholder="Enter content survey" style="height:130px;"></textarea>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <button class="btn btn-success" onclick=""><i class="fa fa-save mr-1"></i>Submit</button>
        </div>
    </div>


   </form>
 </div>
@endsection
