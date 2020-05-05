@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Apartment</h1>
    <div class="row">
      @foreach ($lsApart as $apart)
      <div class="col-md-4 p-3">
        <div class="border p-3" style="min-height: 420px; background-color:#efefef;">
          <h2>{{$apart->title}}</h2>
          <p>{{$apart->address}}</p>
          <p>{{$apart->price}}</p>
          <p>{{$apart->summary}}</p>
          <p>{{$apart->content}}</p>
          <p>{{$apart->image}}</p>
          <p>{{$apart->status}}</p>
        </div>
      </div>
      @endforeach
    </div>
{{$lsApart->links()}}
</div>

@endsection
