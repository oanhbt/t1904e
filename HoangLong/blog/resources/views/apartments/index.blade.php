@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
</div>
</div>
<div class="row mt-5">
    @foreach($lstApartment as $dt)
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
    <div class="card" style="width:20rem;margin:20px 0 24px 0">
        <img class="card-img-top" src={{$dt->imgUrl}} alt="image" style="width:100%">
        <div class="card-body">
            <h4 class="card-title">{{$dt->name}}</h4>
            <p class="card-text text-bold">Title: <span class="text-success">{{$dt->title}}</span></p><br>
            <p class="card-text text-bold">Thông tin: <span class="text-primary">{{$dt->info}}</span></p><br>
            <p class="card-text text-bold">Thông tin chi tiết: <span class="text-primary">{{$dt->infoDetail}}</span></p><br>
            <p class="card-text text-bold">Trạng thái: <span class="text-primary">Còn có căn hộ cần bán</span></p><br>
            <p class="card-text text-bold">Giá /M2: <span class="text-primary">{{$dt->price}} vnđ</span></p><br>
            <a href="javascript:void(0)" class="btn btn-primary">Xem chi tiết</a>
        </div>
    </div>
</div>
    @endforeach
</div>
<div class="row mt-3">
    {{$lstApartment->links()}}
</div>
</div>
@endsection