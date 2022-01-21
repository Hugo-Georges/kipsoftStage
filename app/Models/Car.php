<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['marque','modele' ,'description' ,'prix' ,'annee' ,'km' ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
