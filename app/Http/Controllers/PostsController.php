<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::with('author')->orderBy('created_at', 'desc')->paginate(3);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            
            // -> cara ketiga create
            Post::create($request->all());
            return redirect('/post')->with('status', 'Data Mahasiswa berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        Post::where('id', $post->id)
        ->update([
            'title'=> $request->title,
            'article'=> $request->article,
            'title_clean'=> $request->title_clean,
            'file'=> $request->file,
            'author_id'=> $request->author_id,
            'banner_image'=> $request->banner_image,
            'views'=> $request->views
            

        ]);

    return redirect('/post')->with('status', 'Data Mahasiswa berhasi di Edit');// ->flesh
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/post')->with('status', 'Data Mahasiswa berhasil di hapus!');// ->flesh
         //untu menghapus data dan tanpa menghilangkan data di database dengan soft delete
    }
}
