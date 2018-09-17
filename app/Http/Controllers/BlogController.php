<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use DB;
class BlogController extends Controller
{
    public function index()
    {

      $posts=Post::with('author')->orderBy('created_at','desc')->simplePaginate(3);
      return view('blog.index',compact('posts'))->render();
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);
        //$post=DB::table('posts')->where('id',$id)->first();
        return view('blog.show',compact('post'));
    }
}
