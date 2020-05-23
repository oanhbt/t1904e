@extends('layouts.app');
@section('content')
<div class="container">Hello </div>
<div class="flag-message">

<p class="alert alert-success">{{Session::get('success')}}</p>
</div>
<a href="{{route('cate_management.create')}}">add new</a>
<table class="table">
    <th>stt</th>
    <th>name</th>
    <th>action</th>
    @foreach ($lsCategory as $cate)

    <tr>
        <td>{{$cate->id}}</td>
        <td>{{$cate->name}}</td>
        <td>
            <a href="{{route('cate_management.edit',$cate->id)}}" class="button">edit</a>
            <form action="{{route('cate_management.destroy',$cate->id)}}"  method="post" onsubmit="confirm('Sure ?')">

            @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete" />

            </form>
        </td>

    </tr>
    @endforeach

</table>
@endsection
