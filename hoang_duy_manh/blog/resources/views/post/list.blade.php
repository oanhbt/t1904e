@extends('layouts.app')

@section('content')
 <div class="container">
  <h1> post manager</h1>
  <div class="flash-message">
    <p class="alert alert-success">{{Session::get('success')}}</p>
  </div>
  <a href="post_management/create">ADD</a>
  <table class="table">
      <th>No.</th>
      <th>Title</th>
      <th>Summary</th>
      <th>Action</th>
    @foreach($allpost as $post)


      <tr>
         <td>{{$post->id}}</td>
           <td>{{$post->title}}</td>
           <td>{{$post->Summary}}</td>
             <td>
               <a class="button" href="{{route('post_management.edit',$post->id)}}">edit</a>
               <form method="POST" action="{{route('post_management.destroy',$post->id)}}"
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
