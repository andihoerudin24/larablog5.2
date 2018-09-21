<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use DB;
class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $limit=5;
    public function index()
    {
       $posts=DB::table('posts')
                ->join('users','users.id','=','posts.author_id')
                ->join('categories','categories.id','=','posts.category_id')
                ->select('posts.*','users.name','categories.title')
                ->orderBy('id', 'desc')
                ->paginate($this->limit);
       $postcount=Post::count();
        return view("backend.blog.index",compact('posts','postcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post= new Post;
        return view('backend.blog.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'        => 'required',
            'slug'         => 'required|unique:posts',
            'body'         => 'required',
            'category_id'  => 'required',
            'excerpt'      => 'required',
        ]);
          $post= new Post;
          $post->author_id=$request->user()->id;
          $post->title=$request['title'];
          $post->slug=$request['slug'];
          $post->body=$request['body'];
          $post->category_id=$request['category_id'];
          $post->excerpt=$request['excerpt'];
          $file=$request->file('image');
          $fileName=$file->getClientOriginalName();
          $request->file('image')->move('img/',$fileName);
          $post->image=$fileName;
          $post->save();
        return redirect('/backend/blog')->with('message','Your post was create success');
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
