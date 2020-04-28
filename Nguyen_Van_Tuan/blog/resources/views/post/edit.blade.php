@extends('layouts.app');

@section('content')

<div class="container">
  @if(count($errors) > 0)
    <div class="alert alter-danger">
      @foreach($errors->all() as $er)
        <p>{{$er}}</p>
      @endforeach
    </div>
  @endif
  <form class="" action="{{route('cate_management.update', $cate_->id)}}" method="post">
    <!-- <input type="hidden" name="_token" value="csrf_token()"> -->
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$cate_->name}}" placeholder="Enter Name" value="{{$cate_->name}}">
    <button type="submit" name="button">Update</button>

  </form>
</div>

@endsection
