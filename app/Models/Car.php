<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['marque', 'modele', 'description', 'prix', 'annee', 'km', 'motor_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function motorisation()
    {
        return $this->belongsTo(Motorisation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currentYear()
    {
        $currentYear = Carbon::now()->format('Y');
        return $currentYear;
    }

    public function year()
    {
        $year = 2000;
        return $year;
    }

    public function get_current_user()
    {
        $user = auth()->user();
        return $user->id;
    }

    public function search($match, $motor_id, $paginate = 10)
    {
        $query = Car::query();

        if(!empty($match)) {
            $query = $query->where(function ($query2) use ($match) {
                $query2->where('marque', 'LIKE', "%{$match}%")
                    ->orWhere('modele', 'LIKE', "%{$match}%");
            });
        }
        if(!empty($motor_id)) {
            $query = $query->where('motor_id', '=', $motor_id);
        }
        return $query->orderBy('id', 'asc')->paginate($paginate);
    }
}
