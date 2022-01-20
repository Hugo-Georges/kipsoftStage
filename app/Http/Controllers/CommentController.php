<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($car_id)
    {
        $comments = Comment::where('car_id', $car_id)->get();
        return view('', compact('comments', 'car_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param int $car_id
     */
    public function create($car_id)
    {
        return view('commentCreate', compact('car_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param int $car_id
     */
    public function store(Request $request2, $car_id)
    {
        $validatedData2 = $request2->validate([
            'contenu' => 'required|max:255',
            'car_id' => $car_id,
        ]);

        $comment = Comment::create($validatedData2);

        return redirect('car.show')/*->with('success', 'Voiture créer avec succès')*/;
    }


}
