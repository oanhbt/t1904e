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

    <form method="post" action="{{route('post_management.update', $post->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Cover Image</label>
        <input type="file" class="form-control" id="file" name="file" >
      </div>

      <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
          value="{{$post->title}}">
      </div>

      <div class="form-group">
        <label for="name">Summary</label>
        <input type="text" class="form-control" id="summary" name="summary" placeholder="Enter summary"
          value="{{$post->summary}}">
      </div>

      <div class="form-group">
        <label for="name">Content</label>
        <textarea rows="6" cols="150" name="content">{{$post->content}}</textarea>
      </div>

      <div class="form-group">
        <label for="name">Category</label>
        <select name="category">
          @foreach($allCategory as $cate)
            <option value="{{$cate->id}}"
                {{$post->category_id == $cate->id ? 'selected' : ''}}
              >{{$cate->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="name">Active</label>
        <select name="is_active">
          <option value="0" {{$post->is_active == 0  ? 'selected' : ''}}>Draft</option>
          <option value="1" {{$post->is_active == 1  ? 'selected' : ''}}>Pubkic</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>

  <script>
    CKEDITOR.replace( 'content' );
  </script>
@endsection
