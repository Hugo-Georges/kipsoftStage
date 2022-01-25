<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Comment;
use App\Models\Motorisation;
use Illuminate\Support\Facades\Schema;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $motor_id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function index(Request $request)
    {
        $motor_id = 1;
        if ($search = $request->input('search')){
            $cars = Car::query()
        ->where('marque', 'LIKE', "%{$search}%")
        ->orWhere('modele', 'LIKE', "%{$search}%")
        ->orderBy('id','asc')->paginate(10);
        }
        else{
            //$voitures = Car::all();
            $cars = Car::query()
            ->orderBy('id','asc')->paginate(10);
        }
        //
        return view('index', compact('cars'));
    }

    public function listCars()
    {
        $cars = Car::query()->orderBy('id','asc')->paginate(9);
        //
        return view('listCars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motors = Motorisation::all();
    return view('create', compact('motors'));
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
            'annee' => 'required',
            'km' => 'required',
            'motor_id' => 'required',
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $motors = Motorisation::all();
        return view('edit', compact('car','motors'));
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
            'prix' => 'required|max:11',
            'annee' => 'required',
            'km' => 'required',
            'motor_id' => 'required',
        ]);

        Car::whereId($id)->update($validatedData);

        return redirect('/cars')->with('success', 'Voiture mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *@param  \Illuminate\Database\Schema
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
