<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('created_at', 'desc')->paginate(3);
        return view('penulis.author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penulis.create');
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
         Author::create($request->all());
         return redirect('/penulis')->with('status', 'Data Mahasiswa berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('penulis.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        Author::where('id', $author->id)
        ->update([
            'display_name'   => $request->display_name,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name
            
            

        ]);

    return redirect('/penulis')->with('status', 'Data Mahasiswa berhasi di Edit');// ->flesh
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        Author::destroy($author->id);
        return redirect('/penulis')->with('status', 'Data Mahasiswa berhasil di hapus!');// ->flesh
         //untu menghapus data dan tanpa menghilangkan data di database dengan soft delete
    }
}
