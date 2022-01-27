<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['marque','modele' ,'description' ,'prix' ,'annee' ,'km' ,'motor_type' ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function motorisation()
    {
        return $this->belongsTo(Motorisation::class);
    }

    public function listYearCar()
    {
        $currentDate = Carbon::now();
        echo $currentDate->format('Y');
    }
}

