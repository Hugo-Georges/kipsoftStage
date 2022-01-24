<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['marque','modele' ,'description' ,'prix' ,'annee' ,'km' ,'motor_id' ];

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function motorisations()
    {
        return $this->belongsTo(Motorisation::class);
    }
}

