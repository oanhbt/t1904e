@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-9" style="margin-top: 10px">



            <div class="row">

                @foreach($lsApartment as $apt) 
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">

                        <img class="card-img-top" src="image/{{$apt->image}}" alt="grass">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{$apt->name}}</a>
                            </h4>
                            <h5><strong>Price: </strong>{{$apt->price}}$</h5>
                            <h6><strong>Address: </strong>{{$apt->address}}</h6>
                            <p class="card-text"><strong>Summary: </strong>{{$apt->summary}}</p>
                            <p class="card-text"><strong>Detail: </strong>{{$apt->detail}}</p>
                        </div>
                        <div class="card-footer">
                            <p><strong>Status: </strong>{{$apt->status}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

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
        <!-- /.col-lg-3 -->



    </div>
    <!-- /.row -->
    {{$lsApartment->links()}}
</div>
@endsection

