@extends('layouts.app');

@section('content')
 <div class="container">
   @if(count($errors)>0)
   <div class='alert alert-danger'>
     @foreach($errors->all() as $er)
     <p>{{$er}}</P>
       @endforeach
   </div>
   @endif
   <form method="post" action="{{route('post_management.store')}}">
         <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

       @csrf
         <div class="form-group">
           <label for="name">Title</label>
           <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
         </div>

         <div class="form-group">
           <label for="name">Summary</label>
           <input type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary">
         </div>

         <div class="form-group">
           <label for="name">Content</label>
           <textarea name="content" rows="6" cols="140"></textarea>
         </div>

         <div class="form-group">
           <label for="name">Category</label>
           <select class="" name="is_active">
           @foreach($allPost  as $post)
             <option value="{{$post->idea}}">{{$post->name}}</option>
           @endforeach
           </select>
         </div>

         <div class="form-group">
           <label for="name">Active</label>
           <select class="" name="is_active">
             <option value="0">Draft</option>
             <option value="1">Public</option>
           </select>
         </div>
  @endsection
