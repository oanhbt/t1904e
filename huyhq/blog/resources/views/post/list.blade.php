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
        <th>Action</th>
        
        @foreach($allPost as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->summary}}</td>
            <td>{{$post->category->name}}</td>
            <td>{{$post->comments->count()}}</td>
            <td>
                <a class="button" href="{{route('post_management.edit',$post->id)}}">Edit</a>
                <form method="POST" action="{{ route('post_management.destroy', $post->id) }}" onsubmit="confirm('Sure ?')">
                    
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
@endsection


