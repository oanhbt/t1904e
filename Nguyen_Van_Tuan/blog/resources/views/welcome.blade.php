@extends('layouts.frontend')
@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row align-items-stretch retro-layout-2">
      <div class="col-md-4">
        <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{$lsLastestPost[0]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[0]->title}}</h2>
            <span class="date">{{date('d/M/Y', strtotime($lsLastestPost[0]->created_at))}}</span>
          </div>
        </a>
        <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{$lsLastestPost[1]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[1]->title}}</h2>
            <span class="date">{{date('d/M/Y', strtotime($lsLastestPost[1]->created_at))}}</span>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="single.html" class="h-entry img-5 h-100 gradient" style="background-image: url('{{$lsLastestPost[2]->cover}}');">

          <div class="text">
            <div class="post-categories mb-3">
              <span class="post-category bg-danger">Travel</span>
              <span class="post-category bg-primary">Food</span>
            </div>
            <h2>{{$lsLastestPost[2]->title}}</h2>
            <span class="date">{{date('d/M/Y', strtotime($lsLastestPost[2]->created_at))}}</span>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{$lsLastestPost[3]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[3]->title}}</h2>
            <span class="date">{{date('d/M/Y', strtotime($lsLastestPost[3]->created_at))}}</span>
          </div>
        </a>
        <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{$lsLastestPost[4]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[4]->title}}</h2>
            <span class="date">{{date('d/M/Y', strtotime($lsLastestPost[4]->created_at))}}</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>



<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Recent Posts</h2>
      </div>
    </div>
    <div class="row">

@foreach($lsPost as $post)
      <div class="col-lg-4 mb-4">
        <div class="entry2">
          <a href="single.html"><img src="{{asset('/'.$post->cover)}}" alt="" title=""></a>
          <div class="excerpt">
          <span class="post-category text-white bg-danger mb-3">{{$post->category->name}}</span>

          <h2><a href="single.html">{{$post->title}}</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
            <span>&nbsp;-&nbsp; {{date('d/M/Y h:m:s', strtotime($post->created_at))}}</span>
          </div>

            <p>{{$post->summary}}</p>
            <p><a href="#">Read More</a></p>
          </div>
        </div>
      </div>
  @endforeach

    </div>
    <div class="row text-center pt-5 border-top">
      <div class="col-md-12">
        <div class="custom-pagination">
          {{$lsPost->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
@foreach($lsCategory as $category)
    <div class="row align-items-stretch retro-layout">
      <div class="col-md-6 order-md-2">
        <a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('images/img_4.jpg');">
          <span class="post-category text-white bg-danger">{{$category->name}}</span>
          <div class="text">
            <h2>{{$category->posts()->orderBy('created_at', 'DESC')->first()}}</h2>
            <span>February 12, 2019</span>
          </div>
        </a>
      </div>
    </div>
@endforeach
  </div>
</div>



   <div class="site-section bg-lightx">
     <div class="container">
       <div class="row justify-content-center text-center">
         <div class="col-md-5">
           <div class="subscribe-1 ">
             <h2>Subscribe to our newsletter</h2>
             <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
             <form action="#" class="d-flex">
               <input type="text" class="form-control" placeholder="Enter your email address">
               <input type="submit" class="btn btn-primary" value="Subscribe">
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>



@endsection('content')
