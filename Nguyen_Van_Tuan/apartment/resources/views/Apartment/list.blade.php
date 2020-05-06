@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-8">
      <div class="links">
          <a class="pl-3 pr-3 border-right" href="home">Home</a>
          <a class="pl-3 pr-3 border-right" href="#">Best Home</a>
          <a class="pl-3 pr-3 border-right" href="#">Life Style</a>
          <a class="pl-3 pr-3 border-right" href="#">About us</a>
          <a class="pl-3 pr-3" href="#">Contact us</a>

      </div>

      <div class="row">
        <h1 class="col-12 m-5">APARTMENT LIST</h1>
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
    <div class="col-md-4 pt-5">
      <input style="width:100%; height:45px; padding:15px;" type="text" placeholder="Search..">
      <div class="list-group">
        <span class="mt-5 mb-2" style="font-weight:bold;">Search By Area</span>
        <a href="#" class="list-group-item">District 1</a>
        <a href="#" class="list-group-item">District 2</a>
        <a href="#" class="list-group-item">District 3</a>
        <a href="#" class="list-group-item">District 4</a>
        <a href="#" class="list-group-item">District 5</a>
      </div>
      <div class="list-group">
        <span class="mt-5 mb-2" style="font-weight:bold;">Search By Price</span>
        <a href="#" class="list-group-item">&lt;10000$</a>
        <a href="#" class="list-group-item">10000 - 15000$</a>
        <a href="#" class="list-group-item">15000 - 30000$</a>
        <a href="#" class="list-group-item">30000 - 50000$</a>
        <a href="#" class="list-group-item">&gt;50000$</a>
      </div>
    </div>
  </div>


</div>

@endsection
