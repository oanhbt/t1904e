<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class FrontendController extends Controller
{
    public function welcome() {
      $lsPost = Post::where('is_active', '1')->paginate(3);

      $lsLastestPost = Post::where('is_active', '1')->orderBy('created_at', 'DESC')->take(5)->get();
      //$lsCategory = Category::orderBy('created_at', 'DESC')->take(4)->get();
      $lsCategory = Category::has('posts')->orderBy('created_at', 'DESC')->take(4)->get();

      $allCategory = Category::all();

      return view('welcome')->with(['lsPost' => $lsPost,
                                    'lsLastestPost' => $lsLastestPost,
                                    'lsCategory' => $lsCategory,
                                    'allCategory' => $allCategory]);
    }

    public function single($id) {
        $post = Post::where('is_active', '1')->find($id);
        $allCategory = Category::all();

        $lsLastestPost = Post::orderBy('created_at','DESC')->take(3)->get();
        return view('single')->with(['post' => $post,
                                     'allCategory' => $allCategory,
                                     'lsLastestPost' => $lsLastestPost]);
      }

    public function post_comment(Request $request){
      $comment = new \App\Comment();
      $comment->post_id = $request->post_id;
      $comment->name = $request->name;
      $comment->email = $request->email;
      $comment->contents = $request->message;
      $comment->status = 1;
      $comment->save();

      return redirect()->back();

    }

    public function category($id=null) {
      if($id != null && $id != ""){
        $lsPost = Post::where('is_active', '1')
                      ->where('category_id', $id)
                      ->paginate(9);
      } else {
        $lsPost = Post::where('is_active', '1')->paginate(9);
      }

      $allCategory = Category::all();

      return view('category')->with(['lsPost' => $lsPost,
                                    'allCategory' => $allCategory]);
      }
}
