<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'colorway', 'gender', 'name', 'releaseDate', 'retailPrice', 'shoe', 'styleId', 'title', 'year', 'media'
    ];

    protected $casts = [
        'media' => 'array'
    ];
}
