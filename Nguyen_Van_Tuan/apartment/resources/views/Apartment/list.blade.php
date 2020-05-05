@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Apartment</h1>
    <div class="row">
      @foreach ($lsApart as $apart)
      <div class="col-md-4 p-3">
        <div class="border p-3" style="min-height: 570px; background-color:#efefef;">
          <p>
            <img src="images/nha.jpg" alt="" style="max-width:100%;">
          </p>
          <h2>{{$apart->title}}</h2>
          <p><strong>Địa chỉ:</strong> {{$apart->address}}</p>
          <p><strong>Giá bán:</strong> {{$apart->price}}</p>
          <p><strong><i>Sơ lược:</i></strong> {{$apart->summary}}</p>
          <p><strong><i>Chi tiết:</i></strong> {{$apart->content}}</p>
          <p><strong><i>Trạng thái:</i></strong> {{$apart->status}}</p>
        </div>
      </div>
      @endforeach
    </div>
{{$lsApart->links()}}
</div>

@endsection
