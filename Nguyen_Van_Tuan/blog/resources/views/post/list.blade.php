@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Post Manager</h1>
<div class="flash-message">
  <p class="alert alert-success">{{Session::get('success')}}</p>
</div>


  <table class="table" border="1" cellpadding="5">
    <a href="{{route('post_management.create')}}">Add new</a>
    <tr class="thead-dark">
      <th>STT</th>
      <th>Images</th>
      <th>Title</th>
      <th>Summary</th>
      <th>Category</th>
      <th>Count Comment</th>
      <th>Active</th>
      <th>Action</th>
    </tr>
    @foreach ($allPost as $post):
    <tr>
      <td>{{$post->id}}</td>
      <td><img src="{{asset('/'.$post->cover)}}" alt="" title=""></td>
      <td>{{$post->title}}</td>
      <td>{{$post->summary}}</td>
      <td>{{$post->category->name}}</td>
      <td>{{$post->comment->count()}}</td>
      <td><span id="status_{{$post->id}}">{{$post->is_active == 1 ? 'Pushlish' : 'Draft'}}</span>

        <form class="" action="{{route('post_management.change', $post->id)}}" method="post" onsubmit="confirm('Sure ? ')">
          @csrf
        <input type="submit" name="" value="Change">
        </form>
        <button id="change_status" type="button" data-id="{{$post->id}}" data-status="{{$post->is_active}}" onclick="changeStatus(this)">ChangeStatus</button>
      </td>
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
<script>
  function changeStatus(element) {
    var _id = $(element).attr("data-id");
    var _status = $(element).data('status');
    var data = {id: _id, status: _status, "_token" : "{{csrf_token()}}"};

    $.ajax({
                     type:'POST',
                     url:'post_management/changeStatus',
                     data: data
                 }).done(function( msg ) {
                   if(msg.status == "OK"){
                     if(_status == 0) {
                        $("#status_" + _id).html("Pushlish");
                        $(element).data('status', 1);
                      } else {
                        $("#status_" + _id).html("Draft");
                        $(element).data('status', 0);
                      }
                   }
                   alert(msg.msg);
                 });
  }
</script>
@endsection
