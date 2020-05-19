@extends('layouts.frontend')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 center">
            <h3>Search</h3>
            <p>Search by title of post.</p>
            </div>
            @if(count($lsPost) == 0)
            <h2>No Result</h2>
            @endif

        </div>
    </div>
</div>

<div class="site-section bg-white">
    <div class="container">
        <div class="row">
            @foreach($lsPost as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="single.html/{{$post->id}}"><img src="{{asset($post->cover)}}" alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>

                        <h2><a href="single.html/{{$post->id}}">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">

                            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{date('d/M/Y', strtotime($post->created_at))}}</span>
                        </div>

                        <p>{{$post->summary}}</p>
                        <p><a href="single.html/{{$post->id}}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
<div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                {{$lsPost->links()}}
            </div>
        </div>
    </div>
</div>
@endsection