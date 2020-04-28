@extends('layouts.app');
@section('content')
<div class="container">Hello </div>
<div class="flag-message">

<p class="alert alert-success">{{Session::get('success')}}</p>
</div>
<a href="{{route('post_management.create')}}">add new</a>
<table class="table">
    <th>No</th>
    <th>Title</th>
    <th>Sumary</th>
    <th>Category</th>
    <th>count Comments</th>
    <th>action</th>
    @foreach ($allpost as $post )

    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->summary}}</td>
        <td>{{$post->category->name}}</td>
        <td>{{$post->comments->count()}}</td>
        <td>
            <a href="{{route('post_management.edit',$post->id)}}" class="button">edit</a>
            <form action="{{route('post_management.destroy',$post->id)}}"  method="post" onsubmit="confirm('Sure ?')">

            @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" value="Delete" />

            </form>
        </td>

    </tr>
    @endforeach

</table>

    {{$allpost->links()}}
@endsection
