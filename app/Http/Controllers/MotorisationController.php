<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorisation;

class MotorisationController extends Controller
{
    public function index()
    {
        $motors = Motorisation::all();
    }
}
