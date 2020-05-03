@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Category Manager</h1>
<div class="flash-message">
  <p class="alert alert-success">{{Session::get('success')}}</p>
</div>

  <a href="cate_management/create">Add new</a>
  <table>
    <tr>
      <th>STT</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    @foreach ($lsCategory as $cate):
    <tr>
      <td>{{$cate->id}}</td>
      <td>{{$cate->name}}</td>
      <td></td>
      <td>
        <a class="button" href="{{route('cate_management.edit', $cate->id)}}">Edit</a>
        <form class="" action="{{route('cate_management.destroy', $cate->id)}}" method="post" onsubmit="confirm('Sure ? ')">

            @csrf
            <input type="hidden" name="_method" value="delete">
            <input type="submit" name="" value="delete">
        </form>
      </td>
    </tr>
    @endforeach;

  </table>
</div>

@endsection
