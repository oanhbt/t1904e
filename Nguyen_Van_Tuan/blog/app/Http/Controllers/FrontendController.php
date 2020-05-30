<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Subscribe;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;


class FrontendController extends Controller
{
  public function welcom(){
    $lsPost = Post::paginate(3);
    $lsLastestPost = Post::where('is_active', '1')->orderBy('created_at', 'DESC')->take(5)->get();
    $lsCategory = Category::has('posts')->orderBy('created_at', 'DESC')->take(4)->get();
    $allCategory = Category::all();
    return view('welcome')->with(['lsPost' => $lsPost, 'lsLastestPost' => $lsLastestPost, 'lsCategory' => $lsCategory, 'allCategory' => $allCategory]);
  }

  public function single($id){
    $post = Post::find($id);
    $allCategory = Category::all();
    return view('single')->with(['post' => $post, 'allCategory' => $allCategory]);
  }

  public function post_comment(Request $request){
    $comment = new \App\Comment();
    $comment->post_id = $request->post_id;
    $comment->name = $request->name;
    $comment->email = $request->email;
    $comment->content = $request->message;
    $comment->status = 1;
    $comment->save();
    return redirect()->back();

  }

  public function category($id = null){
    if($id != null && $id != ""){
      $lsPost = Post::where('is_active', '1')
                      ->where('category_id', $id)
                      ->paginate(9);

    } else {
      $lsPost = Post::where('is_active', '1')->paginate(9);
    }

    $allCategory = Category::all();
    return view('category')->with(['lsPost' => $lsPost, 'allCategory' => $allCategory]);
  }

  public function subscribe(Request $request){
    $s = new Subscribe();
    $s -> email = $request->email;
    $s->save();
// Gửi mail
    $objDemo = new \stdClass();
    // $objDemo->demo_one = 'Demo One Value';
    // $objDemo->demo_two = 'Demo Two Value';
    $objDemo->sender = 'SenderUserName';
    $objDemo->receiver = 'ReceiverUserName';

    Mail::to("nvtuan88@gmail.com")->send(new DemoEmail($objDemo));

    return redirect()->back();
  }

}
