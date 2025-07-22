<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'num_trainings',
        'term_month',
        'sort',
        'status',
        'description',
    ];
    
}
