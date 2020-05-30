@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Post Management</h1>

        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>

        <a href="post_management/create">Add New</a>
        <table class="table">
        <th>No.</th>
        <th>Title</th>
        <th>Summary</th>
        <th>Category</th>
        <th>Count comment</th>
        <th>Status</th>
        <th>Action</th>

        @foreach($allPost as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->summary}}</td>
            <td>{{$post->category->name}}</td>
            <td>{{$post->comments->count()}}</td>

            <td>
              <span id="status_{{$post->id}}">
              {{$post->is_active == 1 ? 'Publish' : 'Draft'}}
            </span>


              <form method="POST" action="{{ route('post_management.change', $post->id) }}"
                onsubmit="confirm('Sure ?')">

                  @csrf

                  <input type="submit" value="Change" />
              </form>

              <button id="change_status" data-id="{{$post->id}}" data-status="{{$post->is_active}}"
                 onclick="changeStatus(this)">ChangeStatus</button>
            </td>
            <td>
                <a class="button" href="{{route('post_management.edit',$post->id)}}">Edit</a>
                <form method="POST" action="{{ route('post_management.destroy', $post->id) }}"
                  onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
            </tr>
            @endforeach
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
                     if(_status == 0){
                       $("#status_" + _id).html("Publish");
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
