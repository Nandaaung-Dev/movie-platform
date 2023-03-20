<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function addMovies()
    {

        $categories = Category::all();

        return view("movies.add_movies", [
            'categories' => $categories
        ]);
    }

    public function storeMovies(Request $request)
    {
        $movie = new Movie;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = md5(time()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);

            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->image = $image_name;
            $movie->rating = $request->rating;
            $movie->category_id = $request->category_id;
        }

        $movie->save();

        return redirect()->route('movies.view');
    }

    public function viewMovies()
    {
        $movies = Movie::all();
        return view('movies.view_movies', compact('movies'));
        // dd($movies);
    }

    public function detailMovie($id)
    {
        $movie = Movie::find($id);
        return view('movies.detail_movies', ['movie' => $movie]);
    }
}
