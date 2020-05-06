@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Category Manager</h1>

    <div class="flash-message">
      <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>

    <!-- <a href="cate_management/create">Add new</a> -->

    <a href="{{route('cate_management.create')}}">Add new</a>

    <table class="table">
      <th>No.</th>
      <th>Name</th>
      <th>Action</th>

      @foreach($lsCategogy as $cate)
      <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->name}}</td>
        <td>
          <a class="button" href="{{ route('cate_management.edit', $cate->id) }}">Edit</a>

          <form method="POST" action="{{ route('cate_management.destroy', $cate->id) }}"
              onsubmit="confirm('Sure ? ')">
            @csrf
            <input type="hidden" name="_method" value="DELETE" />
            <input type="submit" value="Delete" />
          </form>
        </td>
      </tr>
      @endforeach

    </table>
  </div>
@endsection
