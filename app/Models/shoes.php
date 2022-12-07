<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoes extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'stock'
    ];
}
