<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($car_id)
    {
        return view('comment.create', compact('comments', 'car_id'));
    }
}
