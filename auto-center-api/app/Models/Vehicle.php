<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'make',
        'model',
        'color',
        'drive_type',
        'transmission',
        'condition',
        'year',
        'mileage',
        'fuel_type',
        'engine_size',
        'doors',
        'cylinders',
        'VIN',
        'description',
        'price',
        'stock_id',
        'discount',
        'is_featured',
        'featured_from_date',
        'featured_to_date',
        'dealership_id',
        'is_sold',
        'is_enabled',
        'reviews',
        'rating',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'featured_from_date' => 'date',
        'featured_to_date' => 'date',
        'is_sold' => 'boolean',
        'is_enabled' => 'boolean',
    ];

    public function dealership()
    {
        return $this->belongsTo(Dealership::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class,'color');
    }

    public function make()
    {
        return $this->belongsTo(Make::class,'make');
    }

    public function model()
    {
        return $this->belongsTo(Models::class,'model');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
