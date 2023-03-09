<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $data = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
            "api_key" => "8a310a54db8ca597996e91133d977eb2",
        ]);
        $movies = $data->json();
        return view('guest.index', [
            "title" => "Beranda",
            "movies" => $movies['results'],
            "categories" => $categories,
            "subtitle" => "Movies"
        ]);
    }

    public function getMovieByCategory(Category $category)
    {
        // dd($category['id']);
        // if ($category['title'] == "now_playing") {
        //     $categories = Category::get();
        //     $find = Category::find($category);
        //     $data = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
        //         "api_key" => "8a310a54db8ca597996e91133d977eb2",
        //     ]);
        //     $movies = $data->json();
        // } elseif ($category['title'] == "popular") {
        //     $categories = Category::get();
        //     $find = Category::find($category);
        //     $data = Http::get('https://api.themoviedb.org/3/movie/popular', [
        //         "api_key" => "8a310a54db8ca597996e91133d977eb2",
        //     ]);
        //     $movies = $data->json();
        // } elseif ($category['title'] == "top_rated") {
        //     $categories = Category::get();
        //     $find = Category::find($category);
        //     $data = Http::get('https://api.themoviedb.org/3/movie/top_rated', [
        //         "api_key" => "8a310a54db8ca597996e91133d977eb2",
        //     ]);
        //     $movies = $data->json();
        // } elseif ($category['title'] == "up_coming") {
        //     $categories = Category::get();
        //     $find = Category::find($category);
        //     $data = Http::get('https://api.themoviedb.org/3/movie/upcoming', [
        //         "api_key" => "8a310a54db8ca597996e91133d977eb2",
        //     ]);
        //     $movies = $data->json();
        // }
        // dd($find[0]);
        $categories = Category::get();
        $find = Category::find($category);
        $data = Http::get('https://api.themoviedb.org/3/movie/' . $find[0]['title'], [
            "api_key" => "8a310a54db8ca597996e91133d977eb2",
        ]);
        $movies = $data->json();

        return view('guest.index', [
            "title" => "Beranda",
            "movies" => $movies['results'],
            "categories" => $categories,
            "subtitle" => $find[0]['title']
        ]);
    }

    public function findMovie($id)
    {
        $data = Http::get('https://api.themoviedb.org/3/movie/' . $id, [
            "api_key" => "8a310a54db8ca597996e91133d977eb2",
        ]);

        $movies = $data->json();
        // dd($movies);
        return view('guest.detail', [
            "title" => "Detail",
            "movies" => $movies,
        ]);
    }
}
