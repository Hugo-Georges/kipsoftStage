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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $motors = Motorisation::all();
        if ($search = $request->input('search') && $search2 = $request->input('search2')) {
            $cars = Car::query()
            ->where('marque', 'LIKE', "%{$search}%", 'OR', 'modele', 'LIKE', "%{$search}%")
            ->Where('motor_type' ,'LIKE', "{$search2}")
            ->orderBy('id','asc')->paginate(10);
        }
        else{
            $cars = Car::query()
            ->orderBy('id','asc')->paginate(10);
        }
        //
        return view('index', compact('cars', 'motors'));

    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listCars(Request $request)
    {
        $motors = Motorisation::all();
        if ($search = $request->input('search') && $search2 = $request->input('search2')) {
            $cars = Car::query()
            ->where(function($req) use ($search){
                $req->where('marque', 'LIKE', "%{$search}%")
                    ->orWhere('modele', 'LIKE', "%{$search}%");
            })
            ->where('motor_type' ,'LIKE', "{$search2}")
            ->orderBy('id', 'asc')->paginate(9);
        }
        /*if ($search = $request->input('search') && $search2 = $request->input('search2')) {
            $cars = Car::query()
            ->where(
                'marque', 'LIKE', "%{$search}%"
            )
            ->orWhere('modele', 'LIKE', "%{$search}%")
            ->where('motor_type' ,'LIKE', "{$search2}")
            ->orderBy('id', 'asc')->paginate(9);
        }*/
        else {
            $cars = Car::query()
            ->orderBy('id', 'asc')->paginate(9);
        }
        //
        return view('listCars', compact('cars','motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motors = Motorisation::all();
        $finalYear = Car::currentYear();
        $startYear = Car::year();
        return view('create', compact('motors', 'finalYear', 'startYear'));
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
            'motor_type' => 'required',
        ]);

        $car = Car::create($validatedData);

        return redirect('/cars')->with('success', 'Voiture créer avec succès');
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
        $motors = Motorisation::all();
        $finalYear = Car::currentYear();
        $startYear = Car::year();
        return view('edit', compact('car','motors', 'finalYear', 'startYear'));
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
        $motors = Motorisation::all();
        $validatedData = $request->validate([
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'description' => 'required|max:255',
            'prix' => 'required|max:11',
            'annee' => 'required',
            'km' => 'required',
            'motor_type' => 'required',
        ]);

        Car::whereId($id)->update($validatedData);

        return redirect('/listCars')->with('success', 'Voiture mise à jour avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motors = Motorisation::all();
        $car = Car::findOrFail($id);
        $comments = $car->comments()->get();


        return view('show', compact('car', 'comments', 'motors'));
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
        return redirect('/listCars')->with('success', 'Voiture supprimer avec succèss');
    }

}
