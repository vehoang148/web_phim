<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Genre::all();
        return view('admin.genre.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->slug = $data['slug'];
        $genre->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::find($id);
        $list = Genre::all();
        return view('admin.genre.edit',compact('list','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->slug = $data['slug'];
        $genre->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        return redirect()->back();
    }
}