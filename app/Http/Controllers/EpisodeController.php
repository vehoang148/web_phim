<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Episode;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie_episode  = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        // return response()->json($movie_episode);
        return view('admin.episode.index',compact('movie_episode'));
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option> ---Chọn tập phim---</option>';
        for($i=1;$i<=$movie->sotap;$i++){
            $output.='<option value="'.$i.'">'.$i.'</option>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        return view('admin.episode.create',compact('list_movie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $epi = new Episode();
        $epi->movie_id = $data['movie_id'];
        $epi->linkphim = $data['link'];
        $epi->episode = $data['episode'];
        $epi->save();
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
        $list_movie = Movie::orderBy('id','DESC')->pluck('title', 'id');
        $episode = Episode::find($id);
        return view('admin.episode.edit',compact('episode','list_movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $epi = Episode::find($id);
        $epi->movie_id = $data['movie_id'];
        $epi->linkphim = $data['link'];
        $epi->episode = $data['episode'];
        $epi->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->back();
    }
}