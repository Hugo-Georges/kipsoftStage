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
            //'car_id' => $car_id,
        ]);

        $comment = Comment::create($validatedData2 + ['car_id' => $car_id]);

        //return view('show'/*, compact('car_id')*/)->with('car_id', $comment)->with('success', 'commentaire publier avec succès');
        return redirect('/cars/'.$car_id)->with('success', 'Voiture supprimer avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $car_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($car_id, Comment $comment)
    {
        //$comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('/cars/'.$car_id)->with('success', 'Voiture supprimer avec succèss');
    }

}
