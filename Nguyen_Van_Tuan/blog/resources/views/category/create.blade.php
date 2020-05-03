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
  <form class="" action="{{route('cate_management.store')}}" method="post">
    <!-- <input type="hidden" name="_token" value="csrf_token()"> -->
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="" placeholder="Enter Name">
    <button type="submit" name="button">submit</button>

  </form>
</div>

@endsection
