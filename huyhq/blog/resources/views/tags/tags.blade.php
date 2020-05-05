@extends('layouts.app')
@section('content')
<div class="container">
    <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
     <a href="tags_management/create">Add New</a>
     
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>No.</th>
        @foreach ($lsTags as $tags)
        <tr>
            <td>{{$tags->id}}</td>
            <td>{{$tags->name}}</td>
            <td>
                <a class="button" href="{{route('tags_management.edit', $tags->id)}}" >Edit</a>
                <form method="post" action="{{route('tags_management.destroy', $tags->id)}}" onsubmit="confirm('Sure ?')">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete"/>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

