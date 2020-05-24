@extends('layouts.frontend')

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/img_2.jpg');">
  <div class="container">
    <div class="row same-height justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="post-entry text-center">
          <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>
          <h1 class="mb-4"><a href="#">{{$post->title}}</a></h1>
          <div class="post-meta align-items-center text-center">
            <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
            <span>&nbsp;-&nbsp; {{$post->created_at}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="site-section py-lg">
  <div class="container">
    <div class="row blog-entries element-anumate">
      <div class="col-md-12 col-lg-8 main-content">
        {!!$post->content!!}
        <div class="pt-5">
          <h3 class="mb-5">{{$post->comment()->count()}} Comment</h3>
        </div>
        <ul>
          @foreach($post->comment() as $commt)
            <li class="Comment">
              <div class="comment-body">
                <h3>{{$comm->name}}</h3>
                <div class="meta">
                  {{$comm->content}}
                </div>
              </div>
            </li>
          @endforeach
        </ul>

        <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                  <form action="{{asset('post_comment')}}" class="p-5 bg-light" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                      <label for="name">Name *</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email *</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Post Comment" class="btn btn-primary">
                    </div>

                  </form>
                </div>
      </div>

      <div class="col-md-12 col-lg-4 sidebar">
        <div class="sidebar-box">
                      <h3 class="heading">Popular Posts</h3>
                      <div class="post-entry-sidebar">
                        <ul>
                          <li>
                            <a href="">
                              <img src="images/img_1.jpg" alt="Image placeholder" class="mr-4">
                              <div class="text">
                                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                <div class="post-meta">
                                  <span class="mr-2">March 15, 2018 </span>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="images/img_2.jpg" alt="Image placeholder" class="mr-4">
                              <div class="text">
                                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                <div class="post-meta">
                                  <span class="mr-2">March 15, 2018 </span>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="images/img_3.jpg" alt="Image placeholder" class="mr-4">
                              <div class="text">
                                <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                <div class="post-meta">
                                  <span class="mr-2">March 15, 2018 </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                      <h3 class="heading">Categories</h3>
                      <ul class="categories">
                        @foreach($allCategory as $cate)
                        <li>
                          <a href="{{asset("category.html/$cate->id")}}">{{$cate->name}} <span>({{$cate->posts()->count()}})</span></a>
                          <!-- <a href="{{asset(category.html)}}/{{$cate->id}}">{{$cate->name}} <span>({{$cate->posts()->count()}})</span></a> -->
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    <!-- END sidebar-box -->
      </div>

    </div>
  </div>
</section>
@endsection
