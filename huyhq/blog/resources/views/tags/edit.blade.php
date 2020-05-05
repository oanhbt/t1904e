@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        <p>{{$err}}</p>
        @endforeach
    </div>
    @endif
    
    <form method="post" action="{{route('tags_management.update', $tags->id)}}">
        @csrf
        <input type="hidden" name="_method" value="PUT"/> <!-- Bởi vì The POST method is not supported for this route. Supported methods: GET, HEAD, PUT, PATCH, DELETE. -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="{{$tags->name}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection