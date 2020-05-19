@extends('layouts.frontend')

@section ('content')


    <div class="site-section bg-white">
      <div class="container">
        <div class="row">

          @if(count($lsPost) == 0)
            <h2>Nothing</h2>
          @endif

          @foreach($lsPost as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{$post->cover}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>

              <h2><a href="single.html/{{$post->id}}">{{$post->title}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                <span>&nbsp;-&nbsp; {{$post->created_at}}</span>
              </div>

                <p>{{$post->summary}}</p>
                <p><a href="single.html/{{$post->id}}">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        {{$lsPost->links()}}
      </div>
    </div>

@endsection
