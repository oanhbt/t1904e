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

    <form method="post" action="{{route('post_management.store')}}">
      @csrf
      <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
      </div>

      <div class="form-group">
        <label for="name">Summary</label>
        <input type="text" class="form-control" id="summary" name="summary" placeholder="Enter summary">
      </div>

      <div class="form-group">
        <label for="name">Content</label>
        <textarea rows="6" cols="150" name="content"></textarea>
      </div>

      <div class="form-group">
        <label for="name">Category</label>
        <select name="is_active">
          @foreach($allCategory as $cate)
            <option value="{{$cate->idea}}">{{$cate->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="name">Active</label>
        <select name="is_active">
          <option value="0">Draft</option>
          <option value="1">Pubkic</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
@endsection
