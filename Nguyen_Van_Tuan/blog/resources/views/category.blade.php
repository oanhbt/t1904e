@extends('layouts.frontend')

@section('content')

<div class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <span>Category</span>
        <h3>Sports</h3>
        <p>Category description here.. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error eius quo, officiis non maxime quos reiciendis perferendis doloremque maiores!</p>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-white">
  <div class="container">
    <div class="row">
@if(count($lsPost) == 0)
<h2>Trong</h2>
@endif
@foreach($lsPost as $post)
      <div class="col-lg-4 mb-4">
        <div class="entry2">
          <a href="single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
          <div class="excerpt">
          <span class="post-category text-white bg-danger mb-3">{{$post->category->name}}</span>

          <h2><a href="single.html/{{$post->id}}">{{$post->title}}</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
            <span>&nbsp;-&nbsp; {{$post->created_at}}</span>
          </div>

            <p>{{$post->summary}}</p>
            <p><a href="#single.html/{{$post->id}}">Read More</a></p>
          </div>
        </div>
      </div>


@endforeach


    </div>
    <div class="row text-center pt-5 border-top">
      <div class="col-md-12">
        <div class="custom-pagination">
          <span>1</span>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <span>...</span>
          <a href="#">15</a>
        </div>
      </div>
  </div>
</div>
</div>

@endsection
