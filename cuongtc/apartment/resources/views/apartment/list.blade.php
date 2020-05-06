@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Apartment</h1>
    <div class="row">

      <div class="col-lg-9" style="margin-top: 15px">

        <div class="row">
          @foreach ($lsApart as $apart)
          <div class="col-md-4 p-3">
            <div class="border p-3" style="min-height: 480px; background-color:#efefef;">
              <p>
                <img src="images/apart.jpg" alt="" style="max-width:100%">
              </p>
              <h2>{{$apart->name}}</h2>
              <p><strong>Địa chỉ: </strong>{{$apart->address}}</p>
              <p><strong>Giá bán: </strong>{{$apart->price}}</p>
              <p><strong>Sơ lược: </strong>{{$apart->general_information}}</p>
              <p><strong>Chi tiết: </strong>{{$apart->detail_information}}</p>
              <p><strong>Trạng thái: </strong>{{$apart->status}}</p>
            </div>
          </div>
          @endforeach
        </div>

      </div>

      <div class="col-lg-3">

        <h4 class="my-4">Search By Area</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">District 1</a>
                <a href="#" class="list-group-item">District 2</a>
                <a href="#" class="list-group-item">District 3</a>
                <a href="#" class="list-group-item">District 4</a>
                <a href="#" class="list-group-item">District 5</a>
            </div>
            <h4 class="my-4">Search By Price</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">< 10000$</a>
                <a href="#" class="list-group-item">10000$ - 15000$</a>
                <a href="#" class="list-group-item">15000$ - 30000$</a>
                <a href="#" class="list-group-item">30000$ - 50000$</a>
                <a href="#" class="list-group-item">> 50000$</a>
            </div>

      </div>

    </div>
{{$lsApart->links()}}
</div>

@endsection
