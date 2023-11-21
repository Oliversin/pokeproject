<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Generation;
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

    public function list()
    {
        
        $pokemons = Pokemon::with('types')->with('generation')->get(); // Retrieve all posts from the database

        return Inertia::render('Pokemon/Index', [
            'pokemons' => $pokemons,
            'poke' => Pokemon::find(1),
        ]);
        //return response()->json($pokemons, Response::HTTP_OK); // Return the data as JSON
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generations = Generation::all();
        return Inertia::render('Pokemon/Create', [
            'generations' => $generations,
        ]); // Return the data as JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255', 
            'generation_id' => 'required',

        ]);

        // Create a new Pokemon instance with the validated data
        $pokemon = new Pokemon([
            'name' => $validatedData['name'],
            'generation_id' => $validatedData['generation_id'],
            'sprite' => $validatedData['name'].'.jpg',
            

        ]);

        $pokemon->save(); // Save the new pokemon to the database

        return response()->json($pokemon, Response::HTTP_CREATED); // Return the new pokemon as JSON
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pokemon = Pokemon::with('types')->with('generation')->find($id); // Retrieve all posts from the database

        return response()->json($pokemon, Response::HTTP_OK); // Return the data as JSON
    }

    public function showView(string $id)
    {
        $pokemon = Pokemon::with('types')->with('generation')->find($id); // Retrieve all posts from the database

        return Inertia::render('Pokemon/Show', [
            'pokemon' => $pokemon,
        ]); // Return the data as JSON
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $generations = Generation::all();
        $pokemon = Pokemon::with('types')->with('generation')->find($id); // Retrieve all posts from the database

        return Inertia::render('Pokemon/Edit', [
            'pokemon' => $pokemon,
            'generations' => $generations,
        ]); // Return the data as JSON
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pokemon = Pokemon::find($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255', 
            'generation_id' => 'required',
            'sprite' => 'nullable',
            
        ]);

        // Create a new Pokemon instance with the validated data
        $pokemon->update([
            'name' => $validatedData['name'],
            'generation_id' => $validatedData['generation_id'],
            'sprite' => $validatedData['name'].'.jpg',
            

        ]);
        return redirect()->route('pokemon.index');
        //return redirect()->back();

        return response()->json([
            'message' => 'En espera de publicación',
            'code' => 1,
        ], 200);

       // $pokemon->save(); // Save the new pokemon to the database
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pokemon::find($id)->delete();

    }
}
