@extends('layouts.app');

@section('content')
 <div class="container">

   @if(count($errors) > 0)
   <div class='alert alert-danger'>
      @foreach($errors->all() as $er)
      <p>{{$er}}</p>
      @endforeach
   </div>
   @endif

    <form method="post" action="{{route('cate_management.update', $cate_->id)}}">
      <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

    @csrf
    <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"
        placeholder="Enter Name" value="{{$cate_->name}}">
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
  @endsection
