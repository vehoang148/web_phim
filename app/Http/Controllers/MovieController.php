<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\File;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('category','movie_genre','country')->orderBy('id', 'DESC')->get();
        $path = public_path()."/json/";
        if(!is_dir($path))
        {
            mkdir($path,0777,true);
        }
        File::put($path.'movie.json',json_encode($list));
        return view('admin.movie.index', compact('list'));
    }

    public function update_year(Request $request) {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $country = Country::pluck('title', 'id');
        return view('admin.movie.create', compact('category', 'genre', 'country','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->slug = $data['slug'];
        $movie->tags = $data['tags'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->category_id = $data['category_id'];
        foreach($data['genre'] as $key => $gen)
        {
            $movie->genre_id = $gen[0];
        }

        // $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->name_eng = $data['name_eng'];
        $movie->quality = $data['quality'];
        $movie->phude = $data['phude'];
        $movie->trailer = $data['trailer'];
        $movie->ngaytao = Carbon::now("Asia/Ho_Chi_Minh");
        $movie->ngaycapnhat = Carbon::now("Asia/Ho_Chi_Minh");

        //thêm ảnh
        $get_image = $request->file('image');

        if ($get_image) {

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        //thêm nhiều thể loại cho phim
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->route('movie.index');
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
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $country = Country::pluck('title', 'id');
        $movie =  Movie::find($id);
        $movie_genre = $movie->movie_genre;
        return view('admin.movie.edit', compact('category', 'genre', 'country', 'movie','list_genre','movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->slug = $data['slug'];
        $movie->tags = $data['tags'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->category_id = $data['category_id'];
        foreach($data['genre'] as $key => $gen)
        {
            $movie->genre_id = $gen[0];
        }

        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->name_eng = $data['name_eng'];
        $movie->quality = $data['quality'];
        $movie->phude = $data['phude'];
        $movie->trailer = $data['trailer'];
        $movie->ngaycapnhat = Carbon::now("Asia/Ho_Chi_Minh");

        $get_image = $request->file('image');

        if ($get_image) {
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();

        //sync đồng bộ
        //detach tháo đi lắp lại
        $movie->movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $movie = Movie::find($id);
        if (!empty($movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        }
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();
        Episode::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete();
        return redirect()->back();
    }
}