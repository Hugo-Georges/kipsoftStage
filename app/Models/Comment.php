<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['contenu', 'car_id'];
    public function comment()
    {
        return $this->belongsTo(Car::class);
    }
}
