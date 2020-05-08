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
  <form class="" action="{{route('post_management.update', $post->id)}}" method="post" enctype="multipart/form-data">
    <!-- <input type="hidden" name="_token" value="csrf_token()"> -->
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
      <img src="{{asset('/'.$post->cover)}}" class="img-thumbnail">
      <input type="file" name="file" id="file" value="">
    </div>

    <div class="form-group">
      <label for="name">Title</label>
      <input type="text" name="title" value="{{$post->title}}" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="name">Summary</label>
      <input type="text" name="summary" value="{{$post->summary}}" placeholder="Enter Summary">
    </div>
    <div class="form-group">
      <label for="name">Content</label>
      <textarea name="content" rows="8" cols="80">{{$post->content}}</textarea>
    </div>

    <div class="form-group">
      <label for="name">Category</label>
      <select class="" name="category">
        @foreach($allCategory as $cate)
          <option value="{{$cate->id}}"
              {{$post->category_id == $cate->id ? 'selected' : ''}}
            >{{$cate->name}}</option>
        @endforeach
      </select>
    </div>

        <div class="form-group">
          <label for="name">Active</label>
          <select class="" name="is_active">
            <option value="0" {{$post->is_active == 0 ? 'selected' : ''}}>Draft</option>
            <option value="1" {{$post->is_active == 1 ? 'selected' : ''}}>Publish</option>
          </select>
        </div>


    <button type="submit" name="button">update</button>

  </form>
</div>

@endsection
