@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Newest Home</h1>
    <div class="row mt-5">
        @foreach($lsApartment as $apart)
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="card" style="width:20rem;margin:20px 0 24px 0">
                <img class="card-img-top" src={{$apart->cover}} alt="image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">{{$apart->name}}</h4>
                    <p class="card-text text-bold">Address: <span class="text-success">{{$apart->address}}</span></p><br>
                    <p class="card-text text-bold">Information: <span class="text-primary">{{$apart->information}}</span></p><br>
                    <p class="card-text text-bold">Details: <span class="text-primary">{{$apart->details}}</span></p><br>
                    <p class="card-text text-bold">Status: <span class="text-primary">In stock</span></p><br>
                    <p class="card-text text-bold">Price: <span class="text-primary">{{$apart->price}} vnđ/m2</span></p><br>
                    <a href="javascript:void(0)" class="btn btn-primary">Show More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-3">
        {{$lsApartment->links()}}
    </div>
</div>
@endsection
