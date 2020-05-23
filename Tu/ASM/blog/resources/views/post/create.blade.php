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
            <form action="{{route('post_management.store')}}" method="post">
{{--                <input type="hidden" name="token" id="" value="{{cfrs_token}}">--}}
                @csrf

                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter-name">
                </div>
                <div class="form-group">
                    <label for="name">Summary</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter-name">
                </div>
                <div class="form-group">
                    <label for="name">Content</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter-name">
                </div>
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="is_active" id="">
                    @foreach($allCategory as $alc)
                            <option value="{{$alc->idea}}">{{$alc->name}}</option>
                    @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <label for="name">Active</label>
                    <select name="is_active" id="">
                        <option value="0">draff</option>
                        <option value="1">public</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <div>----------</div>
            </form>
        </div>
@endsection
