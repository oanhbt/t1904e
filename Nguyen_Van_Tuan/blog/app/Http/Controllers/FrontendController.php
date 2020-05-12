<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class FrontendController extends Controller
{
  public function welcom(){
    $lsPost = Post::paginate(3);
    $lsLastestPost = Post::orderBy('created_at', 'DESC')->take(5)->get();
    $lsCategory = Category::has('posts')->orderBy('created_at', 'DESC')->take(4)->get();
    return view('welcome')->with(['lsPost' => $lsPost, 'lsLastestPost' => $lsLastestPost]);
  }
}
