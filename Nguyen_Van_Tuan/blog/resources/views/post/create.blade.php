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
  <form method="post" action="{{route('post_management.store')}}"  enctype="multipart/form-data">
    <!-- <input type="hidden" name="_token" value="csrf_token()"> -->
    @csrf
    <div class="form-group">
      <label for="name">Cover Image</label>
      <input type="file" name="file" id="file" value="">
    </div>

    <div class="form-group">
      <label for="name">Title</label>
      <input type="text" name="title" value="" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="name">Summary</label>
      <input type="text" name="summary" value="" placeholder="Enter Summary">
    </div>
    <div class="form-group">
      <label for="name">Content</label>
      <textarea name="content" rows="8" cols="80"></textarea>
    </div>

    <div class="form-group">
      <label for="name">Category</label>
      <select class="" name="category">
        @foreach($allCategory as $cate)
          <option value="{{$cate->id}}">{{$cate->name}}</option>
        @endforeach
      </select>
    </div>

        <div class="form-group">
          <label for="name">Active</label>
          <select class="" name="is_active">
            <option value="0">Draft</option>
            <option value="1">Publish</option>
          </select>
        </div>


    <button type="submit" name="button">submit</button>

  </form>
</div>
<script>
  CKEDITOR.replace( 'content' );
</script>
@endsection
