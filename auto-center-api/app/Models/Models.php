<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'make_id',
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
