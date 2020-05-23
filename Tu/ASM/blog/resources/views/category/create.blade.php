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
            <form action="{{route('cate_management.store')}}" method="post">
{{--                <input type="hidden" name="token" id="" value="{{cfrs_token}}">--}}
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter-name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <div>----------</div>
            </form>
        </div>
@endsection
