<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car_tags()
    {
        return $this->hasMany(Car_Tag::class);
    }


}
