<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;

class IndexController extends Controller
{
    public function loc_phim()
    {
        $order = $_GET['order'];
        $genre_filter = $_GET['genre'];
        $country_filter = $_GET['country'];
        $year_filter = $_GET['year'];
        if ($order == '' && $genre_filter == '' && $country_filter == '' && $year_filter == '') {
            return redirect()->back();
        } else {
            $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();


            $movie = Movie::withCount('episode'); //đếm từng phim
            if ($country_filter) {
                $movie = $movie->where('country_id', $country_filter);
            }
            if ($year_filter) {
                $movie = $movie->where('year', '=', $year_filter);
            }
            if ($order) {
                $movie = $movie->where('year', '=', $order);
            } elseif ($order) {
                $movie = $movie->orderBy('title', 'ASC');
            }

            $movie = $movie->orderBy('title', 'ASC')->paginate(40);

            return view('pages.locphim', compact('category', 'genre', 'country', 'phimhot_sidebar', 'movie'));
        }
    }
    public function timkiem()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();

            $phim_hot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();

            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('ngaycapnhat', 'DESC')->paginate(12);

            return view('pages.search', compact('phim_hot', 'category', 'genre', 'country', 'phimhot_sidebar', 'movie', 'search'));
        } else {
            return redirect()->to('/');
        }
    }
    public function  home()
    {
        $phim_hot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phim_le_moi_nhat = Movie::withCount('episode')->where('thuocphim', 'phimle')->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phim_bo_moi_nhat = Movie::withCount('episode')->where('thuocphim', 'phimbo')->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        // Kiểm tra nếu $phimle không tồn tại hoặc là mảng rỗng
        $phimle = Movie::orderBy('id', 'DESC')->get();
        $phimbo = Movie::orderBy('id', 'DESC')->where('thuocphim', 'phimbo')->get();
        $category_home = Category::with('movie')->take('3')->orderBy('id', 'DESC')->get();
        return view('pages.home', compact('phim_hot', 'category', 'genre', 'country', 'category_home', 'phimhot_sidebar', 'phim_le_moi_nhat', 'phim_bo_moi_nhat', 'phimle', 'phimbo'));
    }
    //phim hot
    public function phimhot()
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::where('thuocphim', 'phimbo')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        $phimhot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(5)->get();
        return view('pages.phimhot', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phimhot'));
    }

    //phim lẻ
    public function phimle()
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::where('thuocphim', 'phimle')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        $phimle = Movie::orderBy('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(5)->get();

        return view('pages.phimle', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phimle'));
    }

    //phim bộ
    public function phimbo()
    {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::where('thuocphim', 'phimbo')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        $phimbo = Movie::orderBy('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take(5)->get();

        return view('pages.phimbo', compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phimbo'));
    }

    //danh mục
    public function  category($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(12);
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar'));
    }

    public function  year($year)
    {
        $category = Category::orderBy('position', 'ASC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(12);
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar'));
    }


    //Tags
    public function  tag($tag)
    {
        $category = Category::orderBy('position', 'ASC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $tag = $tag;
        $movie = Movie::where('year', 'LIKE', '%' . $tag . '%')->orderBy('ngaycapnhat', 'DESC')->paginate(12);
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar'));
    }

    //thể loại
    public function  genre($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        //nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach ($movie_genre as $key => $value) {
            $many_genre[] = $value->movie_id;
        }
        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(12);
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar'));
    }
    public function  country($slug)
    {
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('5')->get();
        $movie = Movie::where('category_id', $country_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(12);
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'phimhot_sidebar'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        // Phim hot sidebar
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('6')->get();

        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        // tags
        $tags = Movie::orderBy('tags', 'DESC')->paginate(5);

        // Có thể bạn muốn xem
        $related = Movie::with('category', 'genre', 'country', 'episode')->where('category_id', $movie->category->id)->where('slug', '!=', $slug)->inRandomOrder()->get();

        // Tập phim đầu tiên
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->first();

        // Liệt kê 3 tập phim mới nhất
        $episode_3_tapmoi = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take('3')->get();

        //đếm tập phim đã thêm
        $episode_all = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->get()->count();
        $episode = Episode::where('movie_id', $movie->id)->orderBy('episode', 'ASC')->get();

        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related', 'tags', 'phimhot_sidebar', 'episode_3_tapmoi', 'episode_tapdau', 'episode_all', 'episode'));
    }
    public function  watch($slug, $tap)
    {

        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        //sidebar phim hot
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('6')->get();

        //lấy dữ liệu bên model movie
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();

        //replay bạn có thể muốn xem
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $category_id = $movie->category->id)->where('slug', '!=', $slug)->inRandomOrder()
            ->get();

        //số tập
        if (isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap, 4, 50);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        } else {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }

        return view('pages.watch', compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'episode', 'tapphim'));
    }
    public function  episode()
    {
        return view('pages.episode');
    }
}