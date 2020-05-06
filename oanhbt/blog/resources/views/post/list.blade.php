@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Post Manager</h1>

    <div class="flash-message">
      <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>

    <!-- <a href="cate_management/create">Add new</a> -->

    <a href="{{route('post_management.create')}}">Add new</a>

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
          {{$post->is_active == 1 ? 'Pushlish' : 'Draft'}}

          <form method="POST" action="{{ route('post_management.change', $post->id) }}"
              onsubmit="confirm('Sure ? ')">
            @csrf
            <input type="submit" value="Change" />
          </form>

          <button id="change_status"
                  data-id="{{$post->id}}" data-status="{{$post->is_active}}"
                  onclick="changeStatus(this)">ChangeStatus</button>
        </td>
        <td>
          <a class="button" href="{{ route('post_management.edit', $post->id) }}">Edit</a>

          <form method="POST" action="{{ route('post_management.destroy', $post->id) }}"
              onsubmit="confirm('Sure ? ')">
            @csrf
            <input type="hidden" name="_method" value="DELETE" />
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

      $.post('api/post_management/changeStatus',
            {id: _id, status: _status}, 
            function(data) {
          alert('OK');
      });
    }
  </script>
@endsection
