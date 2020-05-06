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

    <form method="post" action="{{route('cate_management.store')}}">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
      </div>

      <!-- <div class="form-group">
        <label for="action">Action</label>
        <input type="text" class="form-control" id="action" name="action" placeholder="Enter action">
      </div> -->

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
@endsection
