<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;
    protected $fillable = [
        'iamage',
        'name',
        'price',
        'description',
        'image',
    ];
}
