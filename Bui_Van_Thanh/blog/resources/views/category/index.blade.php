@extends('layouts.app')

@section('content')
<div class="container">
<h5>Category manager</h5>
    <div class="row">
        <div class="col-md-12 text-right mb-5">
        <a class="btn btn-success" href="cate_manager/create"><i class="fa fa-plus mr-1"></i>Add new</a>
        </div>
    </div>
    <table class="table">
        <thead class="text-center">
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach( $lsCategory as $dt)
            <tr>
                <td>{{$dt -> id}}</td>
                <td>{{$dt -> name}}</td>
                <td><a href="{{route('cate_manager.edit',$dt -> id)}}"><i class="fa fa-edit text-success mr-2"></i></a>
                <form action="{{route('cate_manager.destroy',$dt -> id)}}" method="POST" onsubmit="confirm('sure?')">
                 @csrf
                <input type="hidden" name="_method" value="DELETE">
                  <input type="submit" value="Delete" class=" text-danger">
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
</div>
@endsection