<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
