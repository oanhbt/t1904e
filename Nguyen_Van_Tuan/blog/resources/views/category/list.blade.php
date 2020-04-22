@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Category Manager</h1>
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
    </tr>
    @endforeach;

  </table>
</div>

@endsection
