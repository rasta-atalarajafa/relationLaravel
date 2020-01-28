<?php

namespace App\Http\Controllers;

use App\Post;
use App\Author;
use App\Tag;
use App\Categorie;
use App\Http\Requests\PostRequest;
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
        $data = Post::orderBy('id', 'desc')->limit(100)->get();
        
        return view('post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name', 'id');
        $tags = Tag::get(['id','name']);
        $authors = Author::get(['id', 'display_name']);
        return view('post.create', compact('authors', 'tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $add_post = Post::create($request->all());
        $add_post->tags()->sync($request->tag);
     
        // $file = $request->file('file')->store('photos');

        // $request->user()->update([
        //     'file' => $file
        // ]);

        if (!$add_post) {
            return back()->with('error', 'Gagal menambahkan cover!');
        }

        if ($request->hasFile('file'))
        {
            $allowed    = ['jpg', 'jpeg', 'png'];
            $file       = $request->file('file');
            $title      = $file->getClientOriginalName();
            $extension  = $file->getClientOriginalExtension();
            $name       = time().'_'.date('d_m_Y').'.'.$extension;

            $check = in_array($extension, $allowed);
            if ($check) {
                $file->move(public_path('storage'), $name);
                $add_post->update(['file' => $name]);
            }
        }

        return redirect('/post')->with('success', 'Berhasil menambah arsip baru');
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
        ->update ([
          'title'       => $request->title,
          'article'     => $request->article,
          'title_clean' => $request->title_clean,
          'file'        => $request->file,
          'author_id'   => $request->author_id,
          'views'       => $request->views
        ]);
        return redirect('/post');
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
      return redirect('/post');
    }
}
