@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Post Manager</h1>
<div class="flash-message">
  <p class="alert alert-success">{{Session::get('success')}}</p>
</div>

  <a href="post_management/create">Add new</a>
  <table border="1" cellpadding="5">
    <tr>
      <th>STT</th>
      <th>Title</th>
      <th>Summary</th>
      <th>Category</th>
      <th>Count Comment</th>
      <th>Action</th>
    </tr>
    @foreach ($allPost as $post):
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->summary}}</td>
      <td>{{$post->category->name}}</td>
      <td>{{$post->comment->count()}}</td>
      <td>
        <a class="button" href="{{route('post_management.edit', $post->id)}}">Edit</a>
        <form class="" action="{{route('post_management.destroy', $post->id)}}" method="post" onsubmit="confirm('Sure ? ')">

            @csrf
            <input type="hidden" name="_method" value="delete">
            <input type="submit" name="" value="delete">
        </form>
      </td>
    </tr>
    @endforeach;

  </table>
  {{$allPost->links()}}
</div>

@endsection
