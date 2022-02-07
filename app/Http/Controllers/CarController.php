<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Comment;
use App\Models\Motorisation;
use App\Models\User;
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
    public function dashboard(Request $request)
    {
        return $this->searchCarWithFormSearch($request);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function preview(Request $request)
    {
        return CarController::searchCarWithFormSearch($request, 'preview', 9);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myCars()
    {
        $user = 3;
        $motors = Motorisation::all();
        $cars = Car::query()
        ->where('user_id', '=', $user)
        ->orderBy('id','asc')->paginate(10);
        //
        return view('car.myCars', compact('cars', 'motors', 'user'));

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
        $user = Car::get_current_user();
        return view('car.create', compact('motors', 'finalYear', 'startYear', 'user'));
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
            'user_id' => 'required',
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
        return view('car.edit', compact('car','motors', 'finalYear', 'startYear'));
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
            'user_id' => 'required',
        ]);

        Car::whereId($id)->update($validatedData);

        return redirect('/preview')->with('success', 'Voiture mise à jour avec succèss');
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

        return view('car.show', compact('car', 'comments', 'motors'));
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

        return redirect('/preview')->with('success', 'Voiture supprimer avec succèss');
    }


    static function searchCarWithFormSearch($request, $view = 'dashboard', $paginate = 10) {
        $motors = Motorisation::all();
        $search = $request->input('search');
        $search2 = $request->get('search2');
        $cars = Car::search($search, $search2, $paginate);

        return view('car.'.$view, compact('cars','motors', 'search', 'search2'));
    }

}
