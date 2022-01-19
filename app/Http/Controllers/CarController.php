<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Comment;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($search = $request->input('search')){
            $voitures = Car::query()
        ->where('marque', 'LIKE', "%{$search}%")
        ->orWhere('modele', 'LIKE', "%{$search}%")
        ->get();
        }
        else{
            $voitures = Car::all();
        }
        //
        return view('index', compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'description' => 'required|max:255',
            'prix' => 'required',
        ]);

        $car = Car::create($validatedData);

        return redirect('/cars')->with('success', 'Voiture créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        $comments = $car->comments()->get();


        return view('show', compact('car', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'description' => 'required|max:255',
            'prix' => 'required'
        ]);

        Car::whereId($id)->update($validatedData);

        return redirect('/cars')->with('success', 'Voiture mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/cars')->with('success', 'Voiture supprimer avec succèss');
    }

}
