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

        return response()->json([
            'status' => true,
            'data' => $movies,
        ], 200);
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

        return response()->json([
            'status' => true,
            'data' => $movie,
            "message" => "Data has been stored successfully!"
        ], 201);
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
            return response()->json([
                'status' => true,
                'data' => $movie,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => [],
                'message' => 'Not Found'
            ], 404);
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

        return response()->json([
            'status' => true,
            'data' => $movie,
            'message' => 'Movie updated successfully'
        ], 200);
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

            return response()->json([], 204);
        } else {
            return response()->json([
                'status' => false,
                'data' => [],
                'message' => 'Not Found'
            ], 404);
        }
    }
}
