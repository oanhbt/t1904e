@extends('layouts.app');

@section('content')
<div class="container">

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $er)
        <p>{{$er}}</p>
        @endforeach
    </div>


    @endif

    <form method="post" action="{{route('post_management.store')}}">
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="name" name="title1" placeholder="Enter Title"/>
        </div>

        <div class="form-group">
            <label for="name">Summary</label>
            <input type="text" class="form-control" id="summary" name="summary1" placeholder="Enter Summary">
        </div>
        <div class="form-group">
            <label for="name">Content</label>
            <input type="text" class="form-control" id="content" name="content1" placeholder="Enter Content">
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select name="category_id1" id="category_id">
                @foreach($allCategory as $alc)
                <option value="{{$alc->id}}">{{$alc->name}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="name">Active</label>
            <select name="is_active1" id="is_active">
                <option value="0">draff</option>
                <option value="1">public</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection