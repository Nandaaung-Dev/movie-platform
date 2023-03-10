<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movies\CreateMovieRequest;
use App\Http\Requests\Movies\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return $movies;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMovieRequest $request)
    {
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->image = $request->image;
        $movie->rating = $request->rating;

        $movie->save();

        return response()->json(["message" => "Data has been stored successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            return $movie;
        } else {
            return "Data not found";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $movie = Movie::find($id);

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->image = $request->image;
        $movie->rating = $request->rating;

        $movie->save();

        return response()->json(['message' => 'Movie updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if ($movie) {

            $movie->delete();

            return response()->json(['message' => 'Movie has been deleted.']);
        } else {

            return response()->json(['message' => 'Movie does not exit.']);
        }
    }
}
