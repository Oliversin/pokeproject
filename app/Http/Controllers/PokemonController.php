<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Type;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::with('types')->with('generation')->get(); // Retrieve all posts from the database
        return response()->json($pokemons, Response::HTTP_OK); // Return the data as JSON
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255', 
            'generation_id' => 'required',
            'sprite' => 'nullable',
        ]);

        // Create a new Post instance with the validated data
        $post = new Pokemon([
            'name' => $validatedData['name'],
            'generation_id' => $validatedData['generation'],
            'sprite' => $validatedData['sprite'],

        ]);

        $post->save(); // Save the new post to the database

        return response()->json($post, Response::HTTP_CREATED); // Return the new post as JSON
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
