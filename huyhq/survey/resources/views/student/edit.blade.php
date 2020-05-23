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

    <form method="post" action="{{route('survey_management.update',$student->id)}}" enctype="multipart/form-data"> <!-- Phải có entype để có thể nhận dạng file đưa lên -->
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Name" value="{{$student->name}}"/>
        </div>

        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email1" placeholder="Enter Email" value="{{$student->email}}">
        </div>

        <div class="form-group">
            <label for="name">Telephone Number</label>
            <input type="text" class="form-control" id="tel" name="tel1" placeholder="Enter Telephone Number" value="{{$student->tel}}"/>
        </div>

        <div class="form-group">
            <label for="name">Feedback</label>
            <textarea rows="6" cols="150" name="feedback1">{{$student->feedback}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

