<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$allPost = Post::all();
        $allPost = Post::paginate(3);
        return view('post.list')->with(['allPost' => $allPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory = Category::all();
        return view('post.create')->with(['allCategory' => $allCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
                [
                   'title1' => 'required|max:255|min:3|unique:posts,title', ///phải thêm trường 'title' vào sau post, do name=title1 khác với tên trường là title.
                   'summary1' => 'required|max:255|min:3',
                   'content1' => 'required'
                ]);
        $post = new Post();
        $post->title = $request->title1;
        $post->summary = $request->summary1;
        $post->content = $request->content1;
        $post->category_id = $request->category_id1;
        $post->is_active = $request->is_active1;
        
        $file = $request->file1;
        $upload_image = '';
        if($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time()."_".$image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/".$image_name;
        }
        $post->cover = $upload_image;
        
        $user = auth()->user();
        $post->user_id = $user->id;
        $post->save();
        
        $request->session()->flash('success','Post was successfull');
        return redirect()->route("post_management.index");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $allCategory = Category::all();
        return view('post.edit')->with(['allCategory' => $allCategory, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
                [
                   'title1' => 'required|max:255|min:3', ///phải thêm trường 'title' vào sau post, do name=title1 khác với tên trường là title.
                   'summary1' => 'required|max:255|min:3',
                   'content1' => 'required'
                ]);
        $post = Post::find($id);
        $post->title = $request->title1;
        $post->summary = $request->summary1;
        $post->content = $request->content1;
        $post->category_id = $request->category_id1;
        $post->is_active = $request->is_active1;
        
        $file = $request->file1;
        
        if($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time()."_".$image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/".$image_name;
            $post->cover = $upload_image; //phải đưa vào trong if để nếu k muốn thay ảnh thì vẫn còn ảnh cũ
        }
        
        $user = auth()->user();
        $post->user_id = $user->id;
        $post->save();
        
        $request->session()->flash('success','Post was successfull');
        return redirect()->route("post_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
        $post->delete();
        $request->session()->flash('success','Post was deleted');
        return redirect()->route("post_management.index");
    }
    
    public function change($id, Request $request) {
        $post = Post::find($id);
        if($post->is_active == 1) {
            $post->is_active = 0;
        } else {
            $post->is_active = 1;
        }
        $post->save();
        $request->session()->flash('success','Post was changed');
        return redirect()->route("post_management.index");
    }
    public function change_api(Request $request) {
        $id = $request->id;
        $status = $request->status;
        
        $post = Post::find($id);
        if($post->is_active == 1) {
            $post->is_active = 0;
        } else {
            $post->is_active = 1;
        }
        $post->save();
        
        return response()->json(['status' => 'OK'], 200);
        ///dd('test'); die để kiểm tra đã kết nối lên server chưa, nếu kết nối sẽ hiển thị test
    }
}
