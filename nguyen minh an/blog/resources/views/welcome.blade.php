@extends('layouts.frontend')

@section ('content')

<div class="site-section bg-light">
  <div class="container">
    <div class="row align-items-stretch retro-layout-2">
      <div class="col-md-4">
        <a href="single.html/{{$lsLastestPost[0]->id}}" class="h-entry mb-30 v-height gradient"
        style="background-image: url('{{$lsLastestPost[0]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[0]->tile}}</h2>
            <span class="date">{{$lsLastestPost[0]->created_at}}</span>
          </div>
        </a>
        <a href="single.html/{{$lsLastestPost[1]->id}}" class="h-entry v-height gradient" style="background-image: url('{{$lsLastestPost[1]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[1]->title}}</h2>
            <span class="date">{{$lsLastestPost[1]->created_at}}</span>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="single.html/{{$lsLastestPost[2]->id}}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{$lsLastestPost[2]->cover}}');">

          <div class="text">
            <div class="post-categories mb-3">
              <span class="post-category bg-danger">{{$lsLastestPost[2]->category->name}}</span>
            </div>
            <h2>{{isset($lsLastestPost[2]) ? $lsLastestPost[2]->title : $lsLastestPost[0]->title}}</h2>
            <span class="date">{{$lsLastestPost[2]->created_at}}</span>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="single.html/{{$lsLastestPost[3]->id}}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{$lsLastestPost[3]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[3]->title}}</h2>
            <span class="date">{{$lsLastestPost[3]->created_at}}</span>
          </div>
        </a>
        <a href="single.html/{{$lsLastestPost[4]->id}}" class="h-entry v-height gradient" style="background-image: url('{{$lsLastestPost[4]->cover}}');">

          <div class="text">
            <h2>{{$lsLastestPost[4]->title}}</h2>
            <span class="date">{{$lsLastestPost[4]->created_at}}</span>
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
          <a href="single.html/{{$post->id}}"><img src="{{$post->cover}}" alt="Image" class="img-fluid rounded"></a>
          <div class="excerpt">
          <span class="post-category text-white bg-danger mb-3">{{$post->category->name}}</span>

          <h2><a href="single.html/{{$post->id}}">{{$post->title}}</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
            <span>&nbsp;-&nbsp; {{ date('d M Y', strtotime($post->created_at) )  }}</span>
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

    <div class="row align-items-stretch retro-layout">

      @foreach($lsCategory as $category)
      <div class="col-md-6 order-md-2">
        <a href="single.html/{{$category->posts()->orderBy('created_at', 'DESC')->first()->id}}"
          class="hentry img-2 v-height mb30 gradient"
          style="background-image: url('images/img_4.jpg');">
          <span class="post-category text-white bg-danger">{{$category->name}}</span>
          <div class="text">
            <h2>{{$category->posts()->orderBy('created_at', 'DESC')->first()->title}}</h2>
            <span>February 12, 2019</span>
          </div>
        </a>
      </div>
      @endforeach


    </div>

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

@endsection
