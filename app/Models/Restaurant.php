<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'restaurant_code',
        'address',
        'latitude',
        'longitude',
        'url_link',
        'tin',
        'since',
        'status'
    ];
}
