@extends('layouts.app');
@section('content')


        <div class="container">
            @if(count($errors) >0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $r)
                        <p>{{$r}}</p>
                        @endforeach
                </div>

            @endif
            <form action="{{route('cate_management.update',$cate->id)}}" method="POST">

                @csrf
                <input type="hidden" name="_method"  value="PUT"/>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter-name" value="{{$cate->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <div>----------</div>
            </form>
        </div>
@endsection
