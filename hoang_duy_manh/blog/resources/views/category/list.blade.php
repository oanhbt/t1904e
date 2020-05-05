@extends('layouts.app')

@section('content')
 <div class="container">
  <h1> category manager</h1>
  <div class="flash-message">
    <p class="alert alert-success">{{Session::get('success')}}</p>
  </div>
  <a href="cate_management/create">ADD</a>
  <table class="table">
      <th>No.</th>
      <th>Name</th>
      <th>action</th>
    @foreach($lsCategory as $cate)


      <tr>
         <td>{{$cate->id}}</td>
           <td>{{$cate->name}}</td>
             <td>
               <a class="button" href="{{route('cate_management.edit',$cate->id)}}">edit</a>
               <form method="POST" action="{{route('cate_management.destroy',$cate->id)}}"
                 onsubmit="confirm('sure ?')">
                 @csrf
                 <input type="hidden" name="_method" value="DELETE" />
                 <input type="submit" value="Delete" />
               </form>
             </td>
           </tr>
    @endforeach
  </table>
  </div>
  @endsection
