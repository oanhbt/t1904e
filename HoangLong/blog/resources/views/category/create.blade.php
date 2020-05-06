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
    <form action="{{route('cate_manager.store')}}" method="POST">
        @csrf
        <div class="form-goup">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="txtNameCreate" placeholder="Enter name" name="name">
        </div>
        <div class="col-md-2 offset-md-5 text-center mt-3">
            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-save mr-1"></i>Save</button>
        </div>
    </form>
</div>

@endsection