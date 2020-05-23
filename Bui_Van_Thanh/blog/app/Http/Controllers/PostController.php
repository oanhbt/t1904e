<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Category;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstCategory = Category::where('deleted_at', null)->get();
        $lstPost = Post::where('deleted_at', null)->paginate(6);
        return view('post.index')->with(['lstPost' => $lstPost, 'lstCategory' => $lstCategory]);
    }

    // Search Post
    public function searchPost($serchKey, $categoryID = null, $fromDate, $toDate, Request $request)
    {
        dd($serchKey);
        $fd = Carbon::createFromFormat('d/m/Y', $fromDate);
        $td = Carbon::createFromFormat('d/m/Y', $toDate);
        if ($td != null) {
            $td->addDays(1);
        }

        $data = Post::where('deleted_at', null)
            ->orWhere('title', 'like', '%' . $serchKey . '%')
            ->orWhere('created_at', '>=', $fd)
            ->orWhere('category_id', $categoryID)
            ->orWhere('created_at', '<=', $td)->paginate(6);
        return view('post._lstPosts')->with(['lstPostSearch' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
