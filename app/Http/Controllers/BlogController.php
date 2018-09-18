<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use DB;
class BlogController extends Controller
{
    public function index()
    {
      $categories=Category::orderBy('title','asc')->get();
      $posts=Post::with('author')->orderBy('created_at','desc')->simplePaginate(3);
      return view('blog.index',compact('posts','categories'));
    }
    public function category($id)
    {
      $categories=Category::orderBy('title','asc')->get();
      $posts=Post::with('author')
                 ->orderBy('created_at','desc')
                 ->where('category_id',$id)
                 ->simplePaginate(3);
    return view('blog.index',compact('posts','categories'));
    }

    public function show($id)
    {
         $categories=Category::orderBy('title','asc')->get();
         $post=Post::findOrFail($id);
         //$post=DB::table('posts')->where('id',$id)->first();
         return view('blog.show',compact('post','categories'));
    }
}
