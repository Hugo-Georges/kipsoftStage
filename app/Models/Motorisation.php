<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorisation extends Model
{
    use HasFactory;

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = ['type'];

    public function motorisations()
    {
        return $this->hasMany(Car::class);
    }

}
